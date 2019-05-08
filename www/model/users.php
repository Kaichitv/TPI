<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/TPI/www/db/database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/TPI/www/class/EUser.php';

/**
 * @brief Retourne le tableau des utilisateurs de type EUser
 * @return [array of EUser] Le tableau de EUser
 */
function GetAllUsers()
{
	// On crée un tableau qui va contenir les objets EUser
	$arr = array();

    $sql = "SELECT `EMAIL`, `NICKNAME`, `NAME` FROM `USERS`";
	$request = EDatabase::prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	try {
		$request->execute();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
	// On parcoure les enregistrements 
	while ($row=$request->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_NEXT)){
		// On crée l'objet EUser en l'initialisant avec les données provenant
		// de la base de données
		$u = new EUser($row['EMAIL'], $row['NICKNAME'], $row['NAME']);
		// On place l'objet EUser créé dans le tableau
		array_push($arr, $u);
	}        
	// On retourne le tableau contenant les utilisateurs sous forme EUser
	return $arr;
}

function GetUserByEmail($user)
{
	$arr = array();

	$sql = "SELECT `NICKNAME`, `NAME` FROM `USERS` WHERE `EMAIL`=:email";
	$request = EDatabase::prepare($sql);
	try{
    $request->bindParam(":email", $user->email, PDO::PARAM_STR);
    $request->execute();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}

	return $arr;
}

function addUser($user)
{
	$sql = "INSERT INTO `USERS` (`EMAIL`, `NICKNAME`, `NAME`)  VALUE (:email, :nickname, :name)";
	$request = EDatabase::prepare($sql);
	try{
		$request->bindParam(":email", $user->email, PDO::PARAM_STR);
		$request->bindParam(":nickname", $user->nickname, PDO::PARAM_STR);
		$request->bindParam(":name", $user->name, PDO::PARAM_STR);
		$request->execute();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}

	return true;
}

function updateUser($idUser, $lastname, $firstname, $pseudo, $email, $birthday, $password)
{
	$sql = "UPDATE `USERS` SET `Nom`=:lastname, `Prenom`=:prenom, `Pseudo`=:pseudo, `Email`=:email, `DateNaissance`=:birthday, `MotDePasse`=:password WHERE `idUtilisateur`=:idUser";
	$request = EDatabase::prepare($sql);
	try{
		$request->bindParam(":idUser", $idUser, PDO::PARAM_INT);
		$request->bindParam(":lastname", $lastname, PDO::PARAM_STR);
		$request->bindParam(":firstname", $firstname, PDO::PARAM_STR);
		$request->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
		$request->bindParam(":email", $email, PDO::PARAM_STR);
		$request->bindParam(":birthday", $birthday, PDO::PARAM_STR);
		$request->bindParam(":password", $password, PDO::PARAM_STR);
		$request->execute();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}
	return true;
}

function DeleteUser($idUser)
{
	$sql = "DELETE FROM `USERS` WHERE `idUser`=:idUser";
	$request = EDatabase::prepare($sql);
	try{
		$request->bindParam(":idUser", $idUser, PDO::PARAM_STR);
		$request->execute();
	}
	catch (PDOException $e) {
        echo 'Problème de lecture de la base de données: '.$e->getMessage();
		return false;
	}

	return true;
}


?>