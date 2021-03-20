<?php
class ModelOffer
{
    private $_bdd;
    
    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }
    
    // FONCTION QUI RÉCUPÈRE TOUS LES ARTICLES ET QUI CRÉE UN OBJET (Article) POUR CHAQUE ARTICLE
    public function getOffer()
    {  
        $offres = [];
        
        $req = $this->_bdd->query('SELECT id_offre, competences, localite, entreprise, type_promo_concerne, duree_stage, base_remuneration, duree_offre, nombre_place FROM offre ORDER BY id_offre DESC');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $offres[] = new Offer($data);
        }
        return $offres;
        $req->closeCursor();
    }
    
    // FONCTION QUI RÉCUPÈRE L'ARTICLE PAR RAPPORT À SON ID
    public function getArticle($id)
    {
        $req = $this->_bdd->prepare('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS articleDate FROM articles WHERE id = ?');
        $req->execute(array($id));
        
        if($req->rowCount() == 1)
        {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Article($data);   
        }
        else
            throw new Exception("Aucun épisode ne correspond à l'identifiant '$id'");

        $req->closeCursor();
    }
    
    // FONCTION QUI RÉCUPÈRE L'ARTICLE D'APRÈS
    public function getNextArticle($id)
    {
        $req = $this->_bdd->prepare('SELECT id, title FROM articles WHERE id > ? LIMIT 1');
        $req->execute(array($id));
        
        if($req->rowCount() == 1)
        {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Article($data);   
        }
        $req->closeCursor();
    }
    
    // FONCTION QUI RÉCUPÈRE L'ARTICLE D'AVANT
    public function getPreviousArticle($id)
    {
        $req = $this->_bdd->prepare('SELECT id, title FROM articles WHERE id < ? ORDER BY id DESC LIMIT 1');
        $req->execute(array($id));
        
        if($req->rowCount() == 1)
        {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Article($data);   
        }
        $req->closeCursor();
    }
    
    // FONCTION QUI AJOUTE UN ARTICLE EN BDD
    public function addArticle($art)
    {
        $req = $this->_bdd->prepare('INSERT INTO articles (title, content, date) VALUES(?, ?, NOW())');
        $req->execute(array($art->title(), $art->content()));
        $req->closeCursor();    
    }
    
    // FONCTION QUI MET À JOUR L'ARTICLE
    public function updateArticle(Article $article)
    {
        $req = $this->_bdd->prepare('UPDATE articles SET title = ?, content = ? WHERE id = ?');
        $req->execute(array($article->title(), $article->content(), $article->id()));
        $req->closeCursor();   
    }
    
    // FONCTION QUI SUPPRIME UN ARTICLE
    public function deleteArticle($art)
    {
        $req = $this->_bdd->prepare('DELETE FROM articles WHERE id = ?');
        $req->execute(array($art));
        $req->closeCursor();    
    }
    
    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}