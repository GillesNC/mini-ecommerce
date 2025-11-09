<?php
    if ($_GET["route"] === "clearCart") {
        // die("OK");
        
        $_SESSION['cart'] = []; 
        $_SESSION['msg'] = "Panier vidé avec succès";
        
        header("Location: ?route=cart");
        exit;
    }
?>
