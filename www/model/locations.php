<?php

/*
  Projet: LOCAMOTO
  Description: fonctions de gestions de la table locations
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

require_once 'dbconnections.php';

/**
 * Récupère tous les enregistrements de la table locations
 * @return array tableau contenant les enregistrements 
 */
function getLocationsJSON()
{
    $arrayAllLocation = array();

    $db = connectDb();
    $sql = "SELECT `idLocation`, `DateReservation`, `DateDebut`, `DateFin`, `PrixJour`, `Avis`, l.`idUtilisateur`, l.`noPlaque`, `Pseudo`, `Marque` FROM `Locations` l, `Motos` m, `Utilisateurs` as u WHERE l.noPlaque=m.noPlaque AND l.idUtilisateur=u.idUtilisateur";
	$request = $db->prepare($sql);
	try {
		$request->execute();
        $result = $request->fetchAll();
        foreach($result as $location)
        {
            $arrayLocation = array("title"=>"Reservé par: ". $location["Pseudo"] . " Moto : " . $location["Marque"] . " " . $location["noPlaque"], "start"=>$location["DateDebut"], "end"=>$location["DateFin"]);
            array_push($arrayAllLocation, $arrayLocation);
        }
        return json_encode($arrayAllLocation);
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
}

/**
 * Récupère tous les enregistrements de la table locations par numéro de plaque
 * @return array tableau contenant les enregistrements 
 */
function getLocationsJSONByPlaque($noPlaque)
{
    $arrayAllLocation = array();

    $db = connectDb();
    $sql = "SELECT `DateReservation`, `DateDebut`, `DateFin`, `PrixJour`, `Avis`, `idUtilisateur`, `noPlaque` FROM `Locations` WHERE `noPlaque`=:noPlaque";
	$request = $db->prepare($sql);
	try {
        $request->bindParam(":noPlaque", $noPlaque, PDO::PARAM_INT);
		$request->execute();
        $result = $request->fetchAll();
        foreach($result as $location)
        {
            $arrayLocation = array("title"=>"Reservée", "start"=>$location["DateDebut"], "end"=>$location["DateFin"]);
            array_push($arrayAllLocation, $arrayLocation);
        }
        return json_encode($arrayAllLocation);
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
}

/**
 * Récupère tous les enregistrements de la table locations ainsi que le pseudo et la marque 
 * qui viennent de la table utilisateurs et motos
 * @return array tableau contenant les enregistrements 
 */
function getLocationsUserMoto()
{
    $db = connectDb();
    $sql = "SELECT `idLocation`, `DateReservation`, `DateDebut`, `DateFin`, `PrixJour`, `Avis`, l.`idUtilisateur`, l.`noPlaque`, `Pseudo`, `Email`, `Marque` FROM `Locations` l, `Motos` m, `Utilisateurs` as u WHERE l.noPlaque=m.noPlaque AND l.idUtilisateur=u.idUtilisateur";
	$request = $db->prepare($sql);
	try {
		$request->execute();
		return $request->fetchAll();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
    }
}

/**
 * Récupère tous les enregistrements de la table locations ainsi que le pseudo et la marque 
 * qui viennent de la table utilisateurs et motos
 * @return array tableau contenant les enregistrements 
 */
function getLocationsByUserPlaque($noPlaque, $idUser)
{
    $db = connectDb();
    $sql = "SELECT `idLocation`, `DateReservation`, `DateDebut`, `DateFin`, `PrixJour`, `Avis`, l.`idUtilisateur`, l.`noPlaque`, `Pseudo`, `Marque` FROM `Locations` l, `Motos` m, `Utilisateurs` as u WHERE l.noPlaque=m.noPlaque AND l.idUtilisateur=u.idUtilisateur AND l.noPlaque=:noPlaque AND l.idUtilisateur=:idUser";
	$request = $db->prepare($sql);
	try {
        $request->bindParam(":idUser", $idUser, PDO::PARAM_INT);
        $request->bindParam(":noPlaque", $noPlaque, PDO::PARAM_INT);
		$request->execute();
		return $request->fetchAll();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
}

/**
 * Ajouter un enregistrement dans la table locations
 * @param string $DateReservation date à laquelle est effetuée la réservation
 * @param string $DateDebut date qui débute la réservation
 * @param string $DateFin date où se termine la réservation
 * @param int $PrixJour prix de la réservation
 * @param int $idUtilisateur identifiant de l'utilisateur qui réserve
 * @param int $noPlaque identifiant de la moto réservée
 */
function addLocation($DateReservation, $DateDebut, $DateFin, $PrixJour, $idUtilisateur, $noPlaque)
{
    $db = connectDb();
    $sql = "INSERT INTO `Locations` (`DateReservation`, `DateDebut`, `DateFin`, `PrixJour`, `idUtilisateur`, `noPlaque`) VALUE (:DateReservation, :DateDebut, :DateFin, :PrixJour, :idUtilisateur, :noPlaque)";
    $request = $db->prepare($sql);
    try{
        $request->bindParam(":DateReservation", $DateReservation, PDO::PARAM_STR);
        $request->bindParam(":DateDebut", $DateDebut, PDO::PARAM_STR);
        $request->bindParam(":DateFin", $DateFin, PDO::PARAM_STR);
        $request->bindParam(":PrixJour", $PrixJour, PDO::PARAM_INT);
        $request->bindParam(":idUtilisateur", $idUtilisateur, PDO::PARAM_INT);
        $request->bindParam(":noPlaque", $noPlaque, PDO::PARAM_INT);
        $request->execute();
        return true;
    }
    catch (PDOException $e){
        echo 'Problème de lecture de la base de données' .$e->getMessage();
        return false;
    }
}

/**
 * Ajouter un avis sur une réservation dans la table locations
 * @param int $idLocation identifiant de la réservation
 * @param string $Avis avis laissé sur la reservation
 */
function addAvis($idLocation, $Avis)
{
    $db = connectDb();
    $sql = "UPDATE `Locations` SET `Avis`=:Avis WHERE idLocation=:idLocation";
    $request = $db->prepare($sql);
    try{
        $request->bindParam(":idLocation", $idLocation, PDO::PARAM_INT);
        $request->bindParam(":Avis", $Avis, PDO::PARAM_STR);
        $request->execute();
        return true;
    }
    catch (PDOException $e){
        echo 'Problème de lecture de la base de données' .$e->getMessage();
        return false;
    }
}

/**
 * Ajouter un enregistrement dans la table locations
 * @param int $idLocation identifiant de la réservation
 * @param string $DateReservation date à laquelle est effetuée la réservation
 * @param string $DateDebut date qui débute la réservation
 * @param string $DateFin date où se termine la réservation
 * @param int $PrixJour prix de la réservation
 * @param string $Avis avis laissé sur la reservation
 * @param int $idUtilisateur identifiant de l'utilisateur qui réserve
 * @param int $noPlaque identifiant de la moto réservée
 */
function updateLocation($idLocation, $DateReservation, $DateDebut, $DateFin, $PrixJour, $Avis, $idUtilisateur, $noPlaque)
{
    $db = connectDb();
    $sql = "UPDATE `Locations` SET `DateReservation`:DateReservation, `DateDebut`:DateDebut, `DateFin`:DateFin, `PrixJour`:PrixJour, `Avis`:Avis, `idUtilisateur`:idUtilisateur, `noPlaque`:noPlaque WHERE idLocation=:idLocation";
    $request = $db->prepare($sql);
    try{
        $request->bindParam(":idLocation", $idLocation, PDO::PARAM_INT);
        $request->bindParam(":DateReservation", $DateReservation, PDO::PARAM_STR);
        $request->bindParam(":DateDebut", $DateDebut, PDO::PARAM_STR);
        $request->bindParam(":DateFin", $DateFin, PDO::PARAM_STR);
        $request->bindParam(":PrixJour", $PrixJour, PDO::PARAM_INT);
        $request->bindParam(":Avis", $Avis, PDO::PARAM_STR);
        $request->bindParam(":idUtilisateur", $idUtilisateur, PDO::PARAM_INT);
        $request->bindParam(":noPlaque", $noPlaque, PDO::PARAM_INT);
        $request->execute();
        return true;
    }
    catch (PDOException $e){
        echo 'Problème de lecture de la base de données' .$e->getMessage();
        return false;
    }
}

/**
 * Supprime un enregistrement de la table locations
 * @param int $idLocation identifiant de la location
 */
function deleteLocation($idLocation)
{
    $db = connectDb();
	$sql = "DELETE FROM `Locations` WHERE `idLocation`=:idLocation";
	$request = $db->prepare($sql);
	try{
		$request->bindParam(":idLocation", $idLocation, PDO::PARAM_INT);
		$request->execute();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}

	return true;
}

/**
 * Vérifie si une location n'est pas déjà en cours pour cet utilisateur
 * @param int $idUser identifiant de l'utilisateur 
 */
function alreadyLocationExist($idUser)
{
    //Variable contenant de la date du jour
    $today = date("Y-m-d H:i:s");

    $db = connectDb();
    $sql = "SELECT `DateFin`, `idUtilisateur` FROM `Locations` WHERE `idUtilisateur`=:idUtilisateur";
    $request = $db->prepare($sql);
    try{
		$request->bindParam(":idUtilisateur", $idUser, PDO::PARAM_INT);
        $request->execute();
        $date = $request->fetch()["DateFin"];
        if(date_create($date) > $today && $date != NULL)
        {
            return true;
        }else{
            return false;
        }
        
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
    


}