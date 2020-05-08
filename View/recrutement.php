<script src="js/jquery-3.4.1.min.js"></script>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Font Awesome CSS -->
    <link href="css/fontawesome.min.css" rel="stylesheet">
    <link href="css/brands.min.css" rel="stylesheet">
    <link href="css/solid.min.css" rel="stylesheet">
    <!--  Font Awesome JS  -->
    <script defer src="js/brands.min.js"></script>
    <script defer src="js/solid.min.js"></script>
    <script defer src="js/fontawesome.min.js"></script>

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Mon Profile</title>
</head>
<body id="pageTop">

<!-- Menu -->
<nav class="navbar navbar-expand-lg navbar-light menu shadow-bottom">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse col-md-12 col-md-offset-0 text-left" >
        <div class="row row-mt-15em well">
            <div class="col-md-8">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php" >Acceuil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#articles">Articles</a>
                    </li>
                    <li class="nav-item" style="margin-right: 35%;">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 offset-2  animated fadeInRight">
                <button class="btn connexion-btn" type="submit">Connexion</button>
            </div>
        </div>
    </div>
</nav>

<!-- Zone du Contenu -->
<div class="col-md-12 col-md-offset-0 text-left">
    <div class="row row-mt-15em">
        <div class="col-md-12  animated fadeInRight">
            <div class="col-md-8 offset-2  animated fadeInRight">
                <form id="registerFormProfil" action="../Controller/tr_register_Query.php" method="POST" enctype="multipart/form-data">
                    <h3 class="text-center">S'inscrire Comme Traducteur!</h3>
                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label>Nom</label>
                            <input  type="text" class="form-control" name="lastname">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label>Prenom</label>
                            <input  type="text" class="form-control" name="firstname">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Telephone</label>
                            <input  type="text" class="form-control" name="phone">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Fax</label>
                            <input  type="text" class="form-control" name="fax">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Adresse</label>
                            <input  type="text" class="form-control" name="adresse">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Wilaya</label>
                            <input  type="text" class="form-control" name="wilaya">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Commune</label>
                            <input  type="text" class="form-control" name="commune">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Langues</label>
                            <input  type="text" class="form-control" name="langues">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input  type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group col-md-6 offset-6">
                            <button type="submit" class="btn btn-primary" name="register_traducteur" style="margin-top: 10%;">S'inscrire</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bas De Page -->
<footer id="contact" class="page-footer font-small unique-color-dark footerInfo">
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
                <p><a href="recrutement.php">Devenir Traducteur</a></p>
                <p><a href="blog.php">Blog</a></p>
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
                <div id="closeConnecterCadre"><img class="btn closeicon" src="../View/img/close.png"></div>
                <form action="../Controller/tr_login_query.php" id="connectForm" method="POST">
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

<script src="js/myScript.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>