<?php
require_once 'Model/dbconfig.php';

if($user->is_loggedin()!="")
{
    $user->redirect('View/home.php');
}
else if($traducteur->is_loggedin()!="")
{
    $traducteur->redirect('View/tr_home.php');
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
<body id="pageTop">
<!-- Logo et Les icon des Reseaux Sociaux -->
<div class="col-md-12 col-md-offset-0 text-left animated fadeInDown">
    <div class="row row-mt-15em">
        <div class="col-md-6 col-lg-5 text-md-left mb-4 mb-md-0">
            <a class="navbar-brand" href="#"><img id="logoImage" src="View/img/logo.png" alt=""></a>
        </div>
        <div class="col-md-6 col-lg-7 text-md-right iconsContainer">
            <a class="fb-ic"><i class="fab fa-facebook-f white-text mr-4 headerIcon"> </i></a>
            <a class="tw-ic"><i class="fab fa-twitter white-text mr-4 headerIcon"> </i></a>
            <a class="gplus-ic"><i class="fab fa-google-plus-g white-text mr-4 headerIcon"> </i></a>
            <a class="li-ic"><i class="fab fa-linkedin-in white-text mr-4 headerIcon"> </i></a>
            <a class="ins-ic"><i class="fab fa-instagram white-text headerIcon"> </i></a>
        </div>
    </div>
</div>
<!-- Menu -->
<nav class="navbar navbar-expand-lg navbar-light menu animated fadeInUp">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03" style="margin-left: 10%;">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#pageTop" >Acceuil<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#articles">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0 recrutementBtn" type="submit" href="View/recrutement.php">
                <a href="View/recrutement.php">Recrutement</a></button>
        </form>
    </div>
</nav>
<!-- Diaporama -->
<div id="diaporama" class="carousel slide diaporama animated fadeInUp" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="View/img/slide1.jpg" class="d-block w-100 diapoImage" alt="slide1">
        </div>
        <div class="carousel-item">
            <img src="View/img/slide2.jpg" class="d-block w-100 diapoImage" alt="slide2">
        </div>
        <div class="carousel-item">
            <img src="View/img/slide3.jpg" class="d-block w-100 diapoImage" alt="slide3">
        </div>
    </div>
</div>

<!-- Zone de slogan (additionnel) -->
<div class="col-md-12 col-md-offset-0 text-left slogan animated fadeInUp">
    <div class="row row-mt-15em">
        <div class="col-md-8 animated fadeInUp">
            <h6 class="mb-0">Get connected with us on social networks!</h6>
        </div>
        <div class="col-md-4 form-row  animated fadeInUp">
            <div class="form-group col-md-2">
                <button class="btn connexion-btn" type="submit">Connexion</button>
            </div>
            <div class="form-group col-md-2 offset-1">
                <button class="btn inscription-btn" type="submit">Inscription</button>
            </div>
        </div>
    </div>
</div>
<!-- Zone du Contenu -->
<div class="col-md-12 col-md-offset-0 text-left contenu">
    <div class="row row-mt-15em">
        <div class="col-md-6  animated fadeInUp"  >
            <div class="col-md-11 offset-1  animated fadeInLeft">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="View/img/article1.jpg" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">c'est quoi Traduire ?</h5>
                                <p class="card-text">Une traduction (translation en ancien français1) représente toujours un texte original (ou « texte source », ou « texte de départ ») ;  ...</p>
                                <p class="card-text"><a href="View/blog.php" class="text-muted">Lire Plus</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11 offset-1  animated fadeInLeft">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="View/img/article2.jpg" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">La traduction littérale ou formelle</h5>
                                <p class="card-text">Le principe de la traduction littérale ou formelle reste centré sur les mots et la syntaxe originels,...</p>
                                <p class="card-text"><a href="View/blog.php" class="text-muted">Lire Plus</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11 offset-1  animated fadeInLeft">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="View/img/article3.jpg" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Traduction technique</h5>
                                <p class="card-text">La traduction technique concerne les documents tels que les manuels, guides d'utilisation,...</p>
                                <p class="card-text"><a href="View/blog.php" class="text-muted">Lire Plus</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6  animated fadeInRight">
            <div class="col-md-10 offset-1  animated fadeInRight">
                <form action="Controller/devis_controller.php" id="formulaire" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <h3 class="text-center" style="margin-bottom: 6%; margin-left: 1%">Demander Devis</h3>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nom</label>
                            <input type="text" class="form-control" name="lastame">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Prenom</label>
                            <input type="text" class="form-control" name="firstname">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Telephone</label>
                            <input type="password" class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Num 34, Rue 'A', Secteur 'AB' ">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Wilaya</label>
                            <input type="text" class="form-control" name="Wilaya">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Commune</label>
                            <input type="text" class="form-control" name="Commune">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Langue D'origine</label>
                            <select name="Origine" class="form-control">
                                <option selected>Choose...</option>
                                <option>Anglais</option>
                                <option>Francais</option>
                                <option>Arabe</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Langue Source</label>
                            <select name="Source" class="form-control">
                                <option selected>Choose...</option>
                                <option>Anglais</option>
                                <option>Francais</option>
                                <option>Arabe</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Type de traduction</label>
                            <select name="TypeTraduction" class="form-control">
                                <option selected>Choose...</option>
                                <option>General</option>
                                <option>Scientifique</option>
                                <option>Site Web</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Commentaires</label>
                        <input type="text" class="form-control" name="comments" placeholder="Num 34, Rue 'A', Secteur 'AB' ">
                    </div>
                    <div class="form-group">
                        <label>Demandes specifiques</label>
                        <input type="text" class="form-control" name="specifics" placeholder="Num 34, Rue 'A', Secteur 'AB' ">
                    </div>
                    <div class="form-group">
                        <label class="uploadDocumentBtn">Documents a traduire</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="defaultUnchecked">
                        <label class="custom-control-label" >Traducteur assermenté</label>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="captcha">
                                <div class="spinner">
                                    <label>
                                        <input type="checkbox" onclick="$(this).attr('disabled','disabled');">
                                        <span class="checkmark"><span>&nbsp;</span></span>
                                    </label>
                                </div>
                                <div class="text">
                                    I'm not a robot
                                </div>
                                <div class="logo">
                                    <img src="https://forum.nox.tv/core/index.php?media/9-recaptcha-png/"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="soumettre">Soumettre</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bas De Page -->
<footer id="contact" class="page-footer font-small unique-color-dark footerInfo animated fadeInUp">
    <div id="socialMediaContainer">
        <div class="container">
            <div class="row py-4 d-flex align-items-center">
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0 footerIcon">
                    <h6 class="mb-0">Restez connecté avec nous sur les résaux sociaux!</h6>
                </div>
                <div class="col-md-6 col-lg-7 text-center text-md-right">
                    <a class="fb-ic"><i class="fab fa-facebook-f white-text mr-4 footerIcon"> </i></a>
                    <a class="tw-ic"><i class="fab fa-twitter white-text mr-4 footerIcon"> </i></a>
                    <a class="gplus-ic"><i class="fab fa-google-plus-g white-text mr-4 footerIcon"> </i></a>
                    <a class="li-ic"><i class="fab fa-linkedin-in white-text mr-4 footerIcon"> </i></a>
                    <a class="ins-ic"><i class="fab fa-instagram white-text footerIcon"> </i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center text-md-left mt-5">
        <div class="row mt-3">
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">Notre Mission</h6>
                <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto titreSurligne">
                <p>C'est de connecter entre les citoyens et les traducteurs dans tout le pays.</p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">Langues</h6>
                <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto titreSurligne" >
                <p><a href="#!">Francais</a></p>
                <p><a href="#!">Anglais</a></p>
                <p><a href="#!">Arabe</a></p>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">Liens</h6>
                <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto titreSurligne">
                <p><a href="View/recrutement.php">Devenir Traducteur</a></p>
                <p><a href="View/blog.php">Blog</a></p>
                <p><a href="#!">Aide</a></p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class=" accent-2 mb-4 mt-0 d-inline-block mx-auto titreSurligne" >
                <p><i class="fas fa-home mr-3"></i> Oued Smar, Alger, Algerie</p>
                <p><i class="fas fa-envelope mr-3"></i> info@traduire.dz</p>
                <p><i class="fas fa-phone mr-3"></i> + 213 667230446</p>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3 footerCopyright">© 2020 Copyright:
        <a href="#"> Traduire.dz</a>
    </div>
</footer>

<div id="cadreConnection">
    <div>
        <div class="col-md-6 offset-3  animated fadeInUp">
            <div class="col-md-10 offset-1  animated fadeInUp">
                <div id="closeConnecterCadre"><img class="btn closeicon" src="View/img/close.png"></div>
                <form action="Controller/login_query.php" id="connectForm" method="POST">
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

<div id="cadreDocument">
    <div>
        <div class="col-md-10 offset-1  animated fadeInUp">
            <div class="col-md-10 offset-1  animated fadeInUp">
                <div id="closeCadreDocument" ><img class="btn closeicon1" src="View/img/close.png"></div>
                <form id="uploadForm" method="POST" enctype="multipart/form-data">
                    <h3 class="text-center">Uploader vos documents a traduire</h3>
                    <div class="form-group" type="">
                        <input id="filename" type='file' name='files[]' multiple />
                        <input id="upload_doc" type='submit' value='Upload' name='upload_doc' />
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