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
        <h1>Ajouter un avis pour : <?php echo $_GET['nomProduct']; ?></h1>
    </div>
    <div class="content_profil">
        <h2>Salut <?php echo $user['prenom']. ", souhaitez-vous ajouter un avis pour ce produit"; ?></h2>
    </div>
</section>

<section class="add_product form_subscribe">
    <form class="container_form" method="POST">

        <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
        <div class="bloc_form nom">
            <label for="nom" class="form-label">Nom du produit</label>
            <input type="text" value="<?php echo $_GET['nomProduct']; ?>" readonly disabled class="form-control" id="nom">
        </div>

        <div class="bloc_form description">
            <label for="review" class="form-label">Votre avis*</label>
            <textarea name="review" class="form-control" id="review" placeholder="Donnez votre avis ici" rows="5" cols="33" required></textarea>
        </div>

        <div class="bloc_form rating">
            <label for="rating" class="form-label">Note*</label>
            <input type="number" name="rating" class="form-control" id="rating" min="1" max="5" placeholder="Veuillez saisir une note entre 1 et 5" required>
        </div>

            <button type="submit" class="btn1" name="addReview">Ajouter un avis</button>
    </form>
</section>