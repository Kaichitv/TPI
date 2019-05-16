<?php
/*
  Projet: LOCAMOTO
  Description: Navigation : Suivant le statut de l'utilisateur, la navigation varie
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

?>

<nav class="navbar d-flex justify-content-between navbar-expand-lg">
<button class="btn btn-sm btn-outline-secondary navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">...</button>
<div class="navbar-collapse collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li><a class="p-2 text-muted" href="index.php">Accueil</a></li>
<?php if(isset($_SESSION["statut"]) && $_SESSION["statut"] == 2) { ?>
    <li><a class="p-2 text-muted" href="manageuser.php">Utilisateurs</a></li>
    <li><a class="p-2 text-muted" href="manageparking.php">Parking</a></li>
    <li><a class="p-2 text-muted" href="managelocation.php">Location</a></li>
    </ul>
</div>
</nav>
<?php } ?>