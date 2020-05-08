<?php
require_once '../Model/dbconfig.php';

if(isset($_POST['soumettre']))
{
    $user_id = $_SESSION['user_session'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];
    $wilaya = $_POST['wilaya'];
    $commune = $_POST['commune'];
    $languesrc=$_POST['source'];
    $langueorigine=  $_POST['origine'];
    $typetraduction=$_POST['typetraduction'];
    $comment= $_POST['comments'];
    $specific=   $_POST['specifics'];
    $assermente=$_POST['typetraducteur'];
    $id_fichier='0';
    $date = date('Y/m/d h:i:s a', time());

    // Prepared statement
    $query = "INSERT INTO docatraduire (id_client,name,doc,date) VALUES(?,?,?,?)";

    $statement = $DB_con->prepare($query);
    // File name
    $filename = $_FILES['files']['name'][0];

    $extension=explode(".", $filename);

    // Get extension
    $ext = end($extension);

    $valid_ext = array("pdf","doc");
    // $filename =$firstname.$lastname.date('Y/m/d', time()).".".$ext;
    if(in_array($ext, $valid_ext)){

        // Upload file
        if(move_uploaded_file($_FILES['files']['tmp_name'][0],'../documents/demandeDevi/'.$filename)){

            // Execute query
            $statement->execute(array($user_id,$filename,'../documents/demandeDevi/'.$filename,$date));

        }
    }
    $id_fichier=$filename;

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
    else
    {
        try
        {
            if($devis->DemanderDevis($user_id,$lastname,$firstname,$email,$phone,$adresse,$wilaya,$commune,$langueorigine,$languesrc,$typetraduction,$comment,$specific,$assermente,$id_fichier,$date))
            {
                $devis->redirect('../View/demandeDevi.php');
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
