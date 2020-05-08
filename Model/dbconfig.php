<?php

session_start();

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "tdw";

try
{
    $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}


include_once 'user.php';
include_once 'traducteur.php';
include_once 'Devis.php';
include_once 'admin.php';
include_once 'relation_devi_trad.php';
include_once 'reponseDevi.php';
$user = new USER($DB_con);
$traducteur= new traducteur($DB_con);
$devis = new Devis($DB_con);
$admin = new admin($DB_con);
$relation_devi_trad = new relation_devi_trad($DB_con);
$reponseDevi = new reponseDevi($DB_con);