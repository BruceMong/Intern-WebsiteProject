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
        $req->execute(array($login, sha1($mot_de_passe)));
        if($req->rowCount() == 1)
        {
            return true; 
        }
        $req->closeCursor();
    }
    
    // FONCTION QUI RÉCUPÈRE LES INFOS SUR L'ADMIN
    public function getUtilisateur($login)
    {        
        $req = $this->_bdd->prepare('SELECT id_users, login, mot_de_passe, nom, prenom, centre FROM utilisateur WHERE login= ?');
        $req->execute(array($login));
        if($req->rowCount() == 1)
        {
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
}