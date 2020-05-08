<?php
	session_start();
	
	require_once '../Model/dbconfig.php';


if(isset($_POST['login']))
{
    $uname = $_POST['email'];
    $umail = $_POST['email'];
    $upass = $_POST['password'];

    if($user->login($uname,$umail,$upass))
    {
        $user->redirect('../View/home.php');
    }
    else
    {
        $error = "Wrong Details !";
    }
}
