<?php
/*
  Projet: LOCAMOTO
  Description: Controleur des motos
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

session_start();

require_once('model/users.php');

$firstname = NULL;

if(isset($_GET["idUser"])){
    $idUser = $_GET["idUser"];
    $user = getUserById($idUser);
    $lastname = $user["Nom"];
    $firstname = $user["Prenom"];
    $pseudo = $user["Pseudo"];
    $email = $user["Email"];
    $birthday = $user["DateNaissance"];
    $password = $user["MotDePasse"];
    $password2 = $user["MotDePasse"];

}

// récupération des données provenant des données saisies par l'utilisateur
if (isset($_POST['idUser'])) {
    $idUser = filter_input(INPUT_POST, 'idUser', FILTER_VALIDATE_INT);
}
if (isset($_POST["lastname"])) {
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING));
}
if (isset($_POST["firstname"])) {
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
}
if (isset($_POST["pseudo"])) {
    $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_STRING);
}
if (isset($_POST["email"])) {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
}
if (isset($_POST["birthday"])) {
    $birthday = filter_input(INPUT_POST, "birthday", FILTER_SANITIZE_STRING);
}
if (isset($_POST["pwd"])) {
    $password = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_STRING);
}
if (isset($_POST["pwd2"])) {
    $password2 = filter_input(INPUT_POST, "pwd2", FILTER_SANITIZE_STRING);
}

if (filter_has_var(INPUT_POST,'submit')) {
if (!empty($firstname) && !empty($lastname) && !empty($pseudo) && !empty($email) && !empty($birthday) &&  isset($password)==isset($password2)) {
    if(is_numeric($idUser))
    {
        if(updateUser($idUser, $lastname, $firstname, $pseudo, $email, $birthday)){
            echo '<div class="alert alert-success" role="alert">Utilisateur mis à jour.</div>';
            header("Refresh:1; url=index.php");
        }
    } else if($idUser = addUser($lastname, $firstname, $pseudo, $email, $birthday, $password)){
            echo '<div class="alert alert-success" role="alert">Utilisateur ajouté.</div>';
            header("Refresh:2; Location:index.php");
        }
    }
}

include 'view/userform.php';