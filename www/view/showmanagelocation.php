<?php
/*
  Projet: LOCAMOTO
  Description: Tableau de tous les réservations en attente
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
                        <a class="m-2 text-muted" href=<?= "saveuser.php?idUser=" . $_SESSION["idUser"]; ?>>Profil</a>
                        <a href="logout.php"><button type="button" class="btn btn-sm btn-outline-secondary">Déconnexion</button></a>
                    <?php } else { ?>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#loginModal">Connexion</button>
                    <?php } ?>
                </div>
            </div>
            <hr>
        </header>

        <?php
            if(isset($_GET["message1"]))
            {
                echo '<div class="alert alert-danger" role="alert">Réservation supprimée</div>';
            }
            if(isset($_GET["message2"]))
            {
                echo '<div class="alert alert-success" role="alert">Réservation approuvée, Email envoyé.</div>';
            }
        ?>

        <div class="row">
            <div class="col-sm-10">
                <h4>Liste des locations</h4>
            </div>

            <div class="col-sm-2">
                <a class="btn btn-sm btn-outline-secondary pull-right mx-5" href="managecalendrier.php">Calendrier</a>
            </div>
        </div><br>

        <table class="table table-striped table-condensed">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Réservé le</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Prix</th>
                    <th>Avis</th>
                    <th>Pseudo</th>
                    <th>Moto</th>
                    <th>n° Plaque</th>
                    <th>Validé</th>
                </tr>
            </thead>

            <?php
            // On fait une boucle pour lister tout ce que contient la table :
            foreach ($locations as $location) {
                ?>
                <tr>
                    <td><?= $location['idLocation']; ?></td>
                    <td><?= date_format(date_create($location['DateReservation']), "d.m.Y"); ?></td>
                    <td><?= date_format(date_create($location['DateDebut']), "d.m.Y"); ?></td>
                    <td><?= date_format(date_create($location['DateFin']), "d.m.Y"); ?></td>
                    <td><?= $location['PrixJour']; ?>.-</td>
                    <td><?= $location['Avis']; ?></td>
                    <td><?= $location['Pseudo']; ?></td>
                    <td><?= $location['Marque']; ?></td>
                    <td><?= $location['noPlaque']; ?></td>
                    <td>
                        <button data-toggle="modal" class="btn btn-default btn-sm" href="#validate<?= $location['idLocation'];?>">✔</button>
                        <div class="modal fade" id="validate<?= $location['idLocation']; ?>" tabindex="-1" role="dialog" aria-labelledby="validate" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Voulez vous vraiement valider la location et envoyer un mail ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><b>Destinataire :</b>
                                            <?= $location['Email']; ?><br>
                                            <b>Contenu : </b> Votre réservation du véhicule :
                                            <?= $location['Marque']; ?> du :
                                            <?= date_format(date_create($location['DateDebut']), "d.m.Y"); ?> jusqu'au :
                                            <?= date_format(date_create($location['DateFin']), "d.m.Y"); ?> a été approuvée au prix de : 
                                            <?= $location['PrixJour']; ?>.- CHF
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="sendmail.php" method="post">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <input type="hidden" name="email" value="<?=  $location['Email']; ?>" />
                                            <input type="hidden" name="dateStart" value="<?=  $location['DateDebut']; ?>" />
                                            <input type="hidden" name="dateEnd" value="<?=  $location['DateFin']; ?>" />
                                            <input type="hidden" name="price" value="<?=  $location['PrixJour']; ?>" />
                                            <input type="hidden" name="marque" value="<?=  $location['Marque']; ?>" />
                                            <input class="btn btn-success" type="submit" name="submit" value="Valider" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--modal validate -->
                        <script>
                            $(document).ready(function() {
                                $("#validate<?= $location['idLocation']; ?>").modal();
                            });
                        </script>
                        <button data-toggle="modal" class="btn btn-default btn-sm" href="#delete<?= $location['idLocation'];?>">✖</button>
                        <div class="modal fade" id="delete<?= $location['idLocation']; ?>" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Voulez vous vraiement supprimer cet enregistrement ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Réservation faite par :
                                            <?= $location['Pseudo']; ?><br>Pour la moto :
                                            <?= $location['Marque']; ?>
                                            <?= $location['noPlaque']; ?>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="deletelocation.php" method="post">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <input type="hidden" name="idLocation" value="<?=  $location['idLocation']; ?>" />
                                            <input class="btn btn-danger" type="submit" name="submit" value="Supprimer" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--modal delete -->
                        <script>
                            $(document).ready(function() {
                                $("#delete<?= $location['idLocation']; ?>").modal();
                            });
                        </script>
                    </td>
                </tr>
            <?php
        }
        ?>
        </table>

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