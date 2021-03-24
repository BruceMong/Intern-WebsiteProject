<?php
class Promotion
{
    private $_id_promotion;
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
    public function id_promotion()
    {
        return $this->_id_promotion;
    }

    public function libelle()
    {
        return $this->_libelle;
    }


    // SETTERS
    public function setId_promotion($id_promotion)
    {
        $id_promotion = (int) $id_promotion;

        if ($id_promotion > 0)
            $this->_id_promotion = $id_promotion;
    }

    public function setLibelle($libelle)
    {
        if (is_string($libelle))
            $this->_libelle = $libelle;
    }
}
