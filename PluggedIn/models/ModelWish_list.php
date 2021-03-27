<?php
class ModelWish_list
{
    private $_bdd;

    // CONSTRUCTEUR
    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }

    public function countWish_list()
    {

        $req = $this->_bdd->prepare('SELECT COUNT(*) AS nb_articles FROM wish_list;');
        $req->execute();

        $result = $req->fetch();
        return (int) $result['nb_articles'];
        $req->closeCursor();
    }

    public function getWish_listPagination($premier, $parPage, $login)
    {
        $wish_list = [];

        $req = $this->_bdd->prepare('SELECT * FROM wish_list WHERE login = :login LIMIT :premier, :parpage;');


        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':premier', $premier, PDO::PARAM_INT);
        $req->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $wish_list[] = new Wish_list($data);
        }
        return $wish_list;
        $req->closeCursor();
    }

    /*
    public function updateLogin(Wish_list $wish_list, $id)
    {
        $req = $this->_bdd->prepare('UPDATE wish_list SET login = ?  WHERE login = ?');
        $req->execute(array( $wish_list->login(), $id ));
        $req->closeCursor();
    }
*/

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


    // SETTERS
    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }

    // FONCTION QUI AJOUTE UN UTILISATEUR EN BDD
    public function addUtilisateur($utilisateur)
    {
        $req = $this->_bdd->prepare('INSERT INTO utilisateur (login, mot_de_passe, nom, prenom, centre, id_promotion) VALUES(?, ?, ?, ?, ?, ?)');
        $req->execute(array(array($utilisateur->login(), $utilisateur->mot_de_passe(), $utilisateur->nom(), $utilisateur->prenom(), $utilisateur->centre(), $utilisateur->id_promotion())));
        $req->closeCursor();
    }

    // FONCTION QUI MET À JOUR L'UTILISATEUR
    public function updateUtilisateur(Utilisateur $utilisateur)
    {
        $req = $this->_bdd->prepare('UPDATE utilisateur SET login, mot_de_passe = ?, nom = ?, prenom= ?, centre = ?, id_promotion = ? WHERE id_users = ?');
        $req->execute(array($utilisateur->login(), $utilisateur->mot_de_passe(), $utilisateur->nom(), $utilisateur->prenom(), $utilisateur->centre(), $utilisateur->id_promotion(), $utilisateur->id_users()));
        $req->closeCursor();
    }

    // FONCTION QUI SUPPRIME UN UTILISATEUR
    public function deleteUtilisateur($id)
    {
        $req = $this->_bdd->prepare('DELETE FROM utilisateur WHERE id = ?');
        $req->execute(array($id));
        $req->closeCursor();
    }
}
