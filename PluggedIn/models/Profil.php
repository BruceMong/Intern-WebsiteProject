<?php
class Profil
{
    private $_id_profil;
    private $_libelle;


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
    public function id_profil()
    {
        return $this->_id_profil;
    }

    public function libelle()
    {
        return $this->_libelle;
    }


    // SETTERS
    public function setId_profil($id_profil)
    {
        $id_profil = (int) $id_profil;

        if ($id_profil > 0)
            $this->_id_profil = $id_profil;
    }

    public function setLibelle($libelle)
    {
        if (is_string($libelle))
            $this->_libelle = $libelle;
    }
}
