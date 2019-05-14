<?php

/*
  Projet: LOCAMOTO
  Description: fonctions de gestions de la table images
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

require_once 'dbconnections.php';

/**
 * Ajoute un enregistrement à la table images
 * @param string $nameImage nom d'image
 * @param string $linkImage lien de l'image
 */
function addImage($nameImage, $linkImage)
{
	$db = connectDb();
	$sql = "INSERT INTO `Images` (`NomImage`, `LienImage`)  VALUE (:nameImage, :linkImage)";
	$request = $db->prepare($sql);
	try{
		$request->bindParam(":nameImage", $nameImage, PDO::PARAM_STR);
		$request->bindParam(":linkImage", $linkImage, PDO::PARAM_STR);
		$request->execute();
		return $db->lastInsertId();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
}

/**
 * Met à jour un enregistrement de la table images
 * @param string $nameImage nom d'image
 * @param string $linkImage lien de l'image
 */
function updateImage($idImage, $nameImage, $linkImage)
{
    $db = connectDb();
	$sql = "UPDATE `Images` SET `NomImage`=:nameImage, `LienImage`=:linkImage WHERE idImage=:idImage";
	$request = $db->prepare($sql);
	try{
		$request->bindParam(":idImage", $idImage, PDO::PARAM_INT);
		$request->bindParam(":nameImage", $nameImage, PDO::PARAM_STR);
		$request->bindParam(":linkImage", $linkImage, PDO::PARAM_STR);
		$request->execute();
		return true;
	}
	catch (PDOException $e) {
        echo 'Problème d\'insertion à la base de données: '.$e->getMessage();
		return false;
	}
}