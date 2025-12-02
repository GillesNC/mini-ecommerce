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
        <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
            <a href="?route=clearCart">
                <button class="btn3">Vider le panier</button>
            </a>
        <?php } ?>
    </div>
</section>

<section class="cart_section">
    <?php
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "<div class='empty_cart'>";
        echo "<p>Votre panier est vide.</p>";
        echo "<img src='https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExanV5OXR6dGlwMmlidWw5M3ozOWU3NGNzbWN2ZnMwem90MHhzOTNudiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/Phna8ImVFWEqxPUIfk/giphy.gif' alt='Panier vide'>";
        echo "<a href='index.php'><button class='btn1'>Retour à la boutique</button></a>";
        echo "</div>";
    } else {
        $total = 0;
        ?>
        <div class="cart_items">
            <?php foreach ($_SESSION['cart'] as $key => $value) {
                $quantite = isset($value['quantite']) ? $value['quantite'] : 1;
                $subtotal = $value['prix'] * $quantite;
                $total += $subtotal;
            ?>
                <div class="cart_card">
                    <div class="cart_card_image">
                        <img src="<?php echo $value['image']; ?>" alt="<?php echo $value['nomProduct']; ?>">
                    </div>
                    <div class="cart_card_details">
                        <h3><?php echo $value['nomProduct']; ?></h3>
                        <p class="price"><?php echo $value['prix']; ?> € TTC</p>
                        
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
                    <div class="cart_card_btn_delete">
                        <a href="?route=deleteCart&id=<?php echo $id; ?>">
                            <button class="btn3">Supprimer</button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
        
        <div class="cart_summary">
            <h3>Récapitulatif</h3>
            <p class="total">Total : <strong><?php echo $total; ?> € TTC</strong></p>
            <div class="cart_summary_btn">
                <a href="#"><button class="btn1">Passer la commande</button></a>
                <a href="index.php"><button class="btn2">Continuer mes achats</button></a>
            </div>
        </div>
    <?php } ?>
</section>