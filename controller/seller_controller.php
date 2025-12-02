<?php
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/product_model.php';

    $myProducts = sellerProduct($_SESSION["user"]["id"]);

    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/product/seller.php';
?>