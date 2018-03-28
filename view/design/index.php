<?php 

session_start();

include('../../model/connexion_BDD.php');
include('../../model/ModeleUtilisateurs.php');
include('../../model/ModeleFichiers.php');

$id=$_SESSION['id'];

include ('../../controller/cnx.cont.php');

?>

<!doctype html>
<html lang="fr">
  <head>

  <?php include ('include/head.php'); ?>

  </head>
  <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">

    <!-- Message d'information -->
    
    <?php include ('include/message.php');?>

    <!-- Fin de message d'information -->

    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header" id="docker">

      <?php 

      if (isset($id)) {
        $menu=new ModeleUtilisateur($id);
        $menuPersonnalise=$menu->afficheMenu();  

        if ($_SESSION['statut'] == 1){
          include ('include/admin.php'); 
        }
        else {
          include ('include/user.php'); 
        }
      }

      else {
        include ('include/guest.php'); 
      }
     
      ?>
     
      <main class="mdl-layout__content">

        <!-- Partie Accueil -->

        <div class="mdl-layout__tab-panel is-active" id="accueil">

          <!-- Partie Show Video -->

          <?php 

            if ($_POST['type'] == "vid") {
              include ('include/showVideo.php');
            }
            else if ($_POST['type'] == "aud") {
              include ('include/showAudio.php');
            }
            else if ($_POST['type'] == "eb") {
              include ('include/showEbook.php');
            } 

          ?>

          <!-- Fin de la partie Show Video -->

          <!-- Partie Carousel -->

          <?php include ('include/carousel.php'); ?>

          <!-- Fin de la partie Carousel -->

          <!-- Partie Articles -->

          <?php include ('include/articles.php'); ?>         

          <!-- Fin de la partie Articles -->

          <section></section>

        </div>

        <!-- Fin de la partie accueil -->

        <!-- Partie Vidéo -->

        <?php include ('include/videos.php'); ?>

        <!-- Fin de la partie vidéo -->

        <!-- Partie Audio -->

        <?php include ('include/audios.php'); ?>

        <!-- Fin de la partie audio -->

        <!-- Partie E-Book -->

        <?php include ('include/ebooks.php'); ?>

        <!-- Fin de la artie E-Book -->

        <!-- Partie Connecté -->

        <?php 

        if (isset($id)) {
          $menu=new ModeleUtilisateur($id);
          $menuPersonnalise=$menu->afficheMenu();          
          if ($_SESSION['statut'] == 1){
            include ('include/espMembre.php'); 
            include ('include/espAdmin.php'); 
          }
          else {
            include ('include/espMembre.php'); 
          }
        }

        ?>

        <!-- Fin de la partie Connecté -->        

        <!-- Footer -->

        <?php include ('include/footer.php'); ?>

        <!-- Fin du footer -->

      </main>
    </div>

    <!-- connexion -->

    <?php include ('include/connexion.php'); ?>

    <!-- Fin connexion -->


    <script src="assets/js/carousel.js"></script>
    <script src="assets/js/categories.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/custom-file-input.js"></script>
  </body>
</html>
