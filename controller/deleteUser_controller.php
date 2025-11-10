<?php
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/user.php';

    if (isset($_POST["delete"])) {
        switch (true) {
            case deleteUser($_SESSION["user"]["email"]):
                session_destroy();
                header("Location: ?route=register");
            break;
            
            default:
                header("Location: ?route=profil");
                break;
        }
    }
?>
