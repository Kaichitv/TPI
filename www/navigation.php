<?php
/*
  Projet: LOCAMOTO
  Description: Navigation : Suivant le statut de l'utilisateur, la navigation varie
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

?>

<nav class="nav d-flex justify-content-between">
    <a class="p-2 text-muted" href="index.php">Accueil</a>
<?php if(isset($_SESSION["statut"]) == 2) { ?>
    <a class="p-2 text-muted" href="manageUser.php">Utilisateurs</a>
    <a class="p-2 text-muted" href="manageParking.php">Parking</a>
    <a class="p-2 text-muted" href="manageLocation.php">Location</a>
</nav>
<?php } ?>