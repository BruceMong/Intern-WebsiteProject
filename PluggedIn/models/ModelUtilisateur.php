<?php
class ModelUtilisateur
{
    private $_bdd;

    // CONSTRUCTEUR
    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }


    // FONCTION QUI VÉRIFIE UNE CORRESPONDANCE AVEC SES PARAMÈTRES DANS LA BDD
    public function exists($login, $mot_de_passe)
    {
        $req = $this->_bdd->prepare('SELECT id_users FROM utilisateur WHERE login= ? AND mot_de_passe = ?');
        // $req->execute(array($login, sha1($mot_de_passe)));
        $req->execute(array($login, $mot_de_passe));
        if ($req->rowCount() == 1) {
            return true;
        }
        $req->closeCursor();
    }

    public function countUtilisateur()
    {

        $req = $this->_bdd->prepare('SELECT COUNT(*) AS nb_articles FROM utilisateur;');
        $req->execute();

        $result = $req->fetch();
        return (int) $result['nb_articles'];
        $req->closeCursor();
    }
    public function getUtilisateurPagination($premier, $parPage)
    {
        $utilisateurs = [];

        $req = $this->_bdd->prepare('SELECT * FROM utilisateur ORDER BY id_users DESC LIMIT :premier, :parpage;');

        $req->bindValue(':premier', $premier, PDO::PARAM_INT);
        $req->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $utilisateurs[] = new Utilisateur($data);
        }
        return $utilisateurs;
        $req->closeCursor();
    }

    public function getUtilisateurPaginationOrderBy($order_tag, $premier, $parPage)
    {
        $utilisateurs = [];

        $req = $this->_bdd->prepare('SELECT * FROM utilisateur LIMIT :premier, :parpage ORDER BY nom ;');

        $req->bindValue(':premier', $premier, PDO::PARAM_INT);
        $req->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $utilisateurs[] = new Utilisateur($data);
        }
        return $utilisateurs;
        $req->closeCursor();
    }

    // FONCTION QUI RÉCUPÈRE TOUS LES ARTICLES ET QUI CRÉE UN OBJET (Article) POUR CHAQUE ARTICLE
    public function getUtilisateurs()
    {
        $utilisateurs = [];
        $req = $this->_bdd->query('SELECT * FROM utilisateur ORDER BY id_users DESC');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $utilisateurs[] = new Utilisateur($data);
        }
        return $utilisateurs;
        $req->closeCursor();
    }
    // FONCTION QUI RÉCUPÈRE LES INFOS SUR L'UTILISATEUR
    public function getUtilisateur($login)
    {
        $req = $this->_bdd->prepare('SELECT * FROM utilisateur WHERE login= ?');
        $req->execute(array($login));
        if ($req->rowCount() == 1) {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Utilisateur($data);
        }
        $req->closeCursor();
    }

    // FONCTION QUI MET À JOUR LE MOT DE PASSE
    public function updateMot_de_passe(Utilisateur $utilisateur)
    {
        $req = $this->_bdd->prepare('UPDATE utilisateur SET mot_de_passe = ? WHERE id = 1');
        $req->execute(array($utilisateur->mot_de_passe()));
        $req->closeCursor();
    }

    // SETTERS
    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }

    // FONCTION QUI AJOUTE UN UTILISATEUR EN BDD
    public function addUtilisateur($utilisateur)
    {
        $req = $this->_bdd->prepare('INSERT INTO utilisateur (login, mot_de_passe, nom, prenom, centre, id_promotion, id_profil) VALUES(?, ?, ?, ?, ?, ?, ?)');
        $req->execute(array($utilisateur->login(), $utilisateur->mot_de_passe(), $utilisateur->nom(), $utilisateur->prenom(), $utilisateur->centre(), $utilisateur->id_promotion(), $utilisateur->id_profil()));
        $req->closeCursor();
    }

    // FONCTION QUI MET À JOUR L'UTILISATEUR
    public function updateUtilisateur(Utilisateur $utilisateur, $id)
    {
        $req = $this->_bdd->prepare('UPDATE utilisateur SET login = ?, nom = ?, prenom= ?, centre = ?, id_promotion = ?, id_profil = ? WHERE login = ?');
        $req->execute(array($utilisateur->login(), $utilisateur->nom(), $utilisateur->prenom(), $utilisateur->centre(), $utilisateur->id_promotion(), $utilisateur->id_profil(), $id));
        $req->closeCursor();
    }


    public function updateLogin($newId, $id)
    {
        $req = $this->_bdd->prepare('UPDATE droit SET login = ?  WHERE login = ?; UPDATE wish_list SET login = ?  WHERE login = ?');
        $req->execute(array($newId, $id, $newId, $id));
        $req->closeCursor();
    }

    // FONCTION QUI SUPPRIME UN UTILISATEUR
    public function deleteUtilisateur($id)
    {
        $req = $this->_bdd->prepare('DELETE FROM utilisateur WHERE login = ?; DELETE FROM droit WHERE login = ?;DELETE FROM wish_list WHERE login = ?');
        $req->execute(array($id, $id, $id));
        $req->closeCursor();
    }
}
