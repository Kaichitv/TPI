<?php
/*
  Projet: ATSUPP
  Description: Controleur des motos
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

session_start();

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
    $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_pseudo);
}
if (isset($_POST["email"])) {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_pseudo);
}
if (isset($_POST["birthday"])) {
    $birthday = filter_input(INPUT_POST, "birthday", FILTER_SANITIZE_pseudo);
}
if (isset($_POST["pwd"])) {
    $pwd = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_STRING);
}
if (isset($_POST["pwd2"])) {
    $pwd2 = filter_input(INPUT_POST, "pwd2", FILTER_SANITIZE_STRING);
}

if (!empty($firstname) && !empty($lastname) && !empty($pseudo) && !empty($email) && !empty($birthday) &&  !empty($password)) {
    if(is_numeric($idUser))
    {
        updateUser($idUser, $lastname, $firstname, $pseudo, $email, $birthday, $password);
    } else{
        $idUser = addUser($lastname, $firstname, $pseudo, $email, $birthday, $password);
        header("Location:index.php");
    }
} 

include 'view/userform.php';