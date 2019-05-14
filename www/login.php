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
    $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_EMAIL);
}
if (isset($_POST["password"])) {
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
}
if (!empty($pseudo) && !empty($password)) {
    if (userExist($pseudo, sha1($password))) {
        $_SESSION["pseudo"] = $pseudo;
        $idUser = getUserId($pseudo);
        $statut = getUserStatut($pseudo);
        $_SESSION["idUser"] = $idUser;
        $_SESSION["statut"] = $statut;
        $_SESSION["login"] = true;
        header("Location: index.php?message1");
    } else{
        header("Location: index.php?message2");
    }
} else {
    header("Location: index.php?message3");
}
