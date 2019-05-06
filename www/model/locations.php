<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/TPI/www/db/database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/TPI/www/class/ELocation.php';

/**
 * @brief Retourne le tableau des locations de type ELocation
 * @return [array of ELocation] Le tableau de ELocation
 */
function GetAllLocations()
{
	// On crée un tableau qui va contenir les objets ELocation
	$arr = array();

    $sql = "SELECT `idLocation`, `DateStart`, `DateStop` FROM `Locations`";
	$request = EDatabase::prepare($sql);
	try {
		$request->execute();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
	// On parcoure les enregistrements 
	while ($row=$request->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_NEXT)){
		// On crée l'objet ELocation en l'initialisant avec les données provenant
		// de la base de données
		$l = new ELocation($row['idLocation'], $row['DateStart'], $row['DateStop']);
		// On place l'objet ELocation créé dans le tableau
		array_push($arr, $l);
	}        
	// On retourne le tableau contenant les utilisateurs sous forme ELocation
	return $arr;
}

function GetLocationsById($location)
{
    $arr = array();

	$sql = "SELECT `DateStart`, `DateStop` FROM `Locations` WHERE `idLocation`=:idLocation";
	$request = EDatabase::prepare($sql);
	try{
    $request->bindParam(":idLocation", $location->idLocation, PDO::PARAM_STR);
    $request->execute();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}

	return $arr;
}

function AddLocation($location)
{
	$sql = "INSERT INTO `LOCATIONS` (`DateStart`, `DateStop`)  VALUE (:email, :nickname)";
	$request = EDatabase::prepare($sql);
	try{
		$request->bindParam(":email", $location->DateStart, PDO::PARAM_STR);
		$request->bindParam(":nickname", $location->DateStop, PDO::PARAM_STR);
		$request->execute();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}

	return true;
}