<?php
class ModelOffer
{
    private $_bdd;

    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }

    // FONCTION QUI RÉCUPÈRE TOUS LES ARTICLES ET QUI CRÉE UN OBJET (Article) POUR CHAQUE ARTICLE
    public function getOffers()
    {
        $offres = [];
        //DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\')
        $req = $this->_bdd->query('SELECT id_offre, competences, localite, entreprise, type_promo_concerne, duree_stage, base_remuneration, duree_offre, nombre_place, date FROM offre ORDER BY id_offre DESC');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $offres[] = new Offer($data);
        }
        return $offres;
        $req->closeCursor();
    }

    // FONCTION QUI RÉCUPÈRE L'ARTICLE PAR RAPPORT À SON ID
    public function getOffer($id)
    {
        $req = $this->_bdd->prepare('SELECT id_offre, competences, localite, entreprise, type_promo_concerne, duree_stage, base_remuneration, duree_offre, nombre_place, date FROM offre WHERE id_offre = ?');
        $req->execute(array($id));

        if ($req->rowCount() == 1) {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Offer($data);
        } else
            throw new Exception("Aucune Offre ne correspond à l'identifiant '$id'");

        $req->closeCursor();
    }

    // FONCTION QUI AJOUTE UNE OFFRE EN BDD
    public function addArticle($off)
    {
        $req = $this->_bdd->prepare('INSERT INTO offre (competences, localite, entreprise, type_promo_concerne, duree_stage, base_remuneration, duree_offre, nombre_place, date) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?');
        $req->execute(array($off->competences(), $off->localite(), $off->entreprise(), $off->type_promo_concerne(), $off->duree_stage(), $off->base_renumeration(), $off->duree_offre(), $off->nombre_place(), $off->date()));
        $req->closeCursor();
    }

    // FONCTION QUI MET À JOUR L'OFFRE
    public function updateArticle(Offer $off)
    {
        $req = $this->_bdd->prepare('UPDATE offre SET competences = ?, localite = ?, entreprise= ?, type_promo_concerne = ?, duree_stage = ? , base_remuneration = ?, duree_offre = ?, nombre_place = ?, date = ? WHERE id_offre = ?');
        $req->execute(array($off->competences(), $off->localite(), $off->entreprise(), $off->type_promo_concerne(), $off->duree_stage(), $off->base_remuneration(), $off->duree_offre(), $off->nombre_place(), $off->date(), $off->id_offre()));
        $req->closeCursor();
    }

    // FONCTION QUI SUPPRIME UNE OFFRE
    public function deleteArticle($art)
    {
        $req = $this->_bdd->prepare('DELETE FROM offre WHERE id_offre = ?');
        $req->execute(array($art));
        $req->closeCursor();
    }

    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}
