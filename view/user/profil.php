<?php
    switch (true) {
        case (isset($_SESSION["user"])):
            $user = $_SESSION["user"];
            var_dump($_SESSION["user"]);
            die("oK");
            break;

        default:
            echo "Vous n'êtes pas connecté !";
            break;
    }
?>

<!-- <div class="text-center">
  <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=200" class="rounded img-thumbnail" alt="profil">

    <div class="info">
        <p>
            <?php
            echo'Votre nom : '.$_SESSION['user']['nom'];
            ?>
        </p>

            <p>
            <?php
            echo'Votre prenom : '.$_SESSION['user']['prenom'];
            ?>
        </p>
        </p>

            <p>
            <?php
            echo'Votre email : '.$_SESSION['user']['email'];
            ?>
        </p><hr>
        <?php
            echo '<a href="?route=editUser" class="btn btn-warning"> Modifier mes infos</a></div>';
            echo '<a href="?route=deleteUser" class="btn btn-outline-warning"> Supprimer mon profil</a></div>';
        ?>
    </div>

</div> -->