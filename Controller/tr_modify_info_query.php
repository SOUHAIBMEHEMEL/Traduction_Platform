<?php
require_once '../Model/dbconfig.php';

if(isset($_POST['modify_infos']))
{
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $uname = $firstname.' '.$lastname;
    $umail = trim($_POST['email']);
    $upass = trim($_POST['password']);
    $id=$_SESSION['user_session'];

    if($firstname!=="") {
        $traducteur->modifierPrenom($id,$firstname);
    }
    if($lastname!=="") {
        $traducteur->modifierNom($id,$lastname);
    }
    if($umail!=="") {
        $traducteur->modifierMail($id,$umail);
    }
    if($upass!=="") {
        $traducteur->modifierPassword($id,$upass);
    }

    $traducteur->redirect('../View/tr_profile.php?modification_reussite');
}
