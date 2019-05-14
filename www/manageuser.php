<?php
/*
  Projet: LOCAMOTO
  Description: Gestion des utilisateurs
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

session_start();

require_once('model/users.php');

$users = GetAllUsers();

include('view/showmanageuser.php');