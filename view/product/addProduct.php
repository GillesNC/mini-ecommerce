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
        <h1>Nouveau produit</h1>
    </div>
    <div class="content_profil">
        <h2>Salut <?php echo $user['prenom']. ", souhaitez-vous ajouter un nouveau produit"; ?></h2>
    </div>
</section>

<section class="add_product form_subscribe">
    <form class="container_form" method="POST">
        <div class="bloc_form nom">
            <label for="nom" class="form-label">Nom du produit*</label>
            <input type="text" name="nom" class="form-control" id="nom" required placeholder="Veuillez saisir le nom du produit">
        </div>

        <div class="bloc_form description">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="description" placeholder="Veuillez saisir une description pour le produit">
        </div>

        <div class="bloc_form price">
            <label for="price" class="form-label">Prix du produit*</label>
            <input type="number" name="price" class="form-control" id="price" required placeholder="Veuillez saisir le prix du produit">
        </div>

        <div class="bloc_form image">
            <label for="image" class="form-label">Image du produit (URL)</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="Veuillez saisir l'URL de l'image du produit">
        </div>

            <button type="submit" class="btn1" name="addProduct">Ajouter un nouveau produit</button>
    </form>
</section>