<?php
class ModelProfil
{
    private $_bdd;

    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }

    public function countOffers()
    {
        $req = $this->_bdd->prepare('SELECT * FROM offre ORDER BY id_offre DESC;');
        $req->execute();
        $result = $req->fetch();
        return (int)$result;
        $req->closeCursor();
    }

    // FONCTION QUI RÉCUPÈRE TOUS LES ARTICLES ET QUI CRÉE UN OBJET (Article) POUR CHAQUE ARTICLE
    public function getProfils()
    {
        $profils = [];

        $req = $this->_bdd->query('SELECT id_profil, libelle FROM profil ORDER BY id_profil DESC');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $profils[] = new profil($data);
        }
        return $profils;
        $req->closeCursor();
    }

    // FONCTION QUI RÉCUPÈRE L'ARTICLE PAR RAPPORT À SON ID
    public function getProfil($id)
    {
        $req = $this->_bdd->prepare('SELECT id_profil, libelle FROM profil  WHERE id_profil = ?');
        $req->execute(array($id));

        if ($req->rowCount() == 1) {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Profil($data);
        } else
            throw new Exception("Aucun Entreprise ne correspond à l'identifiant '$id'");
        $req->closeCursor();
    }

    // FONCTION QUI AJOUTE UN ARTICLE EN BDD
    public function addProfil($promo)
    {


        $req = $this->_bdd->prepare('INSERT INTO profil (libelle) VALUES(?) ');
        $req->execute(array($promo->libelle()));
        $req->closeCursor();
    }

    // FONCTION QUI MET À JOUR L'ARTICLE
    public function updateProfil(Profil $promo)
    {
        $req = $this->_bdd->prepare('UPDATE profil SET libelle = ?  WHERE id_profil = ?');
        $req->execute(array($promo->libelle(), $promo->id_profil()));
        $req->closeCursor();
    }

    // FONCTION QUI SUPPRIME UN ARTICLE
    public function deleteProfil($profil)
    {
        $req = $this->_bdd->prepare('DELETE FROM profil WHERE id_profil = ?');
        $req->execute(array($profil));
        $req->closeCursor();
    }

    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}
