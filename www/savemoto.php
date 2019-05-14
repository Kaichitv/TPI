<?php
/*
  Projet: LOCAMOTO
  Description: Sauvegarde d'une moto
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

session_start();

require_once('model/motos.php');
require_once('model/images.php');

//Quand un numéro est transmit dans l'url, on place toutes les informations
// de la base dans les champs du formulaire
if(isset($_GET["noPlaque"])){
    $noPlaque = $_GET["noPlaque"];
    $moto = getMotoByPlaque($noPlaque);
    $marque = $moto["Marque"];
    $cylinder = $moto["Cylindree"];
    $color = $moto["Couleur"];
    $registrationDate = $moto["DateImmatriculation"];
    $idImage = $moto["idImage"];
}

//Récupération des données provenant des données saisies par l'utilisateur
if (isset($_POST['plaque'])) {
    $noPlaque = filter_input(INPUT_POST, 'plaque', FILTER_SANITIZE_STRING);
}
if (isset($_POST['marque'])) {
    $marque = filter_input(INPUT_POST, 'marque', FILTER_SANITIZE_STRING);
}
if (isset($_POST['cylinder'])) {
    $cylinder = filter_input(INPUT_POST, 'cylinder', FILTER_SANITIZE_STRING);
}
if (isset($_POST['color'])) {
    $color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
}
if (isset($_POST['registrationDate'])) {
    $registrationDate = filter_input(INPUT_POST, 'registrationDate', FILTER_SANITIZE_STRING);
}
if (isset($_POST['update'])) {
    $update = filter_input(INPUT_POST, 'update', FILTER_SANITIZE_STRING);
}
if (isset($_POST['idImage'])) {
    $idImage = filter_input(INPUT_POST, 'idImage', FILTER_SANITIZE_STRING);
}
if (isset($_FILES["image"])) {
    $dossier = 'img/';
    $nameImage = $_FILES["image"]["name"];
    $linkImage = $dossier . $nameImage;
}

//Vérification que le bouton submit est préssé 
if (filter_has_var(INPUT_POST, 'submit')) {
    //Vérification qu'aucun champ n'est vide
    if (!empty($noPlaque) && !empty($marque) && !empty($cylinder) && !empty($color) && !empty($registrationDate)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $dossier . $nameImage)) {
            if($update){
                updateImage($idImage, $nameImage, $linkImage);
                updateMoto($noPlaque, $marque, $cylinder, $color, $registrationDate);
                header("Location: manageparking.php#message1");
            } else{
                $idImage = addImage($nameImage, $linkImage);
                addMoto($noPlaque, $marque, $cylinder, $color, $registrationDate, $idImage);
                header("Location: manageparking.php#message2");
            }
        }
        header("Location: manageparking.php#message3");
    }
    header("Location: manageparking.php#message4");
}

include 'view/motoform.php';