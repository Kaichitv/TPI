<?php

/*
  Projet: LOCAMOTO
  Description: fonctions de gestions de la table motos
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

require_once 'dbconnections.php';

/**
 * Récupère tous les enregistrements de la table motos
 * @return array tableau contenant les enregistrements 
 */
function getMotos()
{
    $db = connectDb();
    $sql = "SELECT `noPlaque`, `Marque`, `Cylindree`, `Couleur`, `DateImmatriculation` FROM `Motos`";
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
 * Récupère tous les enregistrements de la table motos ainsi que les images
 * @return array tableau contenant les enregistrements 
 */
function getMotosImages()
{
    $db = connectDb();
    $sql = "SELECT `noPlaque`, `Marque`, `Cylindree`, `Couleur`, `DateImmatriculation`, `nomImage` FROM `Motos` as m, `Images` as i WHERE m.idImage=i.idImage";
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
 * Récupère tous les enregistrements de la table motos ainsi que les images qui correspondent à la recherche
 * @return array tableau contenant les enregistrements 
 */
function getMotosSearch($search)
{
    $db = connectDb();
    $sql = "SELECT `noPlaque`, `Marque`, `Cylindree`, `Couleur`, `DateImmatriculation`, `nomImage` FROM `Motos` as m, `Images` as i WHERE m.idImage=i.idImage AND `Marque` LIKE '$search%' OR `Cylindree` LIKE '$search%'";
	$request = $db->prepare($sql);
	try {
        $request->bindParam(":search", $search, PDO::PARAM_STR);
		$request->execute();
		return $request->fetchAll();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
}

/**
 * Ajoute un enregistrement à la table motos
 * @param string $noPlaque noPlaque de la moto
 * @param string $marque marque de la moto
 * @param string $cylindree cylindree de la moto
 * @param string $couleur couleur de la moto
 * @param string $dateImmatriculation date d'immatriculation de la moto
 */
function addMoto($noPlaque, $marque, $cylindree, $couleur, $dateImmatriculation)
{
    $db = connectDb();
	$sql = "INSERT INTO `Motos` (`noPlaque`, `Marque`, `Cylindree`, `Couleur`, `DateImmatriculation`)  VALUE (:noPlaque, :marque, :cylindree, :couleur, :dateImmatriculation)";
	$request = $db->prepare($sql);
	try{
		$request->bindParam(":noPlaque", $noPlaque, PDO::PARAM_INT);
		$request->bindParam(":marque", $marque, PDO::PARAM_STR);
		$request->bindParam(":cylindree", $cylindree, PDO::PARAM_STR);
		$request->bindParam(":couleur", $couleur, PDO::PARAM_STR);
		$request->bindParam(":dateImmatriculation", $dateImmatriculation, PDO::PARAM_STR);
		$request->execute();
		return true;
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
}

/**
 * Ajoute un enregistrement à la table motos
 * @param string $noPlaque noPlaque de la moto
 * @param string $marque marque de la moto
 * @param string $cylindree cylindree de la moto
 * @param string $couleur couleur de la moto
 * @param string $dateImmatriculation date d'immatriculation de la moto
 */
function updateMoto($noPlaque, $marque, $cylindree, $couleur, $dateImmatriculation)
{
    $db = connectDb();
	$sql = "UPDATE `Motos` SET `noPlaque`=:noPlaque, `Marque`=:marque, `Cylindree`=:cylindree, `Couleur`=:couleur, `DateImmatriculation`=:dateImmatriculation WHERE noPlaque=:noPlaque";
	$request = $db->prepare($sql);
	try{
		$request->bindParam(":noPlaque", $noPlaque, PDO::PARAM_INT);
		$request->bindParam(":marque", $marque, PDO::PARAM_STR);
		$request->bindParam(":cylindree", $cylindree, PDO::PARAM_STR);
		$request->bindParam(":couleur", $couleur, PDO::PARAM_STR);
		$request->bindParam(":dateImmatriculation", $dateImmatriculation, PDO::PARAM_STR);
		$request->execute();
		return true;
	}
	catch (PDOException $e) {
        echo 'Problème d\'insertion à la base de données: '.$e->getMessage();
		return false;
	}
}