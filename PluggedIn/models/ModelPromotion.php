<?php
class ModelPromotion
{
    private $_bdd;

    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }

    // FONCTION QUI RÉCUPÈRE TOUS LES ARTICLES ET QUI CRÉE UN OBJET (Article) POUR CHAQUE ARTICLE
    public function getPromotions()
    {
        $promotions = [];

        $req = $this->_bdd->query('SELECT id_promotion, libelle FROM promotion ORDER BY id_promotion DESC');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $promotions[] = new Promotion($data);
        }
        return $promotions;
        $req->closeCursor();
    }

    // FONCTION QUI RÉCUPÈRE L'ARTICLE PAR RAPPORT À SON ID
    public function getPromotion($id)
    {
        $req = $this->_bdd->prepare('SELECT id_promotion, libelle FROM promotion  WHERE id_promotion = ?');
        $req->execute(array($id));

        if ($req->rowCount() == 1) {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Promotion($data);
        } else
            throw new Exception("Aucun Promotion ne correspond à l'identifiant '$id'");
        $req->closeCursor();
    }

    // FONCTION QUI AJOUTE UN ARTICLE EN BDD
    public function addPromotion($promo)
    {


        $req = $this->_bdd->prepare('INSERT INTO promotion (libelle) VALUES(?) ');
        $req->execute(array($promo->libelle()));
        $req->closeCursor();
    }

    // FONCTION QUI MET À JOUR L'ARTICLE
    public function updatePromotion(Promotion $promo)
    {
        $req = $this->_bdd->prepare('UPDATE promotion SET libelle = ?  WHERE id_promotion = ?');
        $req->execute(array($promo->libelle(), $promo->id_promotion()));
        $req->closeCursor();
    }

    // FONCTION QUI SUPPRIME UN ARTICLE
    public function deletePromotion($promo)
    {
        $req = $this->_bdd->prepare('DELETE FROM profil WHERE id_promotion = ?');
        $req->execute(array($promo));
        $req->closeCursor();
    }

    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}
