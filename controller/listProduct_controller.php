<?php
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/product_model.php';

    $products = displayAllProducts();
    // var_dump($products);
    // die("OK");
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/product/listProduct.php';
?>