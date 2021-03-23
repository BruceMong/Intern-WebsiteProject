<?php
class Comment
{
    private $_id;
    private $_articleId;
    private $_author;
    private $_comment;
    private $_alert;
    private $_commentDate;

    // CONSTRUCTEUR
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // HYDRATATION
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method))
                $this->$method($value);
        }
    }

    // GETTERS
    public function id()
    {
        return $this->_id;
    }
    public function articleId()
    {
        return $this->_articleId;
    }
    public function author()
    {
        return $this->_author;
    }
    public function comment()
    {
        return $this->_comment;
    }
    public function alert()
    {
        return $this->_alert;
    }
    public function commentDate()
    {
        return $this->_commentDate;
    }

    // SETTERS
    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0)
            $this->_id = $id;
    }
    public function setArticleId($articleId)
    {
        $articleId = (int) $articleId;

        if ($articleId > 0)
            $this->_articleId = $articleId;
    }
    public function setAuthor($author)
    {
        if (is_string($author))
            $this->_author = $author;
    }
    public function setComment($comment)
    {
        if (is_string($comment))
            $this->_comment = $comment;
    }
    public function setAlert($alert)
    {
        $alert = (int) $alert;

        if ($alert >= 0)
            $this->_alert = $alert;
    }
    public function setCommentDate($commentDate)
    {
        $this->_commentDate = $commentDate;
    }
}
