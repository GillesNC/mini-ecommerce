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
        <h2><?php echo $user['prenom']. ", vous allez modifier un produit"; ?></h2>
    </div>
</section>

<section class="update_user form_subscribe">
    <form class="container_form" method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        
        <div class="bloc_form nom">
            <label for="nom" class="form-label">Nom du produit</label>
            <input type="text" name="nom" class="form-control" id="nom" placeholder="Veuillez saisir le nom du produit" value="<?php echo $_GET['nomProduct']; ?>">
        </div>

        <div class="bloc_form description">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="description" placeholder="Veuillez saisir une description pour le produit" value="<?php echo $_GET['description']; ?>">
        </div>

        <div class="bloc_form price">
            <label for="price" class="form-label">Prix du produit</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="Veuillez saisir le prix du produit" value="<?php echo $_GET['prix']; ?>">
        </div>

        <div class="bloc_form image">
            <label for="image" class="form-label">Image du produit (URL)</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="Veuillez saisir l'URL de l'image du produit" value="<?php echo $_GET['image']; ?>">
        </div>
            <button type="submit" class="btn1" name="updateProduct">Je modifie mon produit</button>
    </form>
</section>