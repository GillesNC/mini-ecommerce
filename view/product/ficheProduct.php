<?php
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/cart_model.php';

    $quantity = isset($_GET['qty']) ? (int)$_GET['qty'] : 1;
    if ($quantity < 1) $quantity = 1;
    
    $productId = $_GET['id'];
    $productName = $_GET['nomProduct'];
    $productDesc = $_GET['description'];
    $productPrice = $_GET['prix'];
    $productImage = $_GET['image'];

    $productInfo = findById($productId);
    $isOwner = false;
    $nameVendeur = "";

    if ($productInfo) {
        $nameVendeur = $productInfo['nom'] . " " . $productInfo['prenom'];
        // var_dump($nameVendeur);
        // die("OK");
    }
    
    switch (true) {
        case (!isset($_SESSION["user"])):
            break;
            
        case ($productInfo && $_SESSION["user"]["id"] == $productInfo["vendeur"]):
            $isOwner = true;
            $user = $_SESSION["user"];
            break;
            
        default:
            $user = $_SESSION["user"];
            break;
    }    
?>

<section class="fiche">
    <section class="ficheProduit">
        <div class="ficheProduit_Img">
            <img src="<?php echo $productImage;?>" alt="product image">
        </div>
        <div class="ficheProduit_Content">
            <h2><?php echo $productName;?></h2>
            <span class="price"><?php echo $productPrice;?> € TTC</span>
            
            <!-- AFFICHE CTA UPDATE PRODUCT OU LE NOM DU VENDEUR -->
            <?php 
            switch (true) {
                case $isOwner:
                    ?>
                    <div class="owner_actions">
                        <p><strong>Vous êtes le vendeur de ce produit</strong></p>
                        <div class="owner_buttons">
                            <a href="?route=updateProduct&id=<?php echo $productId;?>&nomProduct=<?php echo $productName;?>&description=<?php echo $productDesc;?>&prix=<?php echo $productPrice;?>&image=<?php echo $productImage;?>">
                                <button class="btn3">Modifier le produit</button>
                            </a>
                        </div>
                    </div>
                    <?php
                    break;
                    // var_dump($isOwner);
                    // die("OK");
                default:
                    echo "Vendeur : ". $nameVendeur;
                    break;
            }
            ?>
            
            <div class="ficheProduit_Quantity">
                <label for="quantity">Quantité :</label>
                <div class="ficheProduit_Quantity_Button">
                    <a href="?route=ficheProduct&id=<?php echo $productId;?>&nomProduct=<?php echo $productName;?>&description=<?php echo $productDesc;?>&prix=<?php echo $productPrice;?>&image=<?php echo $productImage;?>&qty=<?php echo $quantity - 1;?>">
                        <button type="button" class="btn_quantity">-</button>
                    </a>
                    <input type="number" min="1" value="<?php echo $quantity;?>" id="quantity" readonly>
                    <a href="?route=ficheProduct&id=<?php echo $productId;?>&nomProduct=<?php echo $productName;?>&description=<?php echo $productDesc;?>&prix=<?php echo $productPrice;?>&image=<?php echo $productImage;?>&qty=<?php echo $quantity + 1;?>">
                        <button type="button" class="btn_quantity">+</button>
                    </a>
                </div>
            </div>
            
            <div class="ficheProduit_Button">
                <a href="?route=addCart&id=<?php echo $productId;?>&quantity=<?php echo $quantity;?>">
                    <button class="btn2">Ajouter au panier</button>
                </a>
            </div>
        </div>
    </section>
    <section class="description_product">
        <div class="description_title">
            <h3>Description</h3>
        </div>
        <div class="description_content">
            <p><?php echo $productDesc;?></p>
        </div>
    </section>
    <section class="description_product">
        <div class="description_title">
            <h3>Avis clients</h3>
        </div>
        <div class="description_content">
            <p></p>
        </div>
    </section>
    <section class="contact">
        <div class="contact_content">
            <h2>Comment contacter le site mini-ecommerce</h2>
            <p>Auxerunt haec vulgi sordidioris audaciam, quod cum ingravesceret penuria commeatuum, famis et furoris inpulsu Eubuli cuiusdam inter suos clari domum ambitiosam ignibus subditis inflammavit rectoremque ut sibi iudicio imperiali addictum calcibus incessens et pugnis conculcans seminecem laniatu miserando discerpsit. post cuius lacrimosum interitum in unius exitio quisque imaginem periculi sui considerans documento recenti similia formidabat.</p>
            <a href=""><button class="btn1">Nous contacter</button></a>
        </div>
        <div class="contact_img">
            <img src="/mini-ecommerce/assets/contact_site.webp" alt="contact">
        </div>
    </section>
</section>