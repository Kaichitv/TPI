<?php
/*
  Projet: LOCAMOTO
  Description: Suppression d'un utilisateur
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

session_start();

require_once('model/users.php');

if (isset($_POST['idUtilisateur'])) {
    $idUser = filter_input(INPUT_POST, 'idUtilisateur', FILTER_VALIDATE_INT);
}
if (filter_has_var(INPUT_POST,'submit')) {
    if(is_numeric($idUser))
    {
        if(deleteUser($idUser)){
            echo '<div class="alert alert-success" role="alert">Utilisateur supprimé</div>';
            header("Location: manageuser.php");
        }
    } 
}