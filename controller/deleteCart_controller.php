<?php
    if (isset($_GET["id"]) && $_GET["route"] === "deleteCart") {
        $id = (INT) $_GET["id"];
        // die("ddddd");
        
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
            $_SESSION['msg'] = "Produit retiré du panier";
        } else {
            $_SESSION['msg'] = "Produit non trouvé dans le panier";
        }
        
        header("Location: ?route=cart");
        exit;
    }
?>
