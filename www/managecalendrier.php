<?php
/*
  Projet: LOCAMOTO
  Description: Page de gestion du calendrier
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */
session_start();

require_once("model/locations.php");

$locations = getLocationsJSON();

include 'view/showcalendrier.php';