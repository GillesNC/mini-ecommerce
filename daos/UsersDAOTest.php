<?php
require_once "./UsersDAO.php";
require_once "../model/connexiondb.php";
require_once "../model/Users.php";

$pdo = connexionToDB();
$dao = new UsersDAO($pdo); // Création de l'objet DAO avec la connexion PDO à la base de données

// Test de la méthode selectOneByEmail
echo "<hr>CONNEXION<hr>";
$u = new Users(); // Création d'un objet Users vide
$u->setEmail("lolo@gmail.com"); // On fournit l'email de l'utilisateur à rechercher
$User = $dao->selectOneByEmail($u); // Appel de la méthode pour récupérer l'utilisateur
var_dump($User);
die("OK");
echo "<pre>";
var_dump($User); // Affichage de l'objet utilisateur récupéré
echo "</pre>";

//Tesyt Insertion d'un nouvel utilisateur
?>
