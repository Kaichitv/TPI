Projet : Locamoto
Auteur : Jacot-dit-Montandon Ludovic
Date : 23.05.2019

Pour utiliser le site LOCAMOTO veuillez suivre les instructions suivante:

1. Placez le dossier "www" � la racine de votre serveur apache.
2. Cr�ez un compte pour la base de donn�es avec les identifiants suivants:
	User: Admin
	Password: Super
   	Grant option
3. Importez la strucuture de la base de donn�es que vous trouverez dans "TPI\docs\database\scripts"
   sous le nom de "db_locamoto_schema.sql".
4. Importez les donn�es de tests dans la base de donn�es cr��e � l'instant.
   Utilisez le script "db_locamoto_data.sql" dans "TPI\docs\database\scripts\".
5. Activez "openssl" dans le fichier "php.ini"
6. Lancer le site � partir du fichier "index.php" pr�sent dans le dossier "TPI\www".


Acc�s GIT: https://github.com/Kaichitv/TPI 