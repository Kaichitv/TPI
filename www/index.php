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

if (filter_has_var(INPUT_POST,'search')) {
    if(isset($_POST["search"]))
    {
        $search = trim(filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING)); // . "%";
        $motos = getMotosSearch($search);
    }
}else{
    $motos = getMotosImages();
}

include 'view/showmotos.php';