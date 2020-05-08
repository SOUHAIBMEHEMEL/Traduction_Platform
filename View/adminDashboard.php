<script src="js/jquery-3.4.1.min.js"></script>
<!doctype html>
<?php
include_once '../Model/dbconfig.php';
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tdw;charset=utf8', 'root', '');

if(!$admin->is_loggedin())
{
    $admin->redirect('../admin.php');
}
$user_id = $_SESSION['user_session'];

$stmt = $DB_con->prepare("SELECT * FROM admin WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


if(isset($_GET['type']) AND $_GET['type'] == 'traducteur') {
    if(isset($_GET['confirmer']) AND !empty($_GET['confirmer'])) {
        $traducteur = (int) $_GET['confirmer'];
        $req = $bdd->prepare('UPDATE traducteur SET bloque="0" WHERE user_id = ?');
        $req->execute(array($traducteur));
    }
    if(isset($_GET['bloquer']) AND !empty($_GET['bloquer'])) {
        $traducteur = (int) $_GET['bloquer'];
        $req = $bdd->prepare('UPDATE traducteur SET bloque="1" WHERE user_id = ?');
        $req->execute(array($traducteur));
    }
}

if(isset($_GET['type']) AND $_GET['type'] == 'client') {
    if(isset($_GET['confirmer']) AND !empty($_GET['confirmer'])) {
        $traducteur = (int) $_GET['confirmer'];
        $req = $bdd->prepare('UPDATE client SET bloque="0" WHERE user_id = ?');
        $req->execute(array($traducteur));
    }
    if(isset($_GET['bloquer']) AND !empty($_GET['bloquer'])) {
        $traducteur = (int) $_GET['bloquer'];
        $req = $bdd->prepare('UPDATE client SET bloque="1" WHERE user_id = ?');
        $req->execute(array($traducteur));
    }
}

if(isset($_GET['type']) AND $_GET['type'] == 'demandedevi') {
    if(isset($_GET['supprimer']) AND !empty($_GET['supprimer'])) {
        $id_devi = (int) $_GET['supprimer'];
        $req = $bdd->prepare('DELETE FROM devi WHERE id = ?');
        $req->execute(array($id_devi));
    }
}

$valide='1';
$stmt1 = $DB_con->prepare("SELECT * FROM reponsedevi WHERE accepte=:valide");
$stmt1->execute(array(":valide"=>$valide));

if(isset($_GET['type']) AND $_GET['type'] == 'validation') {
    if(isset($_GET['valide']) AND !empty($_GET['valide'])) {
        $valid_id= (int) $_GET['valide'];
        $req = $bdd->prepare('UPDATE reponsedevi SET valide = "1" WHERE id = ?');
        $req->execute(array($valid_id));
    }
}


$traducteur = $bdd->query('SELECT * FROM traducteur ORDER BY user_id DESC LIMIT 0,99');
$client = $bdd->query('SELECT * FROM client ORDER BY user_id DESC LIMIT 0,99');
$devi = $bdd->query('SELECT * FROM devi ORDER BY id DESC LIMIT 0,99');


?>

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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--  Font Awesome JS  -->
    <script defer src="js/brands.min.js"></script>
    <script defer src="js/solid.min.js"></script>
    <script defer src="js/fontawesome.min.js"></script>

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/adminStyle.css">

    <title>Mon Profile</title>
</head>
<body id="pageTop">

<!-- Menu -->
<nav class="navbar navbar-expand-lg navbar-light menu shadow-bottom animated fadeInDown">
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
                    <li class="nav-item dropdown profileMenu userprofileMenu">
                        <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="dot2" ></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Mon Profile</a>
                            <a class="dropdown-item" href="#">Parametres</a>
                            <a class="dropdown-item" href = "../Controller/logout.php">Se Deconnecter</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Zone du Contenu -->
<div class="col-md-12 col-md-offset-0 text-left">
    <div class="row row-mt-15em">
        <div class="col-md-3  animated fadeInLeft">
            <div class="col-md-11  shadow-right" style="background-color: white; margin-left: -20px;height: 900px; " >
                <div class="profile_photo"></div>
                <ul>
                    <li class="menuProfilItem dashboardBtn menu_element"><a href = "#" >Dashboard</a></li>
                    <li class="menuProfilItem gestionTraducteursBtn menu_element"><a href = "#" >Gestion Des Traducteurs</a></li>
                    <li class="menuProfilItem gestionClientBtn menu_element"><a href = "#" >Gestion Des Clients</a></li>
                    <li class="menuProfilItem gestionDocumentBtn menu_element"><a href = "#" >Gestion Des Documents</a></li>
                    <li class="menuProfilItem validationBtn menu_element"><a href = "#" >Validation des traductions</a></li>
                    <li class="menuProfilItem statistiqueBtn menu_element"><a href = "#" >Statistiques</a></li>
                </ul>
            </div>
            <script>
                var menu_element=document.getElementsByClassName("menu_element");
                var content= document.getElementsByClassName("content");
                for ( let j=0; j<menu_element.length;j++) {
                    menu_element[j].onclick = function () {
                        for (let i = 0; i < content.length; i++){
                            content[i].style.display = "none";
                        }
                        content[j].style.display = "block";
                    };
                };
            </script>
        </div>
        <div class="col-md-9  animated fadeInRight" style="margin-top: 3%;">
            <div id="Dashboard" class="col-md-12 container  animated fadeInRight content">
                <div class="col-md-10 offset-1">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="../View/img/article1.jpg" class="card-img" alt="..." style="height: 170px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title gestionTraducteursBtn menu_element1">Gestion Des Traducteurs</h5>
                                    <p class="card-text">La traduction technique concerne les documents tels que les manuels, guides d'utilisation,...</p>
                                    <p class="card-text gestionTraducteursBtn"><a class="text-muted">Afficher</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-1">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="../View/img/article2.jpg" class="card-img" alt="..." style="height: 170px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title gestionClientBtn menu_element1">Gestion Des Clients</h5>
                                    <p class="card-text">La traduction technique concerne les documents tels que les manuels, guides d'utilisation,...</p>
                                    <p class="card-text gestionClientBtn"><a class="text-muted">Afficher</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-1">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="../View/img/article3.jpg" class="card-img" alt="..." style="height: 170px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title menu_element1 menu_element1">Gestion Des Documents</h5>
                                    <p class="card-text">La traduction technique concerne les documents tels que les manuels, guides d'utilisation,...</p>
                                    <p class="card-text"><a class="text-muted">Lire Plus</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-1">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="../View/img/article3.jpg" class="card-img" alt="..." style="height: 170px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title menu_element1 menu_element1">Statistiques</h5>
                                    <p class="card-text">La traduction technique concerne les documents tels que les manuels, guides d'utilisation,...</p>
                                    <p class="card-text"><a class="text-muted">Lire Plus</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    var menu_element=document.getElementsByClassName("menu_element1");
                    var content= document.getElementsByClassName("content");
                    for ( let j=0; j<menu_element.length;j++) {
                        menu_element[j].onclick = function () {
                            for (let i = 0; i < content.length; i++){
                                content[i].style.display = "none";
                            }
                            content[j+1].style.display = "block";
                        };
                    };
                </script>
            </div>
            <div class="col-md-12  animated fadeInRight content" style="display: none;">
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h2>Gestion Des <b>Traducteurs</b></h2>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>email</th>
                                <th>telephone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while($d = $traducteur->fetch()) { ?>
                                <tr>
                                    <td><a href="tr_profile.php"><?= $d['lname'] ?> <?= $d['fname'] ?></a></td>
                                    <td><?= $d['user_email'] ?></td>
                                    <td><?= $d['phone'] ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="adminDashboard.php?type=traducteur&confirmer=<?= $d['user_id'] ?>">Confirmer</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="adminDashboard.php?type=traducteur&bloquer=<?= $d['user_id'] ?>">Bloquer</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12  animated fadeInRight content" style="display: none;">
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h2>Gestion Des <b>Clients</b></h2>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>email</th>
                                <th>telephone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while($c = $client->fetch()) { ?>
                                <tr>
                                    <td><a href="user_profile.php"><?= $c['lname'] ?> <?= $c['fname'] ?></a></td>
                                    <td><?= $c['user_email'] ?></td>
                                    <td><?= $c['phone'] ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="adminDashboard.php?type=client&confirmer=<?= $c['user_id'] ?>">Restituer</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="adminDashboard.php?type=client&bloquer=<?= $c['user_id'] ?>">Bloquer</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12  animated fadeInRight content" style="display: none;">
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h2>Gestion Des <b>demandes des Devis</b></h2>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>client</th>
                                <th>email</th>
                                <th>telephone</th>
                                <th>date du demande</th>
                                <th>supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while($d1 = $devi->fetch()) { ?>
                                <tr>
                                    <td><a href="user_profile.php"><?= $d1['nom'] ?> <?= $d1['prenom'] ?></a></td>
                                    <td><?= $d1['mail'] ?></td>
                                    <td><?= $d1['phone'] ?></td>
                                    <td><?= $d1['dateCreation'] ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="adminDashboard.php?type=demandedevi&supprimer=<?= $d1['id'] ?>">Supprimer</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-12  animated fadeInRight content">
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h2>Devis <b>Acceptees</b></h2>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Date du Demande</th>
                                <th style="left: 130px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while($st = $stmt1->fetch()) { ?>
                                <tr>
                                    <td><a href="#"><?= $st['traducteur_id'] ?></a></td>
                                    <td><a href="#"><?= $st['dateReponse'] ?></a></td>
                                    <td>
                                        <a class="btn btn-primary listebtn" href="../documents/reponseDemandeDevi/<?= $st['fichierReponse'] ?>" download="<?= $st['fichierReponse'] ?>">telecharger le devi</a>
                                    </td>
                                    <td>
                                        <a href="tr_profile.php?type=validation&valide=<?= $st['id'] ?>">valider la traduction</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12  animated fadeInRight content" style="display: none;">
                <div class="container">
                    <a class="dropdown-item" href="stat.php">Statistiques sur les clients</a>
                    <a class="dropdown-item" href="stat_trad.php">Statistiques sur les traducteurs</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bas De Page -->
<footer id="contact" class="page-footer font-small unique-color-dark footerInfo animated fadeInUp" style="margin-top: -10%;">
    <div id="socialMediaContainer">
        <div class="container">
            <div class="row py-4 d-flex align-items-center">
                <div class="col-md-6 col-lg-5 text-center text-md-left m    mb-md-0 footerIcon">
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

<script src="js/myScript.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>