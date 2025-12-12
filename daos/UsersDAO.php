<?php
require_once "../model/Users.php";

class UsersDAO {
    private PDO $pdo; //On déclare une propriété privée $pdo de type PDO pour gérer la connexion à la base de données

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo; //Le constructeur initialise la propriété $pdo avec l'objet PDO passé en paramètre
    }

    //Méthode pour sélectionner un utilisateur par son email & pwd
    public function selectOneByEmail(Users $user): ?Users { // Paramètre : un objet Users avec l'email à rechercher. On utilise le type nullable ?Users pour indiquer que la méthode peut retourner un objet Users ou null
        $sql = "SELECT * FROM user WHERE email = ?";
        $cursor = $this->pdo->prepare($sql);
        $cursor->bindValue(1, $user->getEmail(), PDO::PARAM_STR);
        $cursor->execute();
        $line = $cursor->fetch(PDO::FETCH_ASSOC);

        if ($line === false) {
            return null; // Aucun utilisateur ne correspond à l'email fourni
        }

        $u = new Users($line["id"], $line["nom"], $line["prenom"], $line["pseudo"], $line["email"], $line["pwd"]);
        return $u;
    }

    //Méthode pour inscrire un nouvel utilisateur
    public function insert(Users $user): bool {
        $sql = "INSERT INTO user (nom, prenom, pseudo, email, pwd) VALUES (?, ?, ?, ?, ?)";
        $cursor = $this->pdo->prepare($sql);
        $cursor->bindValue(1, $user->getNom(), PDO::PARAM_STR);
        $cursor->bindValue(2, $user->getPrenom(), PDO::PARAM_STR);
        $cursor->bindValue(3, $user->getPseudo(), PDO::PARAM_STR);
        $cursor->bindValue(4, $user->getEmail(), PDO::PARAM_STR);
        $cursor->bindValue(5, password_hash($user->getPwd(), PASSWORD_BCRYPT), PDO::PARAM_STR); // Hash du mot de passe avant insertion

        return $cursor->execute(); // Retourne true si l'insertion a réussi, false sinon
    }    
}
?>
