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
        $req = $this->_bdd->prepare('SELECT COUNT(*) AS nb_articles FROM entreprise;');
        $req->execute();

        $result = $req->fetch();
        return (int) $result['nb_articles'];
        $req->closeCursor();
    }

    public function getEntreprisesPagination($premier, $parPage)
    {
        $entreprises = [];

        $req = $this->_bdd->prepare('SELECT * FROM entreprise ORDER BY id_entreprise DESC LIMIT :premier, :parpage');
        $req->bindValue(':premier', $premier, PDO::PARAM_INT);
        $req->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $entreprises[] = new Entreprise($data);
        }
        return $entreprises;
        $req->closeCursor();
    }

    public function getEntreprisesPaginationOrderBy($order_tag, $premier, $parPage)
    {
        $entreprises = [];

        $req = $this->_bdd->prepare('SELECT * FROM entreprise ORDER BY :order_tag DESC LIMIT :premier, :parpage');
        $req->bindValue(':order_tag', $order_tag, PDO::PARAM_STR);
        $req->bindValue(':premier', $premier, PDO::PARAM_INT);
        $req->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $entreprises[] = new Entreprise($data);
        }
        return $entreprises;
        $req->closeCursor();
    }

    // FONCTION QUI RÉCUPÈRE TOUS LES ARTICLES ET QUI CRÉE UN OBJET (Article) POUR CHAQUE ARTICLE
    public function getEntreprises()
    {
        $entreprises = [];
        $req = $this->_bdd->query('SELECT *  FROM entreprise ORDER BY id_entreprise DESC');
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

        $req = $this->_bdd->prepare('SELECT * FROM entreprise  ORDER BY ? DESC');
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
        $req = $this->_bdd->prepare('SELECT * FROM entreprise  WHERE id_entreprise = ?');
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
        $req = $this->_bdd->prepare('SELECT * FROM entreprise  WHERE nom = ?');
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
        //$req = $this->_bdd->prepare('INSERT INTO entreprise (nom, localite, secteur_activite, nombre_stagiaire_cesi, confiance_pilote, evaluation_entreprise, image, localite, mail) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?');
        $req = $this->_bdd->prepare('INSERT INTO `entreprise`( `nom`, `secteur_activite`, `nombre_stagiaire_cesi`, `confiance_pilote`, `evaluation_entreprise`, `image`, `localite`, `mail`) VALUES (?,?,?,?,?,?,?,?)');
        $req->execute(array($ent->nom(), $ent->secteur_activite(),  $ent->nombre_stagiaire_cesi(), $ent->confiance_pilote(), $ent->evaluation_entreprise(), $ent->image(), $ent->localite(), $ent->mail()));
        $req->closeCursor();
    }

    // FONCTION QUI MET À JOUR L'ARTICLE
    public function updateEntreprise(Entreprise $entreprise)
    {
        $req = $this->_bdd->prepare('UPDATE entreprise SET nom = ?, localite = ?, secteur_activite = ?, nombre_stagiaire_cesi = ?, confiance_pilote = ?, evaluation_entreprise = ?, image = ?, localite = ?, mail = ? WHERE id_entreprise = ?');
        $req->execute(array($entreprise->nom(), $entreprise->localite(), $entreprise->secteur_activite(), $entreprise->nombre_stagiaire_cesi(), $entreprise->confiance_pilote(), $entreprise->evaluation_entreprise(), $entreprise->image(), $entreprise->localite(), $entreprise->mail(), $entreprise->id_entreprise()));
        $req->closeCursor();
    }

    // FONCTION QUI SUPPRIME UN ARTICLE
    public function deleteEntreprise($ent, $name)
    {
        $req = $this->_bdd->prepare('DELETE FROM entreprise WHERE id_entreprise = ?; DELETE FROM offre WHERE entreprise = ?');
        $req->execute(array($ent, $name));
        $req->closeCursor();
    }

    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}
