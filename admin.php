<?php
require_once 'Model/dbconfig.php';

if($user->is_loggedin()!="")
{
    $user->redirect('View/adminDashboard');
}
?>

<script src="View/js/jquery-3.4.1.min.js"></script>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="View/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Font Awesome CSS -->
    <link href="View/css/fontawesome.min.css" rel="stylesheet">
    <link href="View/css/brands.min.css" rel="stylesheet">
    <link href="View/css/solid.min.css" rel="stylesheet">
    <!--  Font Awesome JS  -->
    <script defer src="View/js/brands.min.js"></script>
    <script defer src="View/js/solid.min.js"></script>
    <script defer src="View/js/fontawesome.min.js"></script>

    <link rel="stylesheet" href="View/css/animate.css">
    <link rel="stylesheet" href="View/css/style.css">

    <title>Traduire</title>
</head>
<body id="adminPage">
<!-- Zone de slogan (additionnel) -->
<div class="col-md-12 col-md-offset-0 text-left adminNav animated fadeInUp">
    <div class="row row-mt-15em">
        <div class="col-md-8 animated fadeInUp"></div>
        <div class="col-md-4 form-row  animated fadeInUp">
            <div class="form-group col-md-2 offset-4">
                <button class="btn connexion-btn" type="submit">Connexion</button>
            </div>
            <div class="form-group col-md-2 offset-1">
                <button class="btn inscription-btn" type="submit">Inscription</button>
            </div>
        </div>
    </div>
</div>
<div id="cadreConnection">
    <div>
        <div class="col-md-6 offset-3  animated fadeInUp">
            <div class="col-md-10 offset-1  animated fadeInUp">
                <div id="closeConnecterCadre"><img class="btn closeicon" src="View/img/close.png"></div>
                <form action="Controller/admin_login_query.php" id="connectForm" method="POST">
                    <h3 class="text-center">Connectez-Vouz</h3>
                    <div class="form-row">
                        <div class="form-group col-md-8 offset-2">
                            <label>Nom utilisateur ou Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group col-md-8 offset-2">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group col-md-4 offset-2">
                            <button type="submit" class="btn btn-primary" name="login" style="margin-top: 10%;">Se Connecter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="cadreInscription">
    <div>
        <div class="col-md-10 offset-1  animated fadeInUp">
            <div class="col-md-10 offset-1  animated fadeInUp">
                <div id="closeInscrireCadre"><img class="btn closeicon1" src="View/img/close.png"></div>
                <form id="registerForm" action="Controller/register_query.php" method="POST">
                    <h3 class="text-center">Inscrivez-Vouz</h3>
                    <div class="form-row">
                        <div class="form-group col-md-3 ">
                            <label>Nom</label>
                            <input  type="text" class="form-control" name="lastname">
                        </div>
                        <div class="form-group col-md-3 ">
                            <label>Prenom</label>
                            <input  type="text" class="form-control" name="firstname">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Telephone</label>
                            <input  type="text" class="form-control" name="phone">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fax</label>
                            <input  type="text" class="form-control" name="fax">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Adresse</label>
                            <input  type="text" class="form-control" name="adresse">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Wilaya</label>
                            <input  type="text" class="form-control" name="wilaya">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Commune</label>
                            <input  type="text" class="form-control" name="commune">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Email</label>
                            <input  type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group col-md-3 offset-1">
                            <button type="submit" class="btn btn-primary" name="register" style="margin-top: 10%;">S'inscrire</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="View/js/myScript.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="View/js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="View/js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="View/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>