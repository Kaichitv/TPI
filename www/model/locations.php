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

function GetLocationsById()
{
    
}