<?php
/*
  Projet: LOCAMOTO
  Description: Page de connexion
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */
session_start();

require_once 'model/users.php';

if (isset($_POST["pseudo"])) {
    $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_pseudo);
}
if (isset($_POST["password"])) {
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
}
if (!empty($pseudo) && !empty($password)) {
    userExist($pseudo, sha1($password));
    $_SESSION["pseudo"] = $pseudo;
    $idUser = getUserId($pseudo);
    $_SESSION["idUser"] = $idUser;
    $_SESSION["login"] = true;
    header("Location: index.php");
}
else{
    echo "L'utilisateur n'existe pas";
}