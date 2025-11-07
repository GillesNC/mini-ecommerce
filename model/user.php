<?php
//-- APPEL A LA BDD --//
require $_SERVER["DOCUMENT_ROOT"].'/mini-ecommerce/model/connexiondb.php';

//-- CRUD USER --//
    function createdb($nom, $prenom, $pseudo, $email, $pwd): bool {
        $db = connexionToDB();

        $sql = $db->prepare("
            INSERT INTO USER (nom, prenom, pseudo, email, pwd) VALUES (:nom, :prenom, :pseudo, :email, :pwd)
        ");

        $sql->bindValue(":nom", $nom);
        $sql->bindValue(":prenom", $prenom);
        $sql->bindValue(":pseudo", $pseudo);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":pwd", password_hash($pwd, PASSWORD_DEFAULT));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }   
    }

//-- VERIF EMAIL --//
    function checkEmailExist($email_verif) :bool {
        $db = connexionToDB();

        $sql = $db->prepare("
            SELECT email FROM user WHERE email = :email
        ");

        $sql->bindValue(":email", $email_verif);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }        
    }

//-- FONCTION LOGIN USER --//
    function loginDB($email, $pwd) : bool {
        $db = connexionToDB();

        $sql = $db->prepare("
            SELECT * FROM user WHERE email = :email
        ");

        $sql->bindValue(":email", $email); 
        $sql->execute();

        $req = $sql->fetch();
        
        if (password_verify($pwd, $req["pwd"])) {
            $_SESSION['user']= $req;               
            return true;
        } else {
            return false;
        }
    }

//-- FONCTION UPDATE USER --//
    function updatedb($nom, $prenom, $pseudo, $email) : bool {
        $db = connexionToDB();

        $sql = $db->prepare("
            UPDATE user SET prenom = :prenom, nom = :nom, pseudo = :pseudo, email = :email WHERE email = :email
        ");

        $sql->bindValue(":nom", $nom);
        $sql->bindValue(":prenom", $prenom);
        $sql->bindValue(":pseudo", $pseudo);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }   
    }
    
//-- FONCTION DELETE USER --//
    function deleteUser($email) : bool {
        $db = connexionToDB();

        $sql = $db->prepare("
            DELETE FROM user WHERE email = :email
        ");

        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
?>