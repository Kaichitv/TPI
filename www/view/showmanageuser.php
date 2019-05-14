<?php
/*
  Projet: LOCAMOTO
  Description: tableau de tous les utilisateurs inscrit
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
        <div class="row">
            <div class="col-sm-10">
                <h4>Liste des utilisateurs</h4>
            </div>

            <div class="col-sm-2">
                <a class="m-2 text-muted pull-right" href="saveuser.php">Nouvel utilisateur</a>
            </div>
        </div>

        <table class="table table-bordered table-striped table-condensed">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Date de naissance</th>
                    <th>Edition</th>
                </tr>

            </thead>

            <?php
            // On fait une boucle pour lister tout ce que contient la table :
            foreach ($users as $user) {
                ?>
                <tr>
                    <td><?php echo $user['idUtilisateur']; ?></td>
                    <td><?php echo $user['Nom']; ?></td>
                    <td><?php echo $user['Prenom']; ?></td>
                    <td><?php echo $user['Pseudo']; ?></td>
                    <td><?php echo $user['Email']; ?></td>
                    <td><?php echo date_format(date_create($user['DateNaissance']), "d-m-Y"); ?></td>
                    <td>
                        <a class="btn btn-default btn-sm" href="saveuser.php?idUser=<?php echo $user['idUtilisateur'] ?>">✎</a>
                        <button data-toggle="modal" class="btn btn-default btn-sm" href="#delete<?php echo $user['idUtilisateur'] ?>">✖</button>
                        <div class="modal fade" id="delete<?php echo $user['idUtilisateur'] ?>" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Voulez vous vraiement supprimer cet enregistrement ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><?php echo $user['idUtilisateur']; ?> :
                                            <?php echo $user['Pseudo']; ?>,
                                            <?php echo $user['Prenom']; ?>
                                            <?php echo $user['Nom'] ?>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="deleteuser.php" method="post">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <input type="hidden" name="idUtilisateur" value="<?php echo  $user['idUtilisateur'] ?>" />
                                            <input class="btn btn-danger" type="submit" name="submit" value="Supprimer" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--modal-->
                        <script>
                            $(document).ready(function() {
                                $("#delete<?php echo $user['idUtilisateur'] ?>").modal();
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