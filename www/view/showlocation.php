<?php
/*
  Projet: LOCAMOTO
  Description: Formulaire de location / calendrier
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
    <!-- Plugins css pour un affichage correct des différents plugins utilisés-->
    <link href='./fullcalendar-4.1.0/packages/core/main.css' rel='stylesheet' />
    <link href='./fullcalendar-4.1.0/packages/daygrid/main.css' rel='stylesheet' />
    <link href='./fullcalendar-4.1.0/packages/timegrid/main.css' rel='stylesheet' />
    <link href='./fullcalendar-4.1.0/packages/list/main.css' rel='stylesheet' />
    <!-- Plugins JS pour le bon fonctionnement des différents plugins utilisés-->
    <script src='./fullcalendar-4.1.0/packages/core/main.js'></script>
    <script src='./fullcalendar-4.1.0/packages/daygrid/main.js'></script>
    <script src='./fullcalendar-4.1.0/packages/timegrid/main.js'></script>
    <script src='./fullcalendar-4.1.0/packages/list/main.js'></script>
    <!-- Plugin pour séléctionner une date dans le calendrier et pour mettre le calendrier en francais -->
    <script src='./fullcalendar-4.1.0/packages/interaction/main.js'></script>
    <script src='./fullcalendar-4.1.0/packages/core/locales/fr-ch.js'></script>
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
                echo '<div class="alert alert-danger" role="alert">Veuillez remplir tous les champs.</div>';
            }
        ?>

        <div class="row">
            <div class="col-sm-10">
                <h4>Louer une moto</h4><br>
            </div>
        </div>

        <script>
            //list d'evenement a afficher dans le calendrier (propriétés events)
            var data = [{
                    "title": "Réservée",
                    "start": "2019-05-01"
                },
                /*<?php foreach($locations as $location) {?>
                {
                    "title": "Réservée",
                    "start": "2019-05-07",
                    "end": "2019-05-10"
                },
            <?php } ?>*/
                {
                    "title": "Réservée",
                    "start": "2019-05-11",
                    "end": "2019-05-13"
                },
            ]
        </script>
        <div class="row">
            <div id='calendar' class="col-sm-8"></div>
            <div class="col-sm-4 justify-content-end" >
                <h3> Votre sélection : </h3><hr>
            <h1 class="text-secondary mx-2"><?= $moto['Marque'] ?></h1>
            <h5 class="text-black-50 mx-4"><?= $moto['Cylindree'] ?></h5>
            <h5 class="text-black-50 mx-4"><?= $moto['Couleur'] ?></h5>
            <h5 class="text-black-50 mx-4"><?= $moto['DateImmatriculation'] ?></h5>
                <form action="savelocation.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-sm-5" for="datestart">Date de début: </label>
                        <div class="col-sm-12">
                            <input class="form-control" type="date" name="datestart" id="datestart" required value="" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-5" for="dateend">Date de fin: </label>
                        <div class="col-sm-12">
                            <input class="form-control" type="date" name="dateend" id="dateend" required value="" />
                        </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col" for="price">Prix: </label>
                        <div class="col-sm-4">
                            <input class="form-control" type="number" name="price" id="price" required value="" />
                        </div>
                    </div>

                    <div class="col-sm-12 row justify-content-end">
                        <input type="hidden" type="text" name="idUser" value="<?= $_SESSION["idUser"]; ?>">
                        <input type="hidden" type="number" name="plaque" value="<?= $_GET["noPlaque"]; ?>">
                        <input class="btn btn-success" type="submit" name="submit" value="Louer" />
                    </div>
                </form>
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
</body>
<script>
    //Le script est a mettre en fin de page comme ça le HTML est chargé
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'], //(CSS/JS)
        //Menu avec les différent boutons
        header: { 
            left: 'dayGridMonth,timeGridWeek',
            center: 'title',
            right: 'prevYear,prev,next,nextYear'
        },
        defaultView: 'dayGridMonth', //Type de calendrier a afficher au chargement 
        selectable: true, //Permet de selectionner un jour
        locale: 'fr-ch', //Langue
        textColor: 'white',
        //Fonction à chaque clic de date
        dateClick: function(info) {
            document.getElementById('datestart').value = info.dateStr;
        },
        //Fonction quand on sélectionne plusieurs jours
        select: function(info) {
            document.getElementById('datestart').value = info.startStr;
            document.getElementById('dateend').value = info.endStr;
            //Calcule du prix en direct 
            date1 = new Date(info.startStr);
            date2 = new Date(info.endStr);
            tmp = date2 - date1; //Résultat en milliseconde 
            tmp = Math.floor(tmp/10000000);
            document.getElementById('price').value = tmp;
        },
        events: data

    });
    calendar.render();
</script>

</html>