<?php
    if ($module==2){
        // Sécurité
        $_SESSION['NOM']=mysql_real_escape_string(htmlspecialchars($_POST['nom']));
        $_SESSION['PRENOM']=mysql_real_escape_string(htmlspecialchars($_POST['prenom']));
        $_SESSION['IDENTIFIANT']=mysql_real_escape_string(htmlspecialchars($_POST['identifiant']));
        $_SESSION['MDP']=mysql_real_escape_string(htmlspecialchars($_POST['mdp']));
        $_SESSION['MAIL']=mysql_real_escape_string(htmlspecialchars($_POST['mail']));
        $MDP_VERIF = mysql_real_escape_string(htmlspecialchars($_POST['mdp_verif']));
      
        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['identifiant']) || empty($_POST['mdp']) || empty($_POST['mail'])) {
            if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/design/inscription.php?module=1") {
                echo "<div class='hideIfAcc' style='height:400px'>";
                echo "<h3>Probl&egrave;me dans la phase d'enregistrement</h3>";
                echo "<div style='width:400px;margin:auto'>";
                echo "<p style='color:#FB372D'>Veuillez compléter tous les champs.</p>";
                echo "<div><a href='inscription.php?module=1' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored'>revenir au formulaire</a></div>";
                echo "</div>";
                echo "</div>";
            }            
            else if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/accessibility/inscription.php?module=1") {
                echo "Merci de compléter tous les champs";
            }
            if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/accessibility/inscription.php?module=1") {
                echo '<p>Cliquez <a href="inscription.php?module=1">ici</a> pour revenir</p>';
            }
        }

        else{
            // Sécurité
            if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_SESSION['MAIL'])){ // on vérifie si l'email à un format valide.
                if($_SESSION['MDP'] == $MDP_VERIF){ // on vérifie que les deux mots de passe soient identique.
                    $inscrire=new ModeleValidation();
                    $inscription=$inscrire->inscription();
                    if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/design/inscription.php?module=1") {
                        echo "<div class='hideIfAcc' style='height:400px'>";
                        echo "<h3>Incription effectué avec succès !</h3>";
                        echo "<div style='width:400px;margin:auto'>";
                        echo "<p>Vous allez recevoir d'ici peu un e-mail de confirmation.</p>";
                        echo "<div><a href='index.php' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored'>Retour &agrave; l'accueil</a></div>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                else{
                    if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/design/inscription.php?module=1") {
                        echo "<div class='hideIfAcc' style='height:400px'>";
                        echo "<h3>Probl&egrave;me dans la phase d'enregistrement</h3>";
                        echo "<div style='width:400px;margin:auto'>";
                        echo "<p style='color:#FB372D'>Vos mots de passe ne sont pas identiques.</p>";
                        echo "<div><a href='inscription.php?module=1' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored'>revenir au formulaire</a></div>";
                        echo "</div>";
                        echo "</div>";
                    }
                    else if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/accessibility/inscription.php?module=1") {
                        echo "Vos mots de passe ne sont pas identiques.";
                        echo '<p>Cliquez <a href="inscription.php?module=1">ici</a> pour revenir</p>';
                    }
                }
            }
            else{
                if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/design/inscription.php?module=1") {
                    echo "<div class='hideIfAcc' style='height:400px'>";
                    echo "<h3>Probl&egrave;me dans la phase d'enregistrement</h3>";
                    echo "<div style='width:400px;margin:auto'>";
                    echo "<p style='color:#FB372D'>Votre adresse e-mail n'est pas valide.</p>";
                    echo "<div><a href='inscription.php?module=1' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored'>revenir au formulaire</a></div>";
                    echo "</div>";
                    echo "</div>";
                }
                else if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/accessibility/inscription.php?module=1") {
                    echo "Votre adresse e-mail n'est pas valide.";
                    echo '<p>Cliquez <a href="inscription.php?module=1">ici</a> pour revenir</p>';
                }
            }
        }       
    }

?>