<?php
    require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/user_model.php';

    if (isset($_POST["login"])) {
    // var_dump($_POST);
        switch (true) {
            case (!checkEmailExist($_POST["email"])):
                echo'<div class="alert alert-warning" role="alert">Email Inconnu</div>';
                break;

            case (loginDB($_POST['email'], $_POST['pwd'])):
                header("Location: ?route=profil");
                break;
            
            default:
            header("Location: ?route=register");
                break;
        }
    } else {
       require $_SERVER['DOCUMENT_ROOT']."/mini-ecommerce/view/user/login.php";
    }
?>