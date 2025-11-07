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
        <h1>Mon profil</h1>
    </div>
    <div class="content_profil">
        <h2>Modification du profil de <?php echo $user['prenom']. ","; ?></h2>
        <p>Auxerunt haec vulgi sordidioris audaciam, quod cum ingravesceret penuria commeatuum, famis et furoris inpulsu Eubuli cuiusdam inter suos clari domum ambitiosam ignibus subditis inflammavit.</p>
    </div>
</section>

<section class="update_user form_subscribe">
    <form class="container_form" method="POST">
        <div class="bloc_form nom">
            <label for="nom" class="form-label">Nom*</label>
            <input type="text" name="nom" class="form-control" id="nom" required value="<?php echo $user['nom']; ?>">
        </div>

        <div class="bloc_form prenom">
            <label for="prenom" class="form-label">Prénom*</label>
            <input type="text" name="prenom" class="form-control" id="prenom" required value="<?php echo $user['prenom']; ?>">
        </div>

        <div class="bloc_form pseudo">
            <label for="pseudo" class="form-label">Pseudo*</label>
            <input type="text" name="pseudo" class="form-control" id="pseudo" required value="<?php echo $user['pseudo']; ?>">
        </div>

        <div class="bloc_form email">
            <label for="email" class="form-label">Email*</label>
            <input type="email" class="form-control" id="email" value="<?php echo $user['email']; ?>" disabled>
        </div>

        <div class="bloc_form pwd">
            <label for="pwd" class="form-label">Mot de passe*</label>
            <input type="password" name="pwd" class="form-control" id="pwd" required value="<?php echo $user['pwd']; ?>" disabled>
        </div>
            <button type="submit" class="btn1" name="update">Je modifie mes information</button>
    </form>
</section>