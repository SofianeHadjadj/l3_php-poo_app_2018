<?php

session_start();

if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token']))
{
    if($_SESSION['token'] == $_POST['token'])
    {
        $timestamp_ancien = time() - (15*60);
        if($_SESSION['token_time'] >= $timestamp_ancien)
        {
            if($_SERVER['HTTP_REFERER'] == /* Penser à définir ici l'adresse en chemin absolu de la page du formulaire, exemple : 'http://localhost/projet_capture/module_email/formemail.php' */)
            {
                if(count($_POST) && array_key_exists('nom', $_POST)){
                    $nom = htmlspecialchars($_POST['nom']);
                    if(!empty($nom)){
                        if(strlen($nom) >= 2 AND strlen($nom) <= 15){
                            if(gettype($nom) == 'string'){
                                
                                if(count($_POST) && array_key_exists('prenom', $_POST)){
                                    $prenom = htmlspecialchars($_POST['prenom']);
                                    if(!empty($prenom)){
                                        if(strlen($prenom) >= 2 AND strlen($prenom) <= 15){
                                            if(gettype($prenom) == 'string'){
                                                
                                                if(count($_POST) && array_key_exists('email', $_POST)){
                                                    $email = htmlspecialchars($_POST['email']);
                                                    if(!empty($email)){
                                                        if(gettype($email) == 'string'){
                                                            if(strstr($email,'@')){
                                                                
                                                                if(count($_POST) && array_key_exists('ue', $_POST)){
                                                                    $ue = $_POST['ue'];
                                                                    if(!empty($ue)){
                                                                        
                                                                        if(count($_POST) && array_key_exists('adresse', $_POST)){
                                                                            $adresse = htmlspecialchars($_POST['adresse']);
                                                                            if(!empty($adresse)){
                                                                                if(strlen($adresse) >= 7 AND strlen($adresse) <= 50){
                                                                                    if(gettype($adresse) == 'string'){
                                                                                        
                                                                                        $to = "sofiane.hadjadj.tic@gmail.com,saintpierre.b@gmail.com"; /*  */
                                                                                        $from = $_REQUEST['nom'];
                                                                                        $ue = $_REQUEST['ue'];
                                                                                        $nom = $_REQUEST['nom'];
                                                                                        $headers = "From: $from";

                                                                                        $fields = array();
                                                                                        $fields{"nom"} = "nom";
                                                                                        $fields{"prenom"} = "prenom";
                                                                                        $fields{"email"} = "email";
                                                                                        $fields{"ue"} = "ue";
                                                                                        $fields{"adresse"} = "adresse";

                                                                                        $body = "Contenue du message :\n\n"; foreach($fields as $a => $b){   $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); }

                                                                                        $send = mail($to, $ue, $body, $headers);
                                                                                        echo "Votre message a bien été envoyé";
                                                                                        header('refresh:3;url=UE219_Sujet_Session2_2017.php');
                                                                                      exit();

                                                                                    }else{
                                                                                        echo 'Le adresse doit être une chaîne de caractères.<br>';
                                                                                        header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                                                                    }

                                                                                }else{
                                                                                    echo 'Le adresse doit contenir entre 7 et 50 caractères.<br>';
                                                                                    header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                                                                }

                                                                            }else{
                                                                                echo 'Le adresse n\'a pas été renseigné.<br>';
                                                                                header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                                                            }
                                                                        }else{
                                                                            echo 'La variable à transmettre est vide.<br>';
                                                                            header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                                                        }

                                                                    }else{
                                                                        echo 'L\'adresse n\'a pas été renseignée!<br>';
                                                                        header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                                                    }
                                                                }else{
                                                                    echo 'La variable à transmettre est vide.<br>';
                                                                    header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                                                }

                                                            }else{
                                                                echo 'L\'adresse email doit contenir le caractère @';
                                                                header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                                            }
                                                        }else{
                                                            echo 'L\'adresse email doit être une chaîne de caractères';
                                                            header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                                        }

                                                    }else{
                                                        echo 'L\'adresse email n\'a pas été renseignée.';
                                                        header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                                    }
                                                }else{
                                                    echo 'La variable à transmettre est vide.';
                                                    header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                                }

                                            }else{
                                                echo 'Le prenom doit être une chaîne de caractères.<br>';
                                                header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                            }

                                        }else{
                                            echo 'Le prenom doit contenir entre 2 et 15 caractères.<br>';
                                            header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                        }

                                    }else{
                                        echo 'Le prenom n\'a pas été renseigné.<br>';
                                        header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                    }
                                }else{
                                    echo 'La variable à transmettre est vide.<br>';
                                    header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                                }

                            }else{
                                echo 'Le nom doit être une chaîne de caractères.<br>';
                                header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                            }

                        }else{
                            echo 'Le nom doit contenir entre 2 et 15 caractères.<br>';
                            header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                        }

                    }else{
                        echo 'Le nom n\'a pas été renseigné.<br>';
                        header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                    }
                }else{
                    echo 'La variable à transmettre est vide.<br>';
                    header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
                }
            }else{
                echo 'Veuillez passer par le formulaire.<br>';
                header('refresh:1.5;url=UE219_Sujet_Session2_2017.php');
            }

        }
    }
}

?>