<?php
/*
  Projet: LOCAMOTO
  Description: Suppression d'une réservation
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

session_start();

require_once('model/locations.php');

if (isset($_POST['idLocation'])) {
    $idLocation = filter_input(INPUT_POST, 'idLocation', FILTER_VALIDATE_INT);
}
if (filter_has_var(INPUT_POST,'submit')) {
    if(is_numeric($idLocation))
    {
        if(deleteLocation($idLocation)){
            header("Location: managelocation.php?message1");
        }
    } 
}