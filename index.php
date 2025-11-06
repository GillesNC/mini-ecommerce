<?php
//-- HEADER --//
require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/navbar/header.php';

//-- ROUTE --//
   if (isset($_GET{"route"})) {
        switch (true) {
            case $_GET["route"] === "register":
                require "./controller/register_controller.php";
                break;

            case $_GET["route"] === "welcome":
                require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/user/welcome.php';
                break;

            case $_GET["route"] === "login":
                require "./controller/login_controller.php";
                break;

            case $_GET["route"] === "profil":
                require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/user/profil.php';
                break;

            case $_GET["route"] === "logout":
                require "./controller/logout_controller.php";
                break;

            default:
                echo "Page 404";
                break;
        }
    } else{
        require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/homepage/hero.php';
        require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/homepage/main.php';
    }
    
//-- FOOTER --//
require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/navbar/footer.php';
?>