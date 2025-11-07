<?php
//-- HEADER --//
require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/view/navbar/header.php';

//-- ROUTE --//
   if (isset($_GET{"route"})) {
        switch (true) {
            //-- USER ROUTE --//
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

            case $_GET["route"] === "updateUser":
                require "./controller/updateUser_controller.php";
                break;

            case $_GET["route"] === "deleteUser":
                require "./controller/deleteUser_controller.php";
                break;

            //-- PRODUCT ROUTE --//
            case $_GET["route"] === "addProduct":
                require "./controller/addProduct_controller.php";
                break;

            case $_GET["route"] === "listProduct":
                require "./controller/listProduct_controller.php";
                break;

            case $_GET["route"] === "ficheProduct":
                require "./controller/ficheProduct_controller.php";
                break;

            case $_GET["route"] === "seller":
                require "./controller/seller_controller.php";
                break;

            case $_GET["route"] === "updateProduct":
                require "./controller/updateProduct_controller.php";
                break;

            case $_GET["route"] === "deleteProduct":
                require "./controller/deleteProduct_controller.php";
                break;

            //-- 404 ROUTE --//                
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