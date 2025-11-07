<?php
    // var_dump("dhfhqfqjfs");
    // var_dump($products);
    // die("OK");
    foreach ($products as $value) {
        ?>
            <div class="cardProduct">
                <div class="cardProduct_Img">
                    <a href=""><img src="<?php echo $value['image'];?>" alt="product image"></a>
                </div>
                <div class="cardProduct_Content">
                    <h3><?php echo $value['nomProduct'];?></h3>
                    <div class="cardProduct_text"><p><?php echo $value['description'];?></p></div>
                    <span><?php echo $value['prix'];?> € TTC</span>
                    <div class="cardProduct_Button">
                        <a href=""><button class="btn2">Ajouter au panier</button></a> 
                        <a href=""><i class="fa-solid fa-circle-plus"></i></a>                     
                    </div>
                </div>
            </div>
        <?php
    }
?>