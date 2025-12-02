<?php
    // var_dump("dhfhqfqjfs");
    // var_dump($products);
    // die("OK");
    foreach ($products as $value) {
        ?>
            <div class="cardProduct">
                <div class="cardProduct_Img">
                    <a href="?route=ficheProduct&id=<?php echo $value['id']; ?>&nomProduct=<?php echo $value['nomProduct']; ?>&description=<?php echo $value['description']; ?>&prix=<?php echo $value['prix']; ?>&image=<?php echo $value['image']; ?>">
                    <img src="<?php echo $value['image'];?>" alt="product image"></a>
                </div>
                <div class="cardProduct_Content">
                    <h3><?php echo $value['nomProduct'];?></h3>
                    <span class="price"><?php echo $value['prix'];?> € TTC</span>
                    <div class="cardProduct_Button">
                        <a href="?route=addCart&id=<?php echo $value['id']; ?>"><button class="btn2">Ajouter au panier</button></a>
                        <a href="?route=ficheProduct&id=<?php echo $value['id']; ?>&nomProduct=<?php echo $value['nomProduct']; ?>&description=<?php echo $value['description']; ?>&prix=<?php echo $value['prix']; ?>&image=<?php echo $value['image']; ?>"><i class="fa-solid fa-circle-plus"></i></a>
                    </div>
                </div>
            </div>
        <?php
    }
?>