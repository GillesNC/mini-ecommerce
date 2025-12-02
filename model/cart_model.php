<?php
    //-- APPEL A LA BDD --//
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/connexiondb.php';

    //-- CRUD CART --//
    //-- TROUVER UN PRODUIT DANS LE PANIER --//
    function findById($id)  {
        $db = connexionToDB();
        
        $sql =$db->prepare("
        SELECT PRODUCT.*, USER.nom, USER.prenom, USER.pseudo, USER.email FROM PRODUCT JOIN USER ON USER.id = PRODUCT.vendeur WHERE PRODUCT.id = :id
        ");

        $sql->bindValue(":id", $id);
        
        $sql->execute();
        
        return $sql->fetch(PDO::FETCH_ASSOC);
        
    }

    // -- AFFICHER AVIS PRODUIT - DSL MAIS EN LE METTANT DANS LE PRODUCT MODEL CA MARCHAIT PAS CAR JE DECLARAIS PLUSIEURS FOIS LA DB CONNEXION ET J'AI DU LE METTRE ICI --// 
    function getAllReviewsByProductId($productID) {
        $db = connexionToDB();

        $sql = $db->prepare("
            SELECT REVIEW.*, USER.pseudo FROM REVIEW JOIN USER ON REVIEW.userID = USER.id AND REVIEW.productID = :productID
        ");

        $sql->bindValue(":productID", $productID, PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

?>