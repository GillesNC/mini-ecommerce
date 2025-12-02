<?php
    // Augmenter la quantité d'un produit dans le panier
    if (isset($_GET["id"]) && $_GET["route"] === "increaseQuantity") {
        $id = (INT) $_GET["id"];
        // die("HOURRRA OK");
        
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantite'] += 1;
            $_SESSION['msg'] = "Quantité augmentée";
            // var_dump($_SESSION['cart']);
            // die("dqdqs");
        } else {
            $_SESSION['msg'] = "Produit non trouvé dans le panier";
        }
        
        header("Location: ?route=cart");
        exit;
    }
?>
