<?php
    switch (true) {
        case (isset($_SESSION["user"])):
            $user = $_SESSION["user"];     
            break;

        default:
            echo "Vous devez être connecté pour voir votre panier !";
            header("Location: ?route=login");
            exit;
    }
?>

<section class="profil">
    <div>
        <h1>Mon Panier</h1>
    </div>
    <div class="content_profil">
        <h2>Bonjour <?php echo $user['prenom']; ?>, voici votre panier</h2>
        <?php if(isset($_SESSION['msg'])): ?>
            <p class="message"><?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?></p>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
            <a href="?route=clearCart">
                <button class="btn3">Vider le panier</button>
            </a>
        <?php endif; ?>
    </div>
</section>

<section class="cart_section">
    <?php
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "<div class='empty_cart'>";
        echo "<p>Votre panier est vide.</p>";
        echo "<a href='?route=homepage'><button class='btn1'>Retour à la boutique</button></a>";
        echo "</div>";
    } else {
        $total = 0;
        ?>
        <div class="cart_items">
            <?php foreach ($_SESSION['cart'] as $id => $product): 
                $quantite = isset($product['quantite']) ? $product['quantite'] : 1;
                $subtotal = $product['prix'] * $quantite;
                $total += $subtotal;
            ?>
                <div class="cart_item">
                    <div class="cart_item_image">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['nomProduct']; ?>">
                    </div>
                    <div class="cart_item_details">
                        <h3><?php echo $product['nomProduct']; ?></h3>
                        <p class="price"><?php echo $product['prix']; ?> € TTC</p>
                        
                        <div class="quantity_controls">
                            <a href="?route=decreaseQuantity&id=<?php echo $id; ?>">
                                <button class="btn_quantity">-</button>
                            </a>
                            <span>Quantité : <?php echo $quantite; ?></span>
                            <a href="?route=increaseQuantity&id=<?php echo $id; ?>">
                                <button class="btn_quantity">+</button>
                            </a>
                        </div>
                        
                        <p class="subtotal">Sous-total : <?php echo $subtotal; ?> €</p>
                    </div>
                    <div class="cart_item_actions">
                        <a href="?route=deleteCart&id=<?php echo $id; ?>">
                            <button class="btn3">Supprimer</button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="cart_summary">
            <h3>Récapitulatif</h3>
            <p class="total">Total : <strong><?php echo $total; ?> € TTC</strong></p>
            <a href="#"><button class="btn1">Passer la commande</button></a>
            <a href="?route=homepage"><button class="btn2">Continuer mes achats</button></a>
        </div>
    <?php } ?>
</section>