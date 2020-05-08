<?php
	session_start();
	
	require_once '../Model/dbconfig.php';


if(isset($_POST['login']))
{
    $uname = $_POST['email'];
    $umail = $_POST['email'];
    $upass = $_POST['password'];

    if($admin->login($uname,$umail,$upass))
    {
        $admin->redirect('../View/adminDashboard.php');
    }
    else
    {
        $error = "Wrong Details !";
    }
}
