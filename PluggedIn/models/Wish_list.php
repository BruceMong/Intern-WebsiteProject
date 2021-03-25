<?php
class Wish_list
{
    private $_login;
    private $_id_offre;


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
    public function login()
    {
        return $this->_login;
    }

    public function id_offre()
    {
        return $this->_id_offre;
    }


    // SETTERS
    public function setLogin($Login)
    {
        $Login = (int) $Login;

        if ($Login > 0)
            $this->_Login = $Login;
    }

    public function setId_offre($id_offre)
    {
        $id_offre = (int) $id_offre;

        if ($id_offre > 0)
            $this->_id_offre = $id_offre;
    }
}
