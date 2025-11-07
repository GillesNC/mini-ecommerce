<?php
    switch (true) {
        case (isset($_SESSION["user"])):
            $user = $_SESSION["user"];     
            break;

        default:
            echo "Vous n'êtes pas connecté !";
            header("Location: ?route=login");
            break;
    }
?>
<section class="profil">
    <div> 
        <h1>Gestion des produits</h1>
    </div>
    <div class="content_profil">
        <h2>Salut <?php echo $user['prenom']. ", voici votre espace de gestion des produits"; ?></h2>
    </div>
</section>

<section class="seller_products">
    <div class="seller_products_panel">
        <h3><i class="fa-solid fa-shop"></i> Gestion de mes produits</h3>
        <a href="?route=addProduct"><button class="btn1 btn_add">Ajouter un produit</button></a>
        <a href="?route=profil"><button class="btn_back btn3">Revenir à mon profil</button></a>
    </div>
    <section class="seller_product_card">
        <?php
        switch (true) {
            case (isset($myProducts)):
                foreach ($myProducts as $value) {
                ?>
                    <div class="cardProduct cardSeller">
                        <div class="cardProduct_Img">
                        <a href="?route=ficheProduct&id=<?php echo $value['id']; ?>&nomProduct=<?php echo $value['nomProduct']; ?>&description=<?php echo $value['description']; ?>&prix=<?php echo $value['prix']; ?>&image=<?php echo $value['image']; ?>">
                        <img src="<?php echo $value['image'];?>" alt="product image"></a>
                        </div>
                        <div class="cardSeller_Content">
                                <div class="cardSeller_text_content">
                                    <h3><?php echo $value['nomProduct'];?></h3>
                                    <div class="cardProduct_text"><p><?php echo $value['description'];?></p></div>
                                    <span class="price"><?php echo $value['prix'];?> € TTC</span>
                                </div>
                                <a href="?route=updateProduct&id=<?php echo $value['id'];?>&nomProduct=<?php echo $value['nomProduct'];?>&description=<?php echo $value['description'];?>&prix=<?php echo $value['prix'];?>&image=<?php echo $value['image'];?>">
                                    <button class="btn2 btn_update">Modifier</button>
                                </a>
                                <div class="btn_delete">
                                    <a href="#popup-<?php echo $value['id'];?>">
                                        <button class="btn3 btn_delete">Supprimer</button>
                                    </a>
                                </div>
                                <div class="popup" id="popup-<?php echo $value['id'];?>">
                                    <div class="popup_content">
                                        <div>
                                            <h2>Confirmer la suppression</h2>
                                            <p>Êtes-vous sûr de vouloir supprimer votre produit "<?php echo $value['nomProduct'];?>" ? Cette action est irréversible.</p>
                                        </div>
                                        <div class="buttons_popup ">
                                            <form method="POST" action="?route=deleteProduct">
                                                <input type="hidden" name="id" value="<?php echo $value['id'];?>">
                                                <button class="btn1" type="submit" name="deleteProduct">Oui, supprimer mon produit</button>
                                            </form>
                                            <a href="#"><button class="btn2">Annuler</button></a>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                    </div>
                <?php
            }
                break;

            default:
                echo "Vous n'avez pas de produit en vente pour le moment.";
                header("Location: ?route=addProduct");
                break;
        }
        ?>
    </section>
</section>