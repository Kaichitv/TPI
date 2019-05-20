<?php
/*
  Projet: LOCAMOTO
  Description: Gestion des motos
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

session_start();

require_once('model/motos.php');

$motos = getMotos();

if($_SESSION["statut"]!= 2)
{
    header("Location: index.php");
}

include('view/showmanageparking.php');