<?php
    if (isset($_GET["id"]) && $_GET["route"] === "decreaseQuantity") {
        $id = (INT) $_GET["id"];
        // die("Odqsdsqdsqd");

        if (isset($_SESSION['cart'][$id])) {
            if ($_SESSION['cart'][$id]['quantite'] > 1) {
                $_SESSION['cart'][$id]['quantite'] -= 1;
                $_SESSION['msg'] = "Quantité diminuée";
                // die("OK");
            } else {
                unset($_SESSION['cart'][$id]);
                $_SESSION['msg'] = "Produit retiré du panier";
            }
        } else {
            $_SESSION['msg'] = "Produit non trouvé dans le panier";
        }
        
        header("Location: ?route=cart");
        exit;
    }
?>
