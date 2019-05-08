<?php

/*
  Projet: LOCAMOTO
  Description: Déconnexion de l'utilisateur 
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

session_start();
session_destroy();
header("Location: index.php");