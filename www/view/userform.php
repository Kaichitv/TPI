<?php
/*
  Projet: LOCAMOTO
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
                        <a href="logout.php"><button type="button" class="btn btn-sm btn-outline-secondary">Déconnexion</button></a>
                    <?php } else { ?>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#loginModal">Connexion</button>
                    <?php } ?>
                </div>
            </div>
        </header>
        <div class="row">
            <div class="col-sm-10">
                <h4>Editer un utilisateur</h4>
            </div>
        </div>

        <form action="saveuser.php" method="POST" class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-sm-3" for="lastname">Nom: *</label>
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="lastname" id="lastname" value="<?php if(isset($lastname)){echo $lastname;} ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="firstname">Prénom: *</label>
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="firstname" id="firstname" value="<?php if(isset($firstname)){echo $firstname;} ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="pseudo">Pseudo: *</label>
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="pseudo" id="pseudo" value="<?php if(isset($pseudo)){ echo $pseudo;} ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email: *</label>
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="email" id="email" value="<?php if(isset($email)){echo $email;} ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="birthday">Date d'anniversaire: *</label>
                <div class="col-sm-12">
                    <input class="form-control" type="date" name="birthday" id="birthday" value="<?php if(isset($birthday)){echo $birthday;} ?>" />
                </div>
            </div>

            <?php if(!isset($_GET["idUser"]))
            { ?>
            <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Mot de passe: *</label>
                <div class="col-sm-12">
                    <input class="form-control" type="password" name="pwd" id="pwd" />
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-3" for="pwd2">Confirmation<br>Mot de passe: *</label>
                <div class="col-sm-12">
                    <input class="form-control" type="password" name="pwd2" id="pwd2" />
                </div>
            </div>
            <?php
            }
            ?>

            <div class="form-group">
                <div class="col-sm-3">
                (* champs obligatoires)<br>
                    <input type="hidden" name="idUser" value="<?php if(isset($idUser)){echo $idUser;}else{echo "";} ?>">
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