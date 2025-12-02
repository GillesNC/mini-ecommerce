<?php
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/product_model.php';

    if (isset($_POST["deleteProduct"])) {
        switch (true) {
            case deleteProductdb($_POST["id"], $_SESSION["user"]["id"]):
                header("Location: ?route=seller");
            break;

            default:
                header("Location: ?route=seller");
                break;
        }
    } else {
       require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/product/seller.php';
    }
?>