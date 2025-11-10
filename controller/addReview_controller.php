<?php
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/product_model.php';

    if (isset($_POST["addReview"])) {
        switch (true) {
            case addReview($_POST["product_id"], $_SESSION["user"]["id"], $_POST["rating"], $_POST["review"]):
                header("Location: index.php");
                exit;
            break;
            
            default:
                header("Location: index.php");
                exit;
                break;
        }
    }else {
       require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/product/review.php';
    }

?>