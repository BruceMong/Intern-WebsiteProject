<?php
function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

class Offer
{
    private $_id_offre;
    private $_competences;
    private $_localite;
    private $_entreprise;
    private $_type_promo_concerne;
    private $_duree_stage;
    private $_base_remuneration;
    private $_duree_offre;
    private $_nombre_place;
    private $_date;

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
    public function id_offre()
    {
        return $this->_id_offre;
    }
    public function competences()
    {
        return $this->_competences;
    }
    public function localite()
    {
        return $this->_localite;
    }

    public function entreprise()
    {
        return $this->_entreprise;
    }

    public function type_promo_concerne()
    {
        return $this->_type_promo_concerne;
    }
    public function duree_stage()
    {
        return $this->_duree_stage;
    }
    public function base_remuneration()
    {
        return $this->_base_remuneration;
    }

    public function duree_offre()
    {
        return $this->_duree_offre;
    }

    public function nombre_place()
    {
        return $this->_nombre_place;
    }

    public function date()
    {
        return $this->_date;
    }

    // SETTERS
    public function setId_offre($id_offre)
    {
        $id_offre = (int) $id_offre;

        if ($id_offre > 0)
            $this->_id_offre = $id_offre;
    }
    public function setCompetences($competences)
    {
        if (is_string($competences))
            $this->_competences = $competences;
    }
    public function setLocalite($localite)
    {
        if (is_string($localite))
            $this->_localite = $localite;
    }

    public function setEntreprise($entreprise)
    {
        if (is_string($entreprise))
            $this->_entreprise = $entreprise;
    }

    public function setType_promo_concerne($type_promo_concerne)
    {
        if (is_string($type_promo_concerne))
            $this->_type_promo_concerne = $type_promo_concerne;
    }

    public function setBase_remuneration($base_remuneration)
    {
        $base_remuneration = (int) $base_remuneration;

        if ($base_remuneration > 0)
            $this->_base_remuneration = $base_remuneration;
    }

    public function setDuree_stage($duree_stage)
    {
        $duree_stage = (int) $duree_stage;

        if ($duree_stage > 0)
            $this->_duree_stage = $duree_stage;
    }

    public function setDuree_offre($duree_offre)
    {
        $duree_offre = (int) $duree_offre;

        if ($duree_offre > 0)
            $this->_duree_offre = $duree_offre;
    }

    public function setNombre_place($nombre_place)
    {
        $nombre_place = (int) $nombre_place;

        if ($nombre_place > 0)
            $this->_nombre_place = $nombre_place;
    }



    public function setDate($date)
    {
        if (validateDate($date, 'Y-m-d'))
            $this->_date = $date;
    }
}
