<?php
/*
  Projet: ATSUPP
  Description: Controleur des motos
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

 session_start();

require_once 'model/motos.php';

$motos = getMotos();

include 'view/showmotos.php';