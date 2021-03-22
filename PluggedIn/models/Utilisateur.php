<?php
class Utilisateur
{
    private $_id_users;
    private $_nom;
    private $_prenom;
    private $_login;
    private $_centre;
    private $_mot_de_passe;
    private $_id_promotion;

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
    public function id_users()
    {
        return $this->_id_users;
    }
    public function nom()
    {
        return $this->_nom;
    }
    public function prenom()
    {
        return $this->_prenom;
    }

    public function mot_de_passe()
    {
        return $this->_mot_de_passe;
    }

    public function login()
    {
        return $this->_login;
    }

    public function centre()
    {
        return $this->_centre;
    }
    public function id_promotion()
    {
        return $this->_id_promotion;
    }

    // SETTERS
    public function setId_users($id_users)
    {
        $id_users = (int) $id_users;

        if ($id_users > 0)
            $this->_id_users = $id_users;
    }
    public function setNom($nom)
    {
        if (is_string($nom))
            $this->_nom = $nom;
    }
    public function setPrenom($prenom)
    {
        if (is_string($prenom))
            $this->_prenom = $prenom;
    }

    public function setMot_de_passe($mot_de_passe)
    {
        if (is_string($mot_de_passe))
            $this->_mot_de_passe = $mot_de_passe;
    }

    public function setLogin($login)
    {
        if (is_string($login))
            $this->_login = $login;
    }

    public function setCentre($centre)
    {
        if (is_string($centre))
            $this->_centre = $centre;
    }


    public function setId_promotion($id_promotion)
    {
        $id_promotion = (int) $id_promotion;

        if ($id_promotion > 0)
            $this->_id_promotion = $id_promotion;
    }
}
