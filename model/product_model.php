<?php
//-- APPEL A LA BDD --//
require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/connexiondb.php';

//-- CRUD PRODUCT --//
//-- INSERTION DES PRODUCTS PAR LES USER AU NIVEAU DE LA BDD --//
function addProduct($nom, $description, $price, $image, $vendeur): bool {
    $db = connexionToDB();

    $sql = $db->prepare("
        INSERT INTO PRODUCT (nomProduct, description, prix, image, vendeur) VALUES (:nom, :description, :price, :image, :vendeur)
    ");

    $sql->bindValue(":nom", $nom);
    $sql->bindValue(":description", $description);
    $sql->bindValue(":price", $price);
    $sql->bindValue(":image", $image);
    $sql->bindValue(":vendeur", $vendeur);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        return true;
    } else {
        return false;
    }   
}

//-- AFFICHER TOUS LES PRODUITS TABLE PRODUCT --//
    function displayAllProducts() {
        $db = connexionToDB();

        $sql = $db->prepare("
            SELECT * FROM PRODUCT
        ");

        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>