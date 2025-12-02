<?php
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/user.php';
    if (isset($_POST{"update"})) {
    // var_dump($_POST);
        switch (true) {
            case updatedb($_POST["nom"], $_POST["prenom"], $_POST["pseudo"], $_SESSION["user"]["email"]):
                // die("ok");
                $_SESSION["user"]["nom"] = $_POST["nom"];
                $_SESSION["user"]["prenom"] = $_POST["prenom"];
                $_SESSION["user"]["pseudo"] = $_POST["pseudo"];
                header("Location: ?route=profil");
            break;
            
            default:
                header("Location: ?route=profil");
                break;
        }
    }else {
       require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/user/updateUser.php';
    }
?>