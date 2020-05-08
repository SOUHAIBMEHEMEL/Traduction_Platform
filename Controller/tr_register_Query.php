<?php
require_once '../Model/dbconfig.php';

if(isset($_POST['register_traducteur']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $uname = $firstname.' '.$lastname;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $adresse = $_POST['adresse'];
    $wilaya = $_POST['wilaya'];
    $commune = $_POST['commune'];
    $phone = $_POST['phone'];
    $fax = $_POST['fax'];
    $langues = $_POST['langues'];
    $assermente='o';

    if($lastname=="") {
        $error[] = "Saisir le Nom !";
    }
    if($firstname=="") {
        $error[] = "Saisir le Prenom !";
    }
    else if($email=="") {
        $error[] = "Saisir votre email !";
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Entrer un email valide SVP !';
    }
    else if($password=="") {
        $error[] = "Saisir le Mot de Passe !";
    }
    else if(strlen($password) < 6){
        $error[] = "Mot de passe doit contient au moins 6 caracteres!";
    }
    else if($adresse=="") {
        $error[] = "Saisir le Mot l'adresse !";
    }
    else if($wilaya=="") {
        $error[] = "Saisir la wilaya !";
    }
    else if($commune=="") {
        $error[] = "Saisir la commune!";
    }
    else if($phone=="") {
        $error[] = "Saisir le telephone !";
    }
    else if($fax=="") {
        $error[] = "Saisir le fax !";
    }
    else
    {
        try
        {
            $stmt = $DB_con->prepare("SELECT user_name,user_email FROM traducteur WHERE user_name=:uname OR user_email=:umail");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$email));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);


            if($row['user_email']==$email) {
                $error[] = "sorry email id already taken !";
            }
            else
            {
                if($traducteur->register($firstname,$lastname,$uname,$email,$password,$phone,$fax,$wilaya,$commune,$adresse,$assermente,$langues))
                {
                    $traducteur->redirect('../index.php?joined');
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
