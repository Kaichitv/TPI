<?php
/*
  Projet: LOCAMOTO
  Description: Sauvegarde d'une location
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

session_start();

require_once('model/locations.php');

//Récupération des données provenant des données saisies par l'utilisateur
if (isset($_POST['plaque'])) {
    $noPlaque = filter_input(INPUT_POST, 'plaque', FILTER_SANITIZE_STRING);
}
if(isset($_POST['idUser'])){
    $idUser = filter_input(INPUT_POST, 'idUser', FILTER_SANITIZE_STRING);
}
if(isset($_POST['datestart'])){
    $datestart = filter_input(INPUT_POST, 'datestart', FILTER_SANITIZE_STRING);
}
if(isset($_POST['dateend'])){
    $dateend = filter_input(INPUT_POST, 'dateend', FILTER_SANITIZE_STRING);
}
if(isset($_POST['price'])){
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
}

$date = date("Y-m-d H:i:s");

if(!empty($noPlaque) && !empty($idUser) && !empty($datestart) && !empty($dateend) && !empty($price))
{
    addLocation($date, $datestart, $dateend, $price, $idUser, $noPlaque);
    header("Location: index.php?message4");
} else{
    header("Location: location.php?message1");
}