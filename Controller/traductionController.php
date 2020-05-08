<?php
require_once '../Model/dbconfig.php';

if(isset($_POST['soumettretraduction']))
{
    $user_id = $_SESSION['user_session'];
    $traducteur=$user_id;
    $date = date('Y/m/d h:i:s a', time());
    $devi_id =  1000;
    $filename = $_FILES['myfiles']['name'][0];


    $extension=explode(".", $filename);

    // Get extension
    $ext = end($extension);

    $valid_ext = array("pdf","doc");
    // $filename =$firstname.$lastname.date('Y/m/d', time()).".".$ext;
    if(in_array($ext, $valid_ext)){

        // Upload file
        if(move_uploaded_file($_FILES['files']['tmp_name'][0],'../documents/documentTraduit/'.$filename)){
            $reponseDevi->insertReponseDevis($devi_id,$traducteur,$date,$filename);
            $reponseDevi->redirect('../View/tr_profile.php');
        }
    }

}
