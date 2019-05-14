<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
        <!--    Bootstrapp  4.0.0  -->
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />
        <!-- Plugins css pour un affichage correct des différents plugins utilisés-->
        <link href='fullcalendar-4.1.0/packages/core/main.css' rel='stylesheet' />
        <link href='fullcalendar-4.1.0/packages/daygrid/main.css' rel='stylesheet' />
        <link href='fullcalendar-4.1.0/packages/timegrid/main.css' rel='stylesheet' />
        <link href='fullcalendar-4.1.0/packages/list/main.css' rel='stylesheet' />
        <!-- Plugins JS pour le bon fonctionnement des différents plugins utilisés-->
        <script src='fullcalendar-4.1.0/packages/core/main.js'></script>
        <script src='fullcalendar-4.1.0/packages/daygrid/main.js'></script>
        <script src='fullcalendar-4.1.0/packages/timegrid/main.js'></script>
        <script src='fullcalendar-4.1.0/packages/list/main.js'></script>
        <!-- Plugin pour séléctionner une date dans le calendrier et pour mettre le calendrier en francais -->
        <script src='fullcalendar-4.1.0/packages/interaction/main.js'></script>
        <script src='fullcalendar-4.1.0/packages/core/locales/fr-ch.js'></script>
        <title>Calendar</title>
    </head>

    <body>
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
        <script>
            //list d'evenement a afficher dans le calendrier (propriétés events)
            var data = [
                {
                    "title": "All Day Event",
                    "start": "2019-05-01"
                },
                {
                    "title": "Long Event",
                    "start": "2019-05-07",
                    "end": "2019-05-10"
                },
                {
                    "id": "999",
                    "title": "Repeating Event",
                    "start": "2019-05-09T16:00:00-05:00"
                },
                {
                    "id": "999",
                    "title": "Repeating Event",
                    "start": "2019-05-16T16:00:00-05:00"
                },
                {
                    "title": "Conference",
                    "start": "2019-05-11",
                    "end": "2019-05-13"
                },
                {
                    "title": "Meeting",
                    "start": "2019-05-12T10:30:00-05:00",
                    "end": "2019-05-12T12:30:00-05:00"
                },
                {
                    "title": "Lunch",
                    "start": "2019-05-12T12:00:00-05:00"
                },
                {
                    "title": "Meeting",
                    "start": "2019-05-12T14:30:00-05:00"
                },
                {
                    "title": "Happy Hour",
                    "start": "2019-05-12T17:30:00-05:00"
                },
                {
                    "title": "Dinner",
                    "start": "2019-05-12T20:00:00"
                },
                {
                    "title": "Birthday Party",
                    "start": "2019-05-13T07:00:00-05:00"
                }
            ]
        </script>
        <div style="row justify-content">
            <div id='calendar' class="col-sm-8"></div>
            <div class="col-sm-4">
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
            <div class="col-sm-12 row justify-content-end">
                <input class="btn btn-success" type="submit" name="submit" value="Louer" />
            </div>
        </form>
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
            header: { //Menu avec les différent boutons
                left: 'dayGridMonth,timeGridWeek,timeGridDay,list',
                center: 'title',
                right: 'prevYear,prev,next,nextYear'
            },
            textColor : 'white',
            defaultView: 'dayGridMonth', //Type de calendrier a afficher au chargement 
            selectable: true, //Permet de selectionner un jour
            locale: 'fr-ch', //Langue
            dateClick: function (info) { // function a chaque click de date
                alert('Date: ' + info.dateStr);
                //alert('Resource ID: ' + info.resource.id);
            },
            events: data

        });
        calendar.render();

    </script>
</html>