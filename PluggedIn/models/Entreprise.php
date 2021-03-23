<?php
class Entreprise
{
    private $_id_entreprise;
    private $_nom;
    private $_secteur_activite;
    private $_nombre_stagiaire_cesi;
    private $_confiance_pilote;
    private $_evaluation_entreprise;
    private $_image;

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
    public function id_entreprise()
    {
        return $this->_id_entreprise;
    }
    public function nom()
    {
        return $this->_nom;
    }
    public function secteur_activite()
    {
        return $this->_secteur_activite;
    }

    public function nombre_stagiaire_cesi()
    {
        return $this->_nombre_stagiaire_cesi;
    }

    public function confiance_pilote()
    {
        return $this->_confiance_pilote;
    }
    public function evaluation_entreprise()
    {
        return $this->_evaluation_entreprise;
    }
    public function image()
    {
        return $this->_image;
    }


    // SETTERS
    public function setId_entreprise($id_entreprise)
    {
        $id_entreprise = (int) $id_entreprise;

        if ($id_entreprise > 0)
            $this->_id_entreprise = $id_entreprise;
    }
    public function setNom($nom)
    {
        if (is_string($nom))
            $this->_nom = $nom;
    }
    public function setSecteur_activite($secteur_activite)
    {
        if (is_string($secteur_activite))
            $this->_secteur_activite = $secteur_activite;
    }

    public function setNombre_stagiaire_cesi($nombre_stagiaire_cesi)
    {
        $nombre_stagiaire_cesi = (int) $nombre_stagiaire_cesi;

        if ($nombre_stagiaire_cesi > 0)
            $this->_nombre_stagiaire_cesi = $nombre_stagiaire_cesi;
    }

    public function setConfiance_pilote($confiance_pilote)
    {
        $confiance_pilote = (int) $confiance_pilote;

        if ($confiance_pilote > 0)
            $this->_confiance_pilote = $confiance_pilote;
    }
    public function setEvaluation_entreprise($evaluation_entreprise)
    {
        $evaluation_entreprise = (int) $evaluation_entreprise;

        if ($evaluation_entreprise > 0)
            $this->_evaluation_entreprise = $evaluation_entreprise;
    }
    public function setImage($image)
    {
        if (is_string($image))
            $this->_image = $image;
    }
}
