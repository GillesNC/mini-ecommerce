<?php
    switch (true) {
        case (isset($_SESSION["user"])):
            $user = $_SESSION["user"];
            // var_dump($_SESSION["user"]);
            // die("oK");
            break;

        default:
            echo "Vous n'êtes pas connecté !";
            header("Location: ?route=login");
            break;
    }
?>

<section class="profil">
    <div>
        <h1>Mon profil</h1>
    </div>
    <div class="content_profil">
        <h2>Salut <?php echo $user['prenom']. ","; ?></h2>
        <p>Auxerunt haec vulgi sordidioris audaciam, quod cum ingravesceret penuria commeatuum, famis et furoris inpulsu Eubuli cuiusdam inter suos clari domum ambitiosam ignibus subditis inflammavit.</p>
    </div>
    <div class="info_profil">
        <div class="details_profil">
            <h3>Mes informations</h3>
            <p><strong>Nom :</strong> <?php echo $user['nom']; ?></p>
            <p><strong>Prénom :</strong> <?php echo $user['prenom']; ?></p>
            <p><strong>Pseudo :</strong> <?php echo $user['pseudo']; ?></p>
            <p><strong>Email :</strong> <?php echo $user['email']; ?></p>
            <div class="buttons_profil">
                <a href="?route=updateUser"><button class="btn1">Modifier son profil</button></a>
                <a href="?route=seller"><button class="btn1">Gérer mes produits</button></a>
                <a href="#popup"><button class="btn3">Supprimer mon profil</button></a>
            </div>
        </div>
        <div class="img_profil">
            <img src="/mini-ecommerce/assets/profil.jpg" alt="Image profil utilisateur">
        </div>
    </div>
    <div class="popup" id="popup">
        <div class="popup_content">
            <div>
                <h2>Confirmer la suppression</h2>
                <p>Êtes-vous sûr de vouloir supprimer votre profil ? Cette action est irréversible.</p>
            </div>
            <div class="buttons_popup">
                <form method="POST" action="?route=deleteUser">
                    <button class="btn1" type="submit" name="delete">Oui, supprimer mon profil</button>
                </form>
                <a href="#"><button class="btn2">Annuler</button></a>
            </div>
        </div>
    </div>
</section>