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
        <h1>Modifier un produit</h1>
    </div>
    <div class="content_profil">
        <h2>Salut <?php echo $user['prenom']. ", souhaitez-vous modifier un produit"; ?></h2>
    </div>
</section>

<?php
switch (true) {
    case (isset($myProducts)):
           foreach ($myProducts as $value) {
        ?>
            <div class="cardProduct">
                <div class="cardProduct_Img">
                    <img src="<?php echo $value['image'];?>" alt="<?php echo $value['nomProduct'];?>">
                </div>
                <div class="cardProduct_Content">
                    <div class="cardProduct_Content_Title">
                        <h3><?php echo $value['nomProduct'];?></h3>
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