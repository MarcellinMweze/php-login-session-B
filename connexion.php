<?php
// connexion à la base de données

$dbhost = "localhost";
$dbuser = "id20676267_marcellinm";
$dbpassword = "@Mugoli2022";
$dbport = "3306";
$dbname = "id20676267_utilisateur";


$con = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpassword);

if ($con == null) {
    die("Erreur de connexion");
}
