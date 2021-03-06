<?php
/*
  Projet: LOCAMOTO
  Description: Page de location
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */
session_start();

require_once("model/motos.php");
require_once("model/locations.php");

if(isset($_GET["noPlaque"]))
{
    $noPlaque = filter_input(INPUT_GET, "noPlaque", FILTER_SANITIZE_STRING);
}

$moto = getMotoByPlaque($noPlaque);

$locations = getLocationsJSONByPlaque($noPlaque);

include 'view/showlocation.php';