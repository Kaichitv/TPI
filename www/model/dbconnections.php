<?php 
/*
  Projet: LOCAMOTO
  Description: Contient la fonctions de connexion à la base de données
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

//On utilise les constantes du fichier confparam.php
require_once './config/confparam.php';

function connectDb()
{
    static $db = null;

    if($db === null)
    {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $db = new PDO(DB_DBTYPE.":host=".DB_HOST.";dbname=".DB_DBNAME, DB_USER, DB_PASS, $pdo_options);
        $db->exec('SET CHARACTER SET utf8');
    }
    return $db;
}