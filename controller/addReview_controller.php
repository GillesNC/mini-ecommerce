<?php
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/product_model.php';

    if (isset($_POST["addReview"])) {

        switch (true) {
            case addReview($_POST["rating"], $_POST["review"], $_POST["product_id"], $_SESSION["user"]["id"]):
                header("Location: ?route=product&id=".$_POST["product_id"]);
            break;
            
            default:
                header("Location: ?route=product&id=".$_POST["product_id"]);
                break;
        }
    }else {
       require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/product/review.php';
    }

?>