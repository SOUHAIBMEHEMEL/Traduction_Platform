<script src="js/jquery-3.4.1.min.js"></script>
<!doctype html>
<?php
include_once '../Model/dbconfig.php';
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tdw;charset=utf8', 'root', '');
if(!$traducteur->is_loggedin())
{
    $traducteur->redirect('../index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM traducteur WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$devi = $bdd->prepare('SELECT * FROM demandedevi JOIN devi ON demandedevi.devi_id=devi.id AND demandedevi.traducteur_id=:user_id ORDER BY devi_id DESC LIMIT 0,99');
$devi->execute(array(":user_id"=>$user_id));

$devi1 = $bdd->prepare('SELECT * FROM demandedevi JOIN devi ON demandedevi.devi_id=devi.id AND demandedevi.traducteur_id=:user_id ORDER BY devi_id DESC LIMIT 0,99');
$devi1->execute(array(":user_id"=>$user_id));


if(isset($_GET['type']) AND $_GET['type'] == 'membre') {
    if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
        $id=1000;
        $confirme = (int) $_GET['confirme'];
        $req = $bdd->prepare("UPDATE reponsedevi SET devi_id = '".$confirme."' WHERE devi_id = ?");
        $req->execute(array($id));
    }
}

//$devi_table = $bdd->query('SELECT * FROM devi WHERE id =:user_id ORDER BY devi_id DESC LIMIT 0,99');


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
        <div class="col-md-3  animated fadeInLeft " >
            <div class="col-md-11  shadow-right"  >
                <div class="profile_photo"></div>
                <ul>
                    <li class="menuProfilItem menu_element"><a href = "#"  >informations Personneles</a></button></li>
                    <li class="menuProfilItem menu_element"><a href = "#" >demandes de devis</a></li>
                    <li class="menuProfilItem menu_element"><a href = "#" >demandes de traductions</a></li>
                    <li class="menuProfilItem"><a href = "../Controller/logout.php" >Se Deconnecter</a></li>
                </ul>
                <div class="profile_photo"></div>
            </div>
        </div>
        <div class="col-md-9  animated fadeInRight">
            <div class="col-md-8 offset-2  animated fadeInRight content">
                <form id="registerFormProfil" action="../Controller/tr_modify_info_query.php" method="POST">
                    <h3 class="text-center">Modifier vos infos!</h3>
                    <div class="form-row">
                        <div class="form-group col-md-8 offset-2">
                            <label>Nom</label>
                            <input placeholder=" <?php echo $userRow['lname']; ?>" type="text" class="form-control" name="lastname">
                        </div>
                        <div class="form-group col-md-8 offset-2">
                            <label>Prenom</label>
                            <input placeholder=" <?php echo $userRow['fname']; ?>" type="text" class="form-control" name="firstname">
                        </div>
                        <div class="form-group col-md-8 offset-2">
                            <label>Email</label>
                            <input placeholder=" <?php echo $userRow['user_email']; ?>" type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group col-md-8 offset-2">
                            <label>Password</label>
                            <input placeholder="**********" type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group col-md-6 offset-3">
                            <button type="submit" class="btn btn-primary" name="modify_infos" style="margin-top: 10%;">Enregistrer Les Modifications</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-12  animated fadeInRight content" style="display: none; margin-top: 3%;">
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h2>Demande des devis</b></h2>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Date du Demande</th>
                                <th>email</th>
                                <th>telephone</th>
                                <th style="left: 130px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while($d = $devi->fetch()) { ?>
                            <tr>
                                <td><a href="#"><?= $d['nom'] ?><?= $d['prenom'] ?></a></td>
                                <td><a href="#"><?= $d['dateCreation'] ?></a></td>
                                <td><?= $d['mail'] ?></td>
                                <td><?= $d['phone'] ?></td>
                                <td>
                                    <a class="btn btn-primary listebtn" href="../documents/demandeDevi/<?= $d['id_fichier'] ?>" download="<?= $d['id_fichier'] ?>">telecharger la demande</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary listebtn connexion-btn">fournir un Devi</a>
                                </td>
                                <td>
                                    <a href="tr_profile.php?type=membre&confirme=<?= $d['id'] ?>">Confirmer</a>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12  animated fadeInRight content" style="display: none; margin-top: 3%;">
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h2>Demande des traduction</b></h2>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>email</th>
                                <th>telephone</th>
                                <th style="left: 130px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while($d1 = $devi1->fetch()) { ?>
                                <tr>
                                    <td><a href="#"><?= $d1['nom'] ?><?= $d1['prenom'] ?></a></td>
                                    <td><?= $d1['mail'] ?></td>
                                    <td><?= $d1['phone'] ?></td>
                                    <td>
                                        <a class="btn btn-primary listebtn inscription-btn">fournir le document traduit</a>
                                    </td>
                                    <td>
                                        <a href="tr_profile.php?type=membre&traduire=<?= $d1['id'] ?>">Confirmer l'operation</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="cadreConnection">
    <div>
        <div class="col-md-8 offset-2  animated fadeInUp">
            <div class="col-md-6 offset-3 animated fadeInUp">
                <div id="closeConnecterCadre"><img class="btn closeicon" src="./img/close.png"></div>
                <form id="connectForm" method="POST" action="../Controller/reponseDeviController.php" enctype="multipart/form-data">
                    <h3 class="text-center">Uploader le Devi</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <input id="filename" type='file' name='files[]' multiple />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="soumettreDevi">Soumettre</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="cadreInscription">
    <div>
        <div class="col-md-8 offset-2  animated fadeInUp">
            <div class="col-md-10 offset-1  animated fadeInUp">
                <div id="closeInscrireCadre"><img class="btn closeicon1" src="img/close.png"></div>
                <form id="registerForm" action="../Controller/reponseDeviController.php" method="POST">
                    <h3 class="text-center">Uploader la traduction</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <input id="filename" type='file' name='files[]' multiple />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="soumettreDevi">Soumettre</button>
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


<script src="js/frontend_manager.js"></script>
<script src="js/myScript.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>