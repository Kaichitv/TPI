<?php
/*
  Projet: LOCAMOTO
  Description: Gestion des locations
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

session_start();

require_once('model/locations.php');

$locations = getLocationsUserMoto();

include('view/showmanagelocation.php');