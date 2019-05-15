<?php
/*
  Projet: LOCAMOTO
  Description: Sauvegarde d'un avis
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

session_start();

require_once('model/locations.php');

//Récupération des données provenant des données saisies par l'utilisateur
if(isset($_POST['idLocation'])){
    $idLocation = filter_input(INPUT_POST, 'idLocation', FILTER_SANITIZE_STRING);
}
if (isset($_POST['comment'])) {
    $advice = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
}

if(!empty($advice) && !empty($idLocation))
{
    addAvis($idLocation, $advice);
    header("Location: index.php?message6");
}