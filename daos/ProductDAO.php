<?php
require_once "./model/Products.php";

class ProductDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    //Méthode d'affichage de tous les produits
    public function selectAll(): array
    {
        $array = array();

        $sql = "SELECT * FROM product ORDER BY nomProduct";
        try {
            $cursor = $this->pdo->query($sql);
            $t = $cursor->fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0; $i < count($t); $i++) {
                $line = $t[$i];
                $p = new Products($line["id"], $line["nomProduct"], $line["description"], $line["prix"], $line["image"], $line["vendeur"]);
                $array[] = $p;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $array;
    }

    //Méthode d'insertion d'un produit
    public function Insert(Products $product): int
    {
        $sql = "INSERT INTO product (nomProduct, description, prix, image, vendeur) VALUES (?, ?, ?, ?, ?)";
        $nbLignesAffectees = 0;
        try {
            $cursor = $this->pdo->prepare($sql);
            $cursor->bindValue(1, $product->getNomProduct(), PDO::PARAM_STR);
            $cursor->bindValue(2, $product->getDescription(), PDO::PARAM_STR);
            $cursor->bindValue(3, $product->getPrix(), PDO::PARAM_STR);
            $cursor->bindValue(4, $product->getImage(), PDO::PARAM_STR);
            $cursor->bindValue(5, $product->getVendeur(), PDO::PARAM_INT);
            $cursor->execute();
            $nbLignesAffectees = $cursor->rowCount();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $nbLignesAffectees;
    }

    //Méthode de MAJ d'un produit via ID
    public function update(Products $product):int {
        $affected = 0;
        $sql = "UPDATE product SET nomProduct = ?, description = ?, prix = ?, image = ? WHERE id = ? AND vendeur = ?";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $product->getNomProduct());
            $stmt->bindValue(2, $product->getDescription());
            $stmt->bindValue(3, $product->getPrix());
            $stmt->bindValue(4, $product->getImage());
            $stmt->bindValue(5, $product->getId());
            $stmt->bindValue(6, $product->getVendeur());

            $stmt->execute();

            $affected = $stmt->rowCount();
        } catch (Exception $e) {
            echo $e->getMessage();
            $affected = -1;
        }
        return $affected;
    }

    //Méthode de DELETE d'un produit via ID
    public function deletebyID(Products $product): int {
        $affected = 0;
        $sql = "DELETE FROM product WHERE id = ?";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $product->getId());
            $stmt->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
            $affected = -1;            
        }
        return $affected;
    }

    //Méthode de SELECTONE d'un produit via ID
    public function selectOnebyID(Products $product): Products {

        $p = new Products();
        $sql = "SELECT * FROM product WHERE id = ?";

        try {
            $cursor = $this->pdo->prepare($sql);
            $cursor->bindValue(1, $product->getId());
            $cursor->execute();
            $line = $cursor->fetch(PDO::FETCH_ASSOC);
            if ($line === FALSE) {
                $p->setId(0);
                $p->setId("Produit Introuvable");
            }else {
                $p->setID($line["id"]);
                $p->setNomProduct($line["nomProduct"]);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
                $p->setId(-1);
                $p->setNomProduct($e->getMessage());
        }
        return $p;
    }
}
