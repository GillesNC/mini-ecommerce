<?php
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/user.php';

    if (isset($_POST["register"])) {
    // var_dump($_POST);
    //APPEL DE LA FONCTION CREATE DEPUIS LE FICHIER USER.PHP
        switch (true) {
            case (checkEmailExist($_POST["email"])):
                echo'<div>Attention, Email existant</div>';
                break;

            case createdb($_POST["nom"], $_POST["prenom"], $_POST["pseudo"], $_POST["email"], $_POST["pwd"]):
                header("Location: ?route=welcome");
                break;
            
            default:
                header("Location: ?route=register");
                break;
        }
    }else {
       require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/user/register.php';
    }
?>