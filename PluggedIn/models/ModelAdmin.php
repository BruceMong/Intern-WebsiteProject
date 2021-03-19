<?php
class ModelAdmin
{
    private $_bdd;
    
    // CONSTRUCTEUR
    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }
    
    // FONCTION QUI VÉRIFIE UNE CORRESPONDANCE AVEC SES PARAMÈTRES DANS LA BDD
    public function exists($login, $pass)
    {        
        $req = $this->_bdd->prepare('SELECT id FROM admin WHERE login= ? AND pass = ?');
        $req->execute(array($login, sha1($pass)));
        if($req->rowCount() == 1)
        {
            return true; 
        }
        $req->closeCursor();
    }
    
    // FONCTION QUI RÉCUPÈRE LES INFOS SUR L'ADMIN
    public function getAdmin($login)
    {        
        $req = $this->_bdd->prepare('SELECT id, login, pass FROM admin WHERE login= ?');
        $req->execute(array($login));
        if($req->rowCount() == 1)
        {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Admin($data);   
        }
        $req->closeCursor();        
    }
    
    // FONCTION QUI MET À JOUR LE MOT DE PASSE
    public function updatePass(Admin $admin)
    {
        $req = $this->_bdd->prepare('UPDATE admin SET pass = ? WHERE id = 1');
        $req->execute(array($admin->pass()));
        $req->closeCursor(); 
    }
    
    // SETTERS
    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}