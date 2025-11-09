<?php
        require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/cart_model.php';

        //SI PANIER N'EXISTE PAS, ON CREE UN TABLEAU 
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = []; 

        //VERIFIE PRODUIT EXISTE DANS LE PANIER 
        if ($_GET["route"] === "addCart" && isset($_GET["id"])){
            $id = (INT) $_GET["id"];
            $quantity = isset($_GET["quantity"]) ? (INT) $_GET["quantity"] : 1;

            //RECUPRE LES INFOS DU PRODUIT
            $productsCart = findById($id);

            //CHECK PRODUIT EXISTE DANS LE DB
            if ($productsCart) {
                //AJOUTE PRODUIT OU INCREMENTE QUANTITE
                if (isset($_SESSION['cart'][$id]) && isset($_SESSION['cart'][$id]['quantite'])) {
                    $_SESSION['cart'][$id]['quantite'] += $quantity;
                } else {
                    $productsCart['quantite'] = $quantity;
                    $_SESSION['cart'][$id] = $productsCart;
                }

                $_SESSION['msg'] = "Produit ajouté au panier";
            } else {
                $_SESSION['msg'] = "Erreur: produit introuvable";
            }
            
            header("Location: ?route=cart");
            exit;
        }
?>