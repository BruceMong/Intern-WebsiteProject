<?php
class ModelEntreprise
{
    private $_bdd;
    
    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }
    
    // FONCTION QUI RÉCUPÈRE TOUS LES ARTICLES ET QUI CRÉE UN OBJET (Article) POUR CHAQUE ARTICLE
    public function getEntreprises()
    {  
        $entreprises = [];
        
        $req = $this->_bdd->query('SELECT id_entreprise, nom, secteur_activite, nombre_stagiaire_cesi, confiance_pilote, evaluation_entreprise, image FROM entreprise  ORDER BY id_entreprise DESC');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $entreprises[] = new Entreprise($data);
        }
        return $entreprises;
        $req->closeCursor();
    }
    
    // FONCTION QUI RÉCUPÈRE L'ARTICLE PAR RAPPORT À SON ID
    public function getEntreprise($id)
    {
        $req = $this->_bdd->prepare('SELECT id_entreprise, nom, secteur_activite, nombre_stagiaire_cesi, confiance_pilote, evaluation_entreprise, image FROM entreprise  WHERE id_entreprise = ?');
        $req->execute(array($id));
        
        if($req->rowCount() == 1)
        {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Entreprise($data);   
        }
        else
            throw new Exception("Aucun Entreprise ne correspond à l'identifiant '$id'");
        $req->closeCursor();
    }

    public function getEntrepriseByName($name)
    {
        $req = $this->_bdd->prepare('SELECT id_entreprise, nom, secteur_activite, nombre_stagiaire_cesi, confiance_pilote, evaluation_entreprise, image FROM entreprise  WHERE nom = ?');
        $req->execute(array($name));
        
        if($req->rowCount() == 1)
        {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Entreprise($data);   
        }
        else
            throw new Exception("Aucun Entreprise ne correspond à l'identifiant '$name'");
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