<?php
/*
  Projet: LOCAMOTO
  Description: fonctions de gestions de la table utilisateurs
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

require_once('dbconnections.php');

/**
 * Récupère tous les enregistrements de la table users
 * @return array tableau contenant les enregistrements 
 */
function GetAllUsers()
{
	$db = connectDb();
    $sql = "SELECT `Nom`, `Prenom`, `Pseudo`, `MotDePasse`, `Email`, `DateNaissance`, `Statut` FROM `Utilisateurs`";
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
 * Retourne les données de l'enregistrement idUser
 * @param int $idUser ID de l'utilsateur dont on veut le détail
 * @return array|NULL 
 */
function getUserById($idUser) {
    $db = connectDb();
    $sql = "SELECT `Nom`, `Prenom`, `Pseudo`, `MotDePasse`, `Email`, `DateNaissance`, `Statut` FROM utilisateurs WHERE idUtilisateur = :idUser";
	$request = $db->prepare($sql);
	try{
		$request->bindParam(":idUser", $idUser, PDO::PARAM_INT);
		$request->execute();
		return $request->fetch();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
}

/**
 * Retourne l'identifiant de l'utilisateur correpondant à l'email'
 * @param string $pseudo Pseudo de l'utilisateur
 * @return array|NULL 
 */
function getUserId($pseudo) {
    $db = connectDb();
    $sql = "SELECT idUtilisateur FROM utilisateurs WHERE Pseudo = :pseudo";
	$request = $db->prepare($sql);
	$request->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
	$request->execute();
    return $request->fetch()['idUtilisateur'];
}

/**
 * Retourne le statut de l'utilisateur correpondant à l'email'
 * @param string $pseudo Pseudo de l'utilisateur
 * @return array|NULL 
 */
function getUserStatut($pseudo) {
    $db = connectDb();
    $sql = "SELECT Statut FROM utilisateurs WHERE Pseudo = :pseudo";
	$request = $db->prepare($sql);
	$request->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
	$request->execute();
    return $request->fetch()['Statut'];
}

/**
 * ajoute un enregistrement à la table users
 * @param string $lastName nom de la personne
 * @param string $firstName prénom de la personne
 * @param string $pseudo pseudo de l'utilisateur
 * @param string $password Mot de passe en clair de l'utilisateur
 * @return int numéro de l'enregistrement créé
 */
function addUser($lastname, $firstname, $pseudo, $email, $birthday, $password)
{
	$db = connectDb();
	$sql = "INSERT INTO `Utilisateurs` (`Nom`, `Prenom`, `Pseudo`, `MotDePasse`, `Email`, `DateNaissance`)  VALUE (:lastname, :firstname, :pseudo, :password, :email, :birthday)";
	$request = $db->prepare($sql);
	try{
		$request->bindParam(":lastname", $lastname, PDO::PARAM_STR);
		$request->bindParam(":firstname", $firstname, PDO::PARAM_STR);
		$request->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
		$request->bindParam(":email", $email, PDO::PARAM_STR);
		$request->bindParam(":birthday", $birthday, PDO::PARAM_STR);
		$request->bindParam(":password", sha1($password), PDO::PARAM_STR);
		$request->execute();
		return $db->lastInsertId();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
}

/**
 * modifie l'enregistrement idUser de la table users
 * @param int $idUser
 * @param string $lastName nom de la personne
 * @param string $firstName prénom de la personne
 * @param string $pseudo pseudo de l'utilisateur
 * @param string $email email de l'utilisateur
 * @param string $birthday l'utilisateur
 * @param string $password Mot de passe en clair de l'utilisateur
 * @return int/NULL numéro de l'enregistrement modifié 
 */
function updateUser($idUser, $lastname, $firstname, $pseudo, $email, $birthday)
{
	$db = connectDb();
	$sql = "UPDATE Utilisateurs SET Nom=:lastname, Prenom=:firstname, Pseudo=:pseudo, Email=:email, DateNaissance=:birthday WHERE idUtilisateur=:idUser";
	$request = $db->prepare($sql);
	try{
		$request->bindParam(":idUser", $idUser, PDO::PARAM_STR);
		$request->bindParam(":lastname", $lastname, PDO::PARAM_STR);
		$request->bindParam(":firstname", $firstname, PDO::PARAM_STR);
		$request->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
		$request->bindParam(":email", $email, PDO::PARAM_STR);
		$request->bindParam(":birthday", $birthday, PDO::PARAM_STR);
		$request->execute();
	}
	catch (PDOException $e) {
        echo 'Problème d\'insertion à la base de données: '.$e->getMessage();
		return false;
	}
	return true;
}

/**
 * supprime l'enregistrement idUser
 * @param int $idUser ID de l'enregistrement à supprimer
 * @return int Nombre d'enregistrement supprimé (0 ou 1)
 */
function deleteUser($idUser)
{
	$db = connectDb();
	$sql = "DELETE FROM `Utilisateurs` WHERE `idUtilisateur`=:idUser";
	$request = $db->prepare($sql);
	try{
		$request->bindParam(":idUser", $idUser, PDO::PARAM_INT);
		$request->execute();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}

	return true;
}

/**
 * Vérifie dans la base de données si l'utilisateur existe
 * @param string $pseudo Pseudo de l'utilisateur
 * @param string $password Mot de passe encrypté de l'utilisateur
 * @return array
 */
function userExist($pseudo, $password) {
    try {
        $connexion = connectDb();
        $requete = $connexion->prepare("SELECT * FROM utilisateurs WHERE Pseudo= :pseudo AND MotDePasse = :password");
        $requete->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
        $requete->bindParam(":password", $password, PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
		return false;
    }
}