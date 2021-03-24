<?php
class ModelEntreprise
{
    private $_bdd;

    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }


    public function countEntreprises()
    {
        $req = $this->_bdd->prepare('SELECT * FROM entreprise ORDER BY id_entreprise DESC;');
        $req->execute();
        $result = $req->fetch();
        return (int)$result;
        $req->closeCursor();
    }


    // FONCTION QUI RÉCUPÈRE TOUS LES ARTICLES ET QUI CRÉE UN OBJET (Article) POUR CHAQUE ARTICLE
    public function getEntreprises()
    {
        $entreprises = [];

        $req = $this->_bdd->query('SELECT id_entreprise, nom, localite, secteur_activite, nombre_stagiaire_cesi, confiance_pilote, evaluation_entreprise, image FROM entreprise  ORDER BY id_entreprise DESC');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $entreprises[] = new Entreprise($data);
        }
        return $entreprises;
        $req->closeCursor();
    }

    public function getEntreprisesOrderBy($element)
    {
        $entreprises = [];

        $req = $this->_bdd->prepare('SELECT id_entreprise, nom, localite, secteur_activite, nombre_stagiaire_cesi, confiance_pilote, evaluation_entreprise, image FROM entreprise  ORDER BY ? DESC');
        $req->execute(array($element));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $entreprises[] = new Entreprise($data);
        }
        return $entreprises;
        $req->closeCursor();
    }

    // FONCTION QUI RÉCUPÈRE L'ARTICLE PAR RAPPORT À SON ID
    public function getEntreprise($id)
    {
        $req = $this->_bdd->prepare('SELECT id_entreprise, nom, localite,  secteur_activite, nombre_stagiaire_cesi, confiance_pilote, evaluation_entreprise, image FROM entreprise  WHERE id_entreprise = ?');
        $req->execute(array($id));

        if ($req->rowCount() == 1) {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Entreprise($data);
        } else
            throw new Exception("Aucun Entreprise ne correspond à l'identifiant '$id'");
        $req->closeCursor();
    }

    public function getEntrepriseByName($name)
    {
        $req = $this->_bdd->prepare('SELECT id_entreprise, nom, localite, secteur_activite, nombre_stagiaire_cesi, confiance_pilote, evaluation_entreprise, image FROM entreprise  WHERE nom = ?');
        $req->execute(array($name));

        if ($req->rowCount() == 1) {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Entreprise($data);
        } else
            throw new Exception("Aucun Entreprise ne correspond à l'identifiant '$name'");
        $req->closeCursor();
    }


    // FONCTION QUI AJOUTE UN ARTICLE EN BDD
    public function addEntreprise($ent)
    {


        $req = $this->_bdd->prepare('INSERT INTO entreprise (nom, localite, secteur_activite, nombre_stagiaire_cesi, confiance_pilote, evaluation_entreprise, image) VALUES(?, ?, ?, ?, ?');
        $req->execute(array($ent->nom(), $ent->localite(), $ent->secteur_activite(), $ent->nombre_stagiaire_cesi(), $ent->confiance_pilote(), $ent->evaluation_entreprise(), $ent->image()));
        $req->closeCursor();
    }

    // FONCTION QUI MET À JOUR L'ARTICLE
    public function updateEntreprise(Entreprise $entreprise)
    {
        $req = $this->_bdd->prepare('UPDATE entreprise SET nom = ?, localite = ?, secteur_activite = ?, nombre_stagiaire_cesi = ?, confiance_pilote = ?, evaluation_entreprise = ?, image = ? WHERE id_entreprise = ?');
        $req->execute(array($entreprise->nom(), $entreprise->localite(), $entreprise->secteur_activite(), $entreprise->nombre_stagiaire_cesi(), $entreprise->confiance_pilote(), $entreprise->evaluation_entreprise(), $entreprise->image(), $entreprise->id_entreprise()));
        $req->closeCursor();
    }

    // FONCTION QUI SUPPRIME UN ARTICLE
    public function deleteArticle($art)
    {
        $req = $this->_bdd->prepare('DELETE FROM entreprise WHERE id_entreprise = ?');
        $req->execute(array($art));
        $req->closeCursor();
    }

    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}
