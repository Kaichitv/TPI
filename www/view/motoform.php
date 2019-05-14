<?php
/*
  Projet: LOCAMOTO
  Description: Formulaire de moto
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
                <h4>Editer une moto</h4>
            </div>
        </div>

        <form action="savemoto.php" method="POST" class="form-horizontal" enctype="multipart/form-data">

            <div class="form-group">
                <label class="control-label col-sm-3" for="plaque">n° Plaque: *</label>
                <div class="col-sm-12">
                    <input class="form-control" type="number" name="plaque" id="plaque" required value="<?php if(isset($noPlaque)){echo $noPlaque;} ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="marque">Marque: *</label>
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="marque" id="marque" required value="<?php if(isset($marque)){echo $marque;} ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="cylinder">Cylindree: *</label>
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="cylinder" id="cylinder" required value="<?php if(isset($cylinder)){ echo $cylinder;} ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="color">Couleur: *</label>
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="color" id="color" required value="<?php if(isset($color)){echo $color;} ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="registrationDate">Date d'immatriculation: *</label>
                <div class="col-sm-12">
                    <input class="form-control" type="date" name="registrationDate" id="registrationDate" required value="<?php if(isset($registrationDate)){echo $registrationDate;} ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="image">Selectionnez une image: </label>
                    <div class="col-sm-12">
                        <input class="form-control" type="file" name="image" id="image" required/>
                    </div>
            </div>

            <div class="form-group">
                <div class="col-sm-3">
                (* champs obligatoires)<br>
                <?php if(isset($_GET["noPlaque"]))
                {
                    echo '<input type="hidden" name="update" value="true">';
                    echo '<input type="hidden" name="idImage" value="'. $idImage .'">';
                } ?>
                </div>
                <div class="col-sm-12 row justify-content-end">
                    <input class="btn btn-success" type="submit" name="submit" value="Enregistrer" />
                </div>
            </div>
        </form>

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