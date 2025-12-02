<?php
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/product_model.php';
    if (isset($_POST["updateProduct"])) {
    // var_dump($_POST);
    // die("OK");
        switch (true) {
            case updateProductdb($_POST["id"], $_POST["nom"], $_POST["description"], $_POST["price"], $_POST["image"], $_SESSION["user"]["id"]):
                header("Location: ?route=seller");
            break;
            
            default:
                header("Location: ?route=seller");
                break;
        }
    }else {
       require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/product/updateProduct.php';
    }
?>