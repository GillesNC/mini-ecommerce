<?php
    function connexionToDB() {
        $username ="root";
        $pwd ="";

        try {
            return new PDO("mysql:host=localhost;dbname=mini_ecommerce", $username, $pwd);
        } catch (Exception $error) {
            die("Erreur: " .$error->getMessage());
        }
    }
?>