<?php
class Products
{

    private int $id;
    private string $nomProduct;
    private string $description;
    private float $prix;
    private string $image;
    private int $vendeur;

    public function __construct(int $id = 0, string $nomProduct = "", string $description = "", float $prix = 0.0, string $image = "", int $vendeur = 0)
    {
        $this->id = $id;
        $this->nomProduct = $nomProduct;
        $this->description = $description;
        $this->prix = $prix;
        $this->image = $image;
        $this->vendeur = $vendeur;
    }

    //Méthode Getter
    public function getId(): int
    {
        return $this->id;
    }

    public function getNomProduct(): string
    {
        return $this->nomProduct;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getVendeur(): int
    {
        return $this->vendeur;
    }

    //Méthode SETTER
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setNomProduct(string $nomProduct): void
    {
        $this->nomProduct = $nomProduct;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function setVendeur(int $vendeur): void
    {
        $this->vendeur = $vendeur;
    }
}
?>