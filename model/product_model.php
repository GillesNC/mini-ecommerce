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

    //-- METTRE A JOUR UN PRODUIT --//
    function updateProductdb($id, $nom, $description, $price, $image, $vendeur) : bool {
        $db = connexionToDB();

        $sql = $db->prepare("
            UPDATE PRODUCT SET nomProduct = :nom, description = :description, prix = :price, image = :image WHERE id = :id AND vendeur = :vendeur
        ");

        $sql->bindValue(":id", $id);
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

    //-- SUPPRIMER UN PRODUIT --//
    function deleteProductdb($id, $vendeur) : bool {
        $db = connexionToDB();

        $sql = $db->prepare("
            DELETE FROM PRODUCT WHERE id = :id AND vendeur = :vendeur
        ");

        $sql->bindValue(":id", $id);
        $sql->bindValue(":vendeur", $vendeur);
        $sql->execute();    
        return $sql->rowCount() > 0;
    }

    //-- ADD AVIS PRODUIT --//
    function addReview($productID, $userID, $rating, $review) : bool {
        $db = connexionToDB();

        $sql = $db->prepare("
            INSERT INTO REVIEW (productID, userID, rating, review) VALUES (:productID, :userID, :rating, :review)
        ");

        $sql->bindValue(":productID", $productID, PDO::PARAM_INT);
        $sql->bindValue(":userID", $userID, PDO::PARAM_INT);
        $sql->bindValue(":rating", $rating, PDO::PARAM_INT);
        $sql->bindValue(":review", $review);
        $sql->execute();

        return $sql->rowCount() > 0;
    }
?>