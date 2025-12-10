<?php
require_once "../model/Products.php";

$p = new Products(1, "Perrier");

echo "TEST PRODUCT <br/>";
echo $p->getId() . " " . $p->getNomProduct();
echo "<br/>";
$p->setNomProduct("PERRIER");
echo $p->getId() . " " . $p->getNomProduct();
?>