<?php
class ModelComment
{
    private $_bdd;

    // CONSTRUCTEUR
    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }

    // FONCTION QUI RÉCUPÈRE LES COMMENTAIRES ASSOCIÉS À UN ARTICLE
    public function getComments($articleId, $limit)
    {
        $comments = [];

        $req = $this->_bdd->prepare('SELECT id, articleId, author, comment, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate FROM comments WHERE articleId = ? ORDER BY id ASC LIMIT ' . $limit . ',3');
        $req->execute(array($articleId));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }
        return $comments;
        $req->closeCursor();
    }

    // FONCTION QUI RETOURNE LE NOMBRE DE COMMENTAIRES ASSOCIÉS À UN ARTICLE
    public function countComments($articleId)
    {
        $req = $this->_bdd->prepare('SELECT COUNT(id) FROM comments WHERE articleId = ?');
        $req->execute(array($articleId));
        return $req->fetchColumn();
        $req->closeCursor();
    }

    // FONCTION QUI AJOUTE LE COMMENTAIRE DE L'UTILISATEUR EN BDD
    public function addComment(Comment $com)
    {
        $req = $this->_bdd->prepare('INSERT INTO comments (articleId, author, comment, date) VALUES(?, ?, ?, NOW())');
        $req->execute(array($com->articleId(), $com->author(), $com->comment()));
        $req->closeCursor();
    }

    // FONCTION QUI SIGNALE UN COMMENTAIRE
    public function alertComment($comid)
    {
        $req = $this->_bdd->prepare('UPDATE comments SET alert = alert+1 WHERE id = ?');
        $req->execute(array($comid));
        $req->closeCursor();
    }

    // FONCTION QUI RETOURNE LE NOMBRE DE COMMENTAIRES SIGNALÉS
    public function countAlertComments()
    {
        $req = $this->_bdd->prepare('SELECT COUNT(id) FROM comments WHERE alert > 0');
        $req->execute();
        return $req->fetchColumn();
        $req->closeCursor();
    }

    // FONCTION QUI RÉCUPÈRE LES COMMENTAIRES SIGNALÉS
    public function getAlertComments()
    {
        $alertComments = [];

        $req = $this->_bdd->prepare('SELECT id, author, comment, alert, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate FROM comments WHERE alert > 0 ORDER BY alert DESC');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $alertComments[] = new Comment($data);
        }
        return $alertComments;
        $req->closeCursor();
    }

    // FONCTION QUI SUPPRIME UN COMMENTAIRE
    public function deleteComment($comid)
    {
        $req = $this->_bdd->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($comid));
        $req->closeCursor();
    }

    // SETTERS
    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}
