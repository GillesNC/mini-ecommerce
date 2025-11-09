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
?>