<?php
require_once "./ProductDAO.php";
require_once "../model/connexiondb.php";
require_once "../model/Products.php";

$pdo = connexionToDB();
$dao = new ProductDAO($pdo);
// Affichage du contenu sur le SELECT ALL
// $tab = $dao->selectAll();
// echo "<pre>";
// var_dump($tab);
// echo "</pre>";

// Test Insertion d'un nouveau produit
// $p = new Products(0, "Produit5", "Acie adpetitus iamque serpens saxo colligi dentium serpens cognitis colligi serpens colligi opperiens extremas cognitis telo adpetitus suae et armatos iussit opperiens ratione iamque ut omnes adpetitus omnes adeste adeste.", "15.30", "assets/gant-boxe-2.png", 5);
// $nb = $dao->Insert($p);
// echo "<br>Nombre de lignes insérées : " . $nb . "<br>";

//Test MAJ Produit
echo "<hr>UPDATE<hr>";
$u = new Products(3, "Gant de Boxe", "Acie adpetitus iamque serpens saxo colligi dentium serpens cognitis colligi serpens colligi opperiens extremas cognitis telo adpetitus suae et armatos iussit opperiens ratione iamque ut omnes adpetitus omnes adeste adeste.", "30.00", "assets/gant-boxe-2.png", 5);
$affected = $dao->update($u);
echo "<br/>";
var_dump($affected);
echo "<br/>";
echo "<pre>";
var_dump($u);
echo "</pre>";
echo "<br/>";
die("OK");
echo "<br>$affected Produit modifié";

//Test DELETE Produit par ID
// echo "<hr>DELETEBYID<hr>";
// $h = new Products(6);
// $affected = $dao->deletebyID($h);
// echo "<br>$affected Produit supprimé";

//Affiche un seul produit
echo "<hr>SELECTBYID<hr>";
$h = new Products(2, "");
$Product = $dao->selectOneById($h);
echo "<pre>";
var_dump($Product);
echo "</pre>";
?>