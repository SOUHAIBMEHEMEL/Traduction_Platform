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
        $user->modifierPrenom($id,$firstname);
    }
    if($lastname!=="") {
        $user->modifierNom($id,$lastname);
    }
    if($umail!=="") {
        $user->modifierMail($id,$umail);
    }
    if($upass!=="") {
        $user->modifierPassword($id,$upass);
    }

    $user->redirect('../View/user_profile.php?modification_reussite');
}
