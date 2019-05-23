Projet : Locamoto
Auteur : Jacot-dit-Montandon Ludovic
Date : 23.05.2019

Pour utiliser le site LOCAMOTO veuillez suivre les instructions suivante:

1. Placez le dossier "www" à la racine de votre serveur apache.
2. Créez un compte pour la base de données avec les identifiants suivants:
	User: Admin
	Password: Super
   	Grant option
3. Importez la strucuture de la base de données que vous trouverez dans "TPI\docs\database\scripts"
   sous le nom de "db_locamoto_schema.sql".
4. Importez les données de tests dans la base de données créée à l'instant.
   Utilisez le script "db_locamoto_data.sql" dans "TPI\docs\database\scripts\".
5. Activez "openssl" dans le fichier "php.ini"
6. Lancer le site à partir du fichier "index.php" présent dans le dossier "TPI\www".


Accès GIT: https://github.com/Kaichitv/TPI 