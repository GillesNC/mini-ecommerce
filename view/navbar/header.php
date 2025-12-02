<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/favicon.png">
    
    <!-- LINK CSS STYLE -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="/mini-ecommerce/css/register.css">
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="/mini-ecommerce/css/hero.css">
    <link rel="stylesheet" href="/mini-ecommerce/css/main.css">
    <link rel="stylesheet" href="/mini-ecommerce/css/profil.css">
    <link rel="stylesheet" href="/mini-ecommerce/css/modal.css">
    <link rel="stylesheet" href="/mini-ecommerce/css/cardProduct.css">
    <link rel="stylesheet" href="/mini-ecommerce/css/ficheProduct.css">
    <link rel="stylesheet" href="/mini-ecommerce/css/seller.css">
    <link rel="stylesheet" href="/mini-ecommerce/css/cart.css">

    <!-- LINK JS -->
    <script defer src="./js/regex.js"></script>
    <script defer src="./js/formInscription.js"></script>

    <title>ECF - Mini Ecommerce</title>
</head>
<body>
    <header>
        <section class="top_header">
            <div class="logo">
                <a href="index.php"><img src="assets/logo.svg" alt="Logo Mini Ecommerce"></a>
            </div>
            <div class="search_bar">
                <input type="text" placeholder="Rechercher votre produit...">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="cart_account">
                <div class="cart">
                    <a href="?route=cart" class="cart">
                        <i class="fa-solid fa-basket-shopping"></i>
                        Mon panier 
                        <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                            <span class="cart-count">(<?php echo count($_SESSION['cart']); ?>)</span>
                        <?php } ?>
                    </a>
                </div>                
                <div class="account_dropdown">
                <!-- CONDITION CONNEXION OU NON -->

                <?php
                    if (!isset($_SESSION['user'])) {
                        session_start();
                    }

                    if (isset($_SESSION['user'])) {
                        echo '<a href="?route=profil"><i class="fa-regular fa-face-smile"></i></i>'."Bonjour ".$_SESSION['user']['prenom'].'</a>';
                        echo '<i class="fa-solid fa-chevron-down"></i>';
                        echo '<div class="dropdown_content">';
                        echo '<a href="?route=updateUser">Modifier mon profil</a>';
                        echo '<a href="?route=seller">Gérer mes produits</a>';
                        echo '<a href="?route=logout">Déconnexion</a>';
                    } else {
                        echo '<a href="?route=login"><i class="fa-regular fa-user"></i>Mon Compte</a>';
                        echo '<i class="fa-solid fa-chevron-down"></i>';
                        echo '<div class="dropdown_content">';
                        echo '<a href="?route=register">S\'inscrire</a>';
                    }
                ?>

                </div>
            </div>
        </section>
        <section class="main_navbar">
            <nav>
                <ul>
                    <li><a href="index.php#product">Tous nos produits</a></li>
                    <li><a href="#">Qui sommes nous ?</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </section>
    </header>