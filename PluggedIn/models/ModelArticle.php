<?php
class ModelArticle
{
    private $_bdd;
    
    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }

    // FONCTION QUI TRANSFORME LE BBCODE EN CODE HTML
    public function bbcode_to_html($bbtext)
    {
      $bbtags = array(
        '[heading1]' => '<h1>','[/heading1]' => '</h1>',
        '[heading2]' => '<h2>','[/heading2]' => '</h2>',
        '[heading3]' => '<h3>','[/heading3]' => '</h3>',
        '[h1]' => '<h1>','[/h1]' => '</h1>',
        '[h2]' => '<h2>','[/h2]' => '</h2>',
        '[h3]' => '<h3>','[/h3]' => '</h3>',

        '[paragraph]' => '<p>','[/paragraph]' => '</p>',
        '[para]' => '<p>','[/para]' => '</p>',
        '[p]' => '<p>','[/p]' => '</p>',
        '[left]' => '<p style="text-align:left;">','[/left]' => '</p>',
        '[right]' => '<p style="text-align:right;">','[/right]' => '</p>',
        '[center]' => '<p style="text-align:center;">','[/center]' => '</p>',
        '[justify]' => '<p style="text-align:justify;">','[/justify]' => '</p>',

        '[bold]' => '<span style="font-weight:bold;">','[/bold]' => '</span>',
        '[italic]' => '<span style="font-style:italic;">','[/italic]' => '</span>',
        '[underline]' => '<span style="text-decoration:underline;">','[/underline]' => '</span>',
        '[b]' => '<span style="font-weight:bold;">','[/b]' => '</span>',
        '[i]' => '<span style="font-style:italic;">','[/i]' => '</span>',
        '[u]' => '<span style="text-decoration:underline;">','[/u]' => '</span>',
        '[break]' => '<br>',
        '[br]' => '<br>',
        '[newline]' => '<br>',
        '[nl]' => '<br>',

        '[unordered_list]' => '<ul>','[/unordered_list]' => '</ul>',
        '[list]' => '<ul>','[/list]' => '</ul>',
        '[ul]' => '<ul>','[/ul]' => '</ul>',

        '[ordered_list]' => '<ol>','[/ordered_list]' => '</ol>',
        '[ol]' => '<ol>','[/ol]' => '</ol>',
        '[list_item]' => '<li>','[/list_item]' => '</li>',
        '[li]' => '<li>','[/li]' => '</li>',

        '[*]' => '<li>','[/*]' => '</li>',
        '[code]' => '<code>','[/code]' => '</code>',
        '[preformatted]' => '<pre>','[/preformatted]' => '</pre>',
        '[pre]' => '<pre>','[/pre]' => '</pre>',		    
      );

      $bbtext = str_ireplace(array_keys($bbtags), array_values($bbtags), $bbtext);

      $bbextended = array(
        "/\[url](.*?)\[\/url]/i" => "<a href=\"http://$1\" title=\"$1\">$1</a>",
        "/\[url=(.*?)\](.*?)\[\/url\]/i" => "<a href=\"http://$1\" title=\"$1\">$2</a>",
        "/\[email=(.*?)\](.*?)\[\/email\]/i" => "<a href=\"mailto:$1\">$2</a>",
        "/\[mail=(.*?)\](.*?)\[\/mail\]/i" => "<a href=\"mailto:$1\">$2</a>",
        "/\[img\]([^[]*)\[\/img\]/i" => "<img src=\"$1\" alt=\" \" />",
        "/\[image\]([^[]*)\[\/image\]/i" => "<img src=\"$1\" alt=\" \" />",
        "/\[image_left\]([^[]*)\[\/image_left\]/i" => "<img src=\"$1\" alt=\" \" class=\"img_left\" />",
        "/\[image_right\]([^[]*)\[\/image_right\]/i" => "<img src=\"$1\" alt=\" \" class=\"img_right\" />",
      );

      foreach($bbextended as $match=>$replacement){
        $bbtext = preg_replace($match, $replacement, $bbtext);
      }
      return $bbtext;
    }     
    
    // FONCTION QUI RÉCUPÈRE TOUS LES ARTICLES ET QUI CRÉE UN OBJET (Article) POUR CHAQUE ARTICLE
    public function getArticles()
    {  
        $articles = [];
        
        $req = $this->_bdd->query('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS articleDate FROM articles ORDER BY id DESC');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $articles[] = new Article($data);
        }
        return $articles;
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