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

    //-- AFFICHER UN PRODUIT DE TABLE PRODUCT SUR UNE FICHE PRODUIT --//
    // function displayProduct($id, $nomProduct, $description, $prix, $image, $nom) {
    //     $db = connexionToDB();

    //     $sql = $db->prepare("
    //         SELECT *, USER.nom as nomVendeur FROM PRODUCT JOIN USER ON PRODUCT.vendeur = USER.id AND PRODUCT.id = :id AND PRODUCT.nomProduct = :nomProduct AND PRODUCT.description = :description AND PRODUCT.prix = :prix AND PRODUCT.image = :image AND USER.nom = :nom
    //     ");

    //     $sql->bindValue(":id", $id);
    //     $sql->bindValue(":nomProduct", $nomProduct);
    //     $sql->bindValue(":description", $description);
    //     $sql->bindValue(":prix", $prix);
    //     $sql->bindValue(":image", $image);
    //     $sql->bindValue(":nom", $nom);
    //     $sql->execute();

    //     return $sql->fetchAll(PDO::FETCH_ASSOC);
    // }

    //-- AFFICHER LES PRODUCTS D'UN USER --//
    function sellerProduct($vendeur) {
        $db = connexionToDB();

        $sql = $db->prepare("
            SELECT PRODUCT.*, USER.nom as nomVendeur FROM PRODUCT INNER JOIN USER ON PRODUCT.vendeur = USER.id WHERE PRODUCT.vendeur = :vendeur
        ");
        $sql->bindValue(":vendeur", $vendeur);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>