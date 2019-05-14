<?php
/*
  Projet: RAPOEME
  Description: Page d'accueil 
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>LOCAMOTO</title>

    <!-- Insertion CSS -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- Style custom pour le template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 ">
                    <?php include "navigation.php";?>
                </div>
                <div class="col-4 text-center">
                    <h1 class="btn-dark">LOCAMOTO</h1>
                </div>

                <div class="col-4 d-flex justify-content-end align-items-center">
                    <?php if (isset($_SESSION["login"])) { ?>
                        <a class="m-2 text-muted" href=<?php echo "saveuser.php?idUser=" . $_SESSION["idUser"];?>>Profil</a>
                        <a href="logout.php"><button type="button" class="btn btn-sm btn-outline-secondary">Déconnexion</button></a>
                    <?php } else { ?>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#loginModal">Connexion</button>
                    <?php } ?>
                </div>
            </div>
            <hr>
        </header>

        <!-- Notification de connexion -->
        <?php
            if(isset($_GET["message1"]))
            {
                echo '<div class="alert alert-success" role="alert">Bienvenu ! Vous êtes connecté</div>';
            }
            if(isset($_GET["message2"]))
            {
                echo '<div class="alert alert-danger" role="alert">Les identifiants n\'existent pas.</div>';
            }
            if(isset($_GET["message3"]))
            {
                echo '<div class="alert alert-danger" role="alert">Veuillez remplir tous les champs.</div>';
            }
            if(isset($_GET["message4"]))
            {
                echo '<div class="alert alert-success" role="alert">Réservation effectuée avec succès.</div>';
            }
        ?>

        <!-- Modal Connexion -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="Connexion" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Connexion">Connexion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="pseudo" class="col-form-label">Pseudo:</label>
                                <input type="pseudo" class="form-control" name="pseudo">
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Mot de passe:</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <a href="saveuser.php"> <button type="button" class="btn btn-secondary">Inscription</button></a>
                        <button type="submit" class="btn btn-success">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--modal-->
        <script>
            $(document).ready(function() {
                $("#loginModal").modal();
            });
        </script>

        <div class="row justify-content-end">
            <form method="POST" class="form-inline">
                <div class="form-group">
                    <div class="col-sm-12">
                        <input class="form-control" type="text" name="search" id="search" value="<?php if (isset($search)) {echo $search;} ?>" />
                        <input class="btn btn-secondary" type="submit" name="btnSearch" value="Rechercher" />
                    </div>
                </div>
        </div>
        <br>

        <!-- Affichage des motos -->
        <div class="row">
            <?php foreach ($motos as $moto) { ?>
                <div class="col-md-4" style="margin-bottom: 20px;">
                    <div class="card flex-md-row shadow-sm">
                        <div class="card-body">
                            <h1 class="text-secondary"><?= $moto['Marque'] ?></h1>
                            <hr>
                            <div class="row justify-content-around">
                                <p class="text-primary"><?= $moto['Cylindree'] ?></p>
                                <p class="text-primary"><?= $moto['Couleur'] ?></p>
                                <p class="text-primary"><?= date_format(date_create($moto['DateImmatriculation']), "d-m-Y"); ?></p>
                            </div>
                            <div class="image"> <img class="img img-responsive full-width" src="img/<?= $moto['nomImage']; ?>"></div><br>
                            <?php if (isset($_SESSION["login"])) { ?>
                                <a class="text-white btn btn-info btn-block" href="location.php?noPlaque=<?= $moto['noPlaque']; ?>">Location</a>
                            <?php
                        } else { }
                        ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <footer class="text-center">
        <hr>
        <p>2018-2019 CFPT-informatique LOCAMOTO</p>
        <p>Jacot-dit-Montandon</p>
        <p>
            <a href="#">Retour en haut</a>
        </p>
    </footer>
    <!-- JS code -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
    </script>
    <script src="bootstrap-4.2.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>