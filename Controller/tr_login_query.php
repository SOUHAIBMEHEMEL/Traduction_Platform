<?php
	session_start();
	
	require_once '../Model/dbconfig.php';


if(isset($_POST['login']))
{
    $uname = $_POST['email'];
    $umail = $_POST['email'];
    $upass = $_POST['password'];

    if($traducteur->login($uname,$umail,$upass))
    {
        $traducteur->redirect('../View/traducteur_home.php');
    }
    else
    {
        $error = "Wrong Details !";
    }
}
