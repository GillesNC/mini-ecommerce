<?php
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/product_model.php';

    if (isset($_POST{"addProduct"})) {
    // var_dump($_POST);
    // die ("dddd");
        switch (true) {
            case addProduct($_POST["nom"], $_POST["description"], $_POST["price"], $_POST["image"], $_SESSION["user"]["id"]):
                header("Location: ?route=profil");
            break;
            
            default:
                header("Location: ?route=profil");
                break;
        }
    }else {
       require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/product/addProduct.php';
    }
?>