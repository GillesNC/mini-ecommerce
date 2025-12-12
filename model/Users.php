<?php
class Users {
    // Propriété privée : identifiant unique de l'utilisateur (type entier)
    // Private empêche l'accès direct depuis l'extérieur de la classe
    private int $id; 

    // Propriété privée : nom de famille (type chaîne de caractères)
    private string $nom;

    // Propriété privée : prénom (type chaîne de caractères)
    private string $prenom;

    // Propriété privée : pseudonyme utilisé pour l'affichage public (type chaîne de caractères)
    private string $pseudo;

    // Propriété privée : adresse email unique dans le système (type chaîne de caractères)
    private string $email;

    private string $pwd;

    // Constructeur : méthode spéciale appelée lors de la création d'un nouvel objet Users
    // Elle initialise toutes les propriétés avec les valeurs passées en paramètres
    // Paramètres typés : int pour $id, string pour les autres
    public function __construct(int $id = 0, string $nom = "", string $prenom = "", string $pseudo = "", string $email = "", string $pwd = "")
    {
        // $this fait référence à l'objet en cours de création
        // On assigne la valeur du paramètre $id à la propriété $id de l'objet
        $this->id = $id;
        // On assigne la valeur du paramètre $nom à la propriété $nom de l'objet
        $this->nom = $nom;
        // On assigne la valeur du paramètre $prenom à la propriété $prenom de l'objet
        $this->prenom = $prenom;
        // On assigne la valeur du paramètre $pseudo à la propriété $pseudo de l'objet
        $this->pseudo = $pseudo;
        // On assigne la valeur du paramètre $email à la propriété $email de l'objet
        $this->email = $email;

        $this->pwd = $pwd;
    }

    // Getter : méthode publique pour récupérer l'identifiant
    // Retourne un entier (: int)
    public function getId(): int
    {
        // Retourne la valeur de la propriété privée $id
        return $this->id;
    }

    // Getter : méthode publique pour récupérer le nom de famille
    // Retourne une chaîne de caractères (: string)
    public function getNom(): string
    {
        // Retourne la valeur de la propriété privée $nom
        return $this->nom;
    }

    // Getter : méthode publique pour récupérer le prénom
    // Retourne une chaîne de caractères (: string)
    public function getPrenom(): string
    {
        // Retourne la valeur de la propriété privée $prenom
        return $this->prenom;
    }

    // Getter : méthode publique pour récupérer le pseudonyme
    // Retourne une chaîne de caractères (: string)
    public function getPseudo(): string
    {
        // Retourne la valeur de la propriété privée $pseudo
        return $this->pseudo;
    }

    // Getter : méthode publique pour récupérer l'adresse email
    // Retourne une chaîne de caractères (: string)
    public function getEmail(): string
    {
        // Retourne la valeur de la propriété privée $email
        return $this->email;
    }

    public function getPwd(): string
    {
        // Retourne la valeur de la propriété privée $email
        return $this->pwd;
    }

    // Setter : méthode publique pour modifier l'identifiant
    // Paramètre : $id de type entier
    // Ne retourne rien (: void)
    public function setId(int $id): void
    {
        // Modifie la propriété privée $id avec la nouvelle valeur passée en paramètre
        $this->id = $id;
    }

    // Setter : méthode publique pour modifier le nom de famille
    // Paramètre : $nom de type chaîne de caractères
    // Ne retourne rien (: void)
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    // Setter : méthode publique pour modifier le prénom
    // Paramètre : $prenom de type chaîne de caractères
    // Ne retourne rien (: void)
    public function setPrenom(string $prenom): void
    {
        // Modifie la propriété privée $prenom avec la nouvelle valeur passée en paramètre
        $this->prenom = $prenom;
    }

    // Setter : méthode publique pour modifier le pseudonyme
    // Paramètre : $pseudo de type chaîne de caractères
    // Ne retourne rien (: void)
    public function setPseudo(string $pseudo): void
    {
        // Modifie la propriété privée $pseudo avec la nouvelle valeur passée en paramètre
        $this->pseudo = $pseudo;
    }

    // Setter : méthode publique pour modifier l'adresse email
    // Paramètre : $email de type chaîne de caractères
    // Ne retourne rien (: void)
    public function setEmail(string $email): void
    {
        // Modifie la propriété privée $email avec la nouvelle valeur passée en paramètre
        $this->email = $email;
    }

    public function setPwd(string $pwd): void
    {
        // Modifie la propriété privée $email avec la nouvelle valeur passée en paramètre
        $this->pwd = $pwd;
    }
}
// Fin du fichier PHP
?>