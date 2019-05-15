<?php
/*
  Projet: RAPOEME
  Description: Page d'avis 
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
                    <h1 class="blog-header-logo btn-dark">LOCAMOTO</h1>
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

        <!-- Notification -->
        <?php
            if(isset($_GET["message1"]))
            {
                echo '<div class="alert alert-success" role="alert">Bienvenu ! Vous êtes connecté</div>';
            }
            if(isset($_GET["message2"]))
            {
                echo '<div class="alert alert-danger" role="alert">Les identifiants n\'existent pas.</div>';
            }
        ?>

        <!-- Affichage des motos -->
        <div class="row">
        <form action="saveadvice.php" method="POST" id="formadvice" class="col-sm-12">
        <div class="form-group">
            <p class="">Rédigez votre avis:</p>
            <textarea class="form-control rounded-1" id="comment" name="comment" rows="6" form="formadvice"></textarea>
        </div>
        </div>
        <p class="">Selectionez la réservation correspondante :</p>
        <div class="row">
            <?php foreach ($locations as $location) { ?>
                <div class="col-md-4" style="margin-bottom: 20px;">
                    <div class="card flex-md-row shadow-sm">
                        <div class="card-body">
                            <h1 class="text-secondary"><?= $location['Marque'] ?></h1>
                            <hr>
                            <div class="row justify-content-around">
                                <p class="text-black">Réservé du : </p>
                                <p class="text-black">Jusqu'au : </p>
                            </div>
                            <div class="row justify-content-around">
                                <p class="text-primary"><?= date_format(date_create($location['DateDebut']), "d-m-Y"); ?></p>
                                <p class="text-primary"><?= date_format(date_create($location['DateFin']), "d-m-Y"); ?></p>
                            </div><hr>
                            <input type="checkbox" name="idLocation" value="<?= $location["idLocation"] ?>">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <input class="btn btn-success col-12" type="submit" value="Envoyer">  
        </form>
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