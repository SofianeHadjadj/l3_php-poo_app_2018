<?php 

session_start();

if (is_numeric($_SESSION['id'])) {
 header('location:index.php');
}

else {

$module=$_GET['module'];

include('../../model/connexion_BDD.php');
include('../../model/ModeleUtilisateurs.php');

?>

<!doctype html>
<html lang="fr">
  <head>

  <?php include ('include/head.php'); ?>

  </head>
  <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header" id="docker">

      <?php 

        include ('include/inscript.inc.php'); 
    
      ?>
     
      <main class="mdl-layout__content">

        <!-- Formulaire d'inscription -->

        <?php
            if ($module==1){
             include ('include/fom.inscript.php');         
            } 

        include ('../../controller/verinsc.cont.php');
              
        ?>

        <!-- Fin du formulaire d'inscription -->        

        <!-- Footer -->

        <?php include ('include/footer.php'); ?>

        <!-- Fin du footer -->

      </main>
    </div>

    <!-- connexion -->

    <?php include ('include/connexion.php'); ?>

    <!-- Fin connexion -->

    <script src="assets/js/script.js"></script>

  </body>
</html>

<?php 
}
?>