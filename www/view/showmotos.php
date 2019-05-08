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
                    <nav class="nav d-flex justify-content-between">
                        <a class="p-2 text-muted" href="index.php">Accueil</a>
                    </nav>
                </div>
                <div class="col-4 text-center">
                    <h1 class="btn-dark">LOCAMOTO</h1>
                </div>

                <div class="col-4 d-flex justify-content-end align-items-center">
                    <?php if (isset($_SESSION["login"])) { ?>
                        <a href="logout.php"><button type="button" class="btn btn-sm btn-outline-secondary">Déconnexion</button></a>
                    <?php } else { ?>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#loginModal">Connexion</button>
                    <?php } ?>
                </div>
            </div>
        </header>

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
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal-->
            <script>
                $(document).ready(function () {
                    $("#loginModal").modal();
                });
            </script>
    </div>
    <footer class="blog-footer text-center">
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