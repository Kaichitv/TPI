<?php
/*
  Projet: LOCAMOTO
  Description: Page d'avis
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */
session_start();

require_once("model/locations.php");

if(isset($_GET["noPlaque"]))
{
    $noPlaque = filter_input(INPUT_GET, "noPlaque", FILTER_SANITIZE_STRING);
}
if(isset($_GET["idUser"]))
{
    $idUser = filter_input(INPUT_GET, "idUser", FILTER_SANITIZE_STRING);
}

$locations = getLocationsByUserPlaque($noPlaque, $idUser);

if(empty($locations)){
    header("Location: index.php?message5");
}

include 'view/showadvice.php';