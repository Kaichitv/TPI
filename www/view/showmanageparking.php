<?php
/*
  Projet: LOCAMOTO
  Description: tableau de tous les motos
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
                    <?php include "navigation.php"; ?>
                </div>
                <div class="col-4 text-center">
                    <h1 class="btn-dark">LOCAMOTO</h1>
                </div>

                <div class="col-4 d-flex justify-content-end align-items-center">
                    <?php if (isset($_SESSION["login"])) { ?>
                        <a class="m-2 text-muted" href=<?php echo "saveuser.php?idUser=" . $_SESSION["idUser"]; ?>>Profil</a>
                        <a href="logout.php"><button type="button" class="btn btn-sm btn-outline-secondary">Déconnexion</button></a>
                    <?php } else { ?>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#loginModal">Connexion</button>
                    <?php } ?>
                </div>
            </div>
            <hr>
        </header>

        <!-- Notification -->
        <?php
            if(isset($_GET["message1"]))
            {
                echo '<div class="alert alert-success" role="alert">La moto a été mise à jour.</div>';
            }
            if(isset($_GET["message2"]))
            {
                echo '<div class="alert alert-success" role="alert">La moto a été ajoutée.</div>';
            }
            if(isset($_GET["message3"]))
            {
                echo '<div class="alert alert-danger" role="alert">Problème lors du téléchargement de l\'image</div>';
            }
            if(isset($_GET["message4"]))
            {
                echo '<div class="alert alert-danger" role="alert">Veuillez remplir tous les champs.</div>';
            }
        ?>

        <!-- Tableau -->
        <div class="row">
            <div class="col-10">
                <h4>Liste des motos dans le parking</h4><br>
            </div>

            <div class="col-2">
                <a class="m-2 text-muted pull-right" href="savemoto.php">Nouvelle moto</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
        <table class="table table-striped table-condensed">
            <thead class="thead-dark">
                <tr>
                    <th>n° Plaque</th>
                    <th>Marque</th>
                    <th>Cylindree</th>
                    <th>Couleur</th>
                    <th>Date d'immatriculation</th>
                    <th>Edition</th>
                </tr>

            </thead>

            <?php
            // On fait une boucle pour lister tout ce que contient la table :
            foreach ($motos as $moto) {
                ?>
                <tr>
                    <td><?php echo $moto['noPlaque']; ?></td>
                    <td><?php echo $moto['Marque']; ?></td>
                    <td><?php echo $moto['Cylindree']; ?></td>
                    <td><?php echo $moto['Couleur']; ?></td>
                    <td><?php echo date_format(date_create($moto['DateImmatriculation']), "d.m.Y"); ?></td>
                    <td>
                        <a class="btn btn-default btn-sm" href="savemoto.php?noPlaque=<?php echo $moto['noPlaque'] ?>">✎</a>
                    </td>
                </tr>
            <?php
        }
        ?>
        </table>
            </div>
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