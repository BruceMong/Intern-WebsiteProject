<?php
class Droit
{
    private $_id_droit;
    private $_authentifier;
    private $_rechercher_entreprise;
    private $_creer_entreprise;
    private $_modifier_entreprise;
    private $_evaluer_entreprise;
    private $_supprimer_entreprise;
    private $_consulter_stats_entreprises;
    private $_rechercher_offre;
    private $_creer_offre;
    private $_modifier_offre;
    private $_supprimer_offre;
    private $_consulter_stats_offres;
    private $_rechercher_compte_pilote;
    private $_creer_compte_pilote;
    private $_modifier_compte_pilote;
    private $_supprimer_compte_pilote;
    private $_rechercher_compte_delegue;
    private $_creer_compte_delegue;
    private $_modifier_compte_delegue;
    private $_supprimer_compte_delegue;
    private $_assigner_droits_delegue;
    private $_rechercher_compte_etudiant;
    private $_creer_compte_etudiant;
    private $_modifier_compte_etudiant;
    private $_supprimer_compte_etudiant;
    private $_consulter_stats_etudiants;
    private $_ajouter_offre_wish_list;
    private $_retirer_offre_wish_list;
    private $_postuler_offre;
    private $_info_sys_avance_candi1;
    private $_info_sys_avance_candi2;
    private $_info_sys_avance_candi3;
    private $_info_sys_avance_candi4;
    private $_info_sys_avance_candi5;

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
    public function id_droit()
    {
        return $this->_id_droit;
    }

    public function authentifier()
    {
        return $this->_authentifier;
    }

    public function rechercher_entreprise()
    {
        return $this->_rechercher_entreprise;
    }

    public function creer_entreprise()
    {
        return $this->_creer_entreprise;
    }

    public function modifier_entreprise()
    {
        return $this->_modifier_entreprise;
    }

    public function evaluer_entreprise()
    {
        return $this->_evaluer_entreprise;
    }

    public function supprimer_entreprise()
    {
        return $this->_supprimer_entreprise;
    }

    public function consulter_stats_entreprises()
    {
        return $this->_consulter_stats_entreprises;
    }

    public function rechercher_offre()
    {
        return $this->_rechercher_offre;
    }

    public function creer_offre()
    {
        return $this->_creer_offre;
    }

    public function modifier_offre()
    {
        return $this->_modifier_offre;
    }

    public function supprimer_offre()
    {
        return $this->_supprimer_offre;
    }

    public function consulter_stats_offres()
    {
        return $this->_consulter_stats_offres;
    }

    public function rechercher_compte_pilote()
    {
        return $this->_rechercher_compte_pilote;
    }

    public function creer_compte_pilote()
    {
        return $this->_creer_compte_pilote;
    }

    public function modifier_compte_pilote()
    {
        return $this->_modifier_compte_pilote;
    }

    public function supprimer_compte_pilote()
    {
        return $this->_supprimer_compte_pilote;
    }

    public function rechercher_compte_delegue()
    {
        return $this->_rechercher_compte_delegue;
    }

    public function creer_compte_delegue()
    {
        return $this->_creer_compte_delegue;
    }

    public function modifier_compte_delegue()
    {
        return $this->_modifier_compte_delegue;
    }
    public function supprimer_compte_delegue()
    {
        return $this->_supprimer_compte_delegue;
    }

    public function assigner_droits_delegue()
    {
        return $this->_assigner_droits_delegue;
    }

    public function rechercher_compte_etudiant()
    {
        return $this->_rechercher_compte_etudiant;
    }

    public function creer_compte_etudiant()
    {
        return $this->_creer_compte_etudiant;
    }

    public function modifier_compte_etudiant()
    {
        return $this->_modifier_compte_etudiant;
    }

    public function supprimer_compte_etudiant()
    {
        return $this->_supprimer_compte_etudiant;
    }

    public function consulter_stats_etudiants()
    {
        return $this->_consulter_stats_etudiants;
    }

    public function ajouter_offre_wish_list()
    {
        return $this->_ajouter_offre_wish_list;
    }

    public function retirer_offre_wish_list()
    {
        return $this->_retirer_offre_wish_list;
    }

    public function postuler_offre()
    {
        return $this->_postuler_offre;
    }

    public function info_sys_avance_candi1()
    {
        return $this->_info_sys_avance_candi1;
    }

    public function info_sys_avance_candi2()
    {
        return $this->_info_sys_avance_candi2;
    }

    public function info_sys_avance_candi3()
    {
        return $this->_info_sys_avance_candi3;
    }


    public function info_sys_avance_candi4()
    {
        return $this->_info_sys_avance_candi4;
    }


    public function info_sys_avance_candi5()
    {
        return $this->_info_sys_avance_candi5;
    }


    // SETTERS
    public function setId_droit($id_droit)
    {
        $id_droit = (int) $id_droit;

        if ($id_droit > 0)
            $this->_id_droit = $id_droit;
    }

    public function setAuthentifier($authentifier)
    {
        if (is_bool($authentifier))
            $this->_authentifier = $authentifier;
    }

    public function setRechercher_entreprise($rechercher_entreprise)
    {
        if (is_bool($rechercher_entreprise))
            $this->_rechercher_entreprise = $rechercher_entreprise;
    }


    public function setCreer_entreprise($creer_entreprise)
    {
        if (is_bool($creer_entreprise))
            $this->_creer_entreprise = $creer_entreprise;
    }


    public function setModifier_entreprise($modifier_entreprise)
    {
        if (is_bool($modifier_entreprise))
            $this->_modifier_entreprise = $modifier_entreprise;
    }

    public function setEvaluer_entreprise($evaluer_entreprise)
    {
        if (is_bool($evaluer_entreprise))
            $this->_evaluer_entreprise = $evaluer_entreprise;
    }

    public function setSupprimer_entreprise($supprimer_entreprise)
    {
        if (is_bool($supprimer_entreprise))
            $this->_supprimer_entreprise = $supprimer_entreprise;
    }

    public function setConsulter_stats_entreprises($consulter_stats_entreprises)
    {
        if (is_bool($consulter_stats_entreprises))
            $this->_consulter_stats_entreprises = $consulter_stats_entreprises;
    }

    public function setRechercher_offre($rechercher_offre)
    {
        if (is_bool($rechercher_offre))
            $this->_rechercher_offre = $rechercher_offre;
    }

    public function setCreer_offre($creer_offre)
    {
        if (is_bool($creer_offre))
            $this->_creer_offre = $creer_offre;
    }

    public function setModifier_offre($modifier_offre)
    {
        if (is_bool($modifier_offre))
            $this->_modifier_offre = $modifier_offre;
    }

    public function setSupprimer_offre($supprimer_offre)
    {
        if (is_bool($supprimer_offre))
            $this->_supprimer_offre = $supprimer_offre;
    }

    public function setConsulter_stats_offres($consulter_stats_offres)
    {
        if (is_bool($consulter_stats_offres))
            $this->_consulter_stats_offres = $consulter_stats_offres;
    }

    public function setRechercher_compte_pilote($rechercher_compte_pilote)
    {
        if (is_bool($rechercher_compte_pilote))
            $this->_rechercher_compte_pilote = $rechercher_compte_pilote;
    }

    public function setCreer_compte_pilote($creer_compte_pilote)
    {
        if (is_bool($creer_compte_pilote))
            $this->_creer_compte_pilote = $creer_compte_pilote;
    }

    public function setModifier_compte_pilote($modifier_compte_pilote)
    {
        if (is_bool($modifier_compte_pilote))
            $this->_modifier_compte_pilote = $modifier_compte_pilote;
    }

    public function setSupprimer_compte_pilote($supprimer_compte_pilote)
    {
        if (is_bool($supprimer_compte_pilote))
            $this->_supprimer_compte_pilote = $supprimer_compte_pilote;
    }

    public function setRechercher_compte_delegue($rechercher_compte_delegue)
    {
        if (is_bool($rechercher_compte_delegue))
            $this->_rechercher_compte_delegue = $rechercher_compte_delegue;
    }

    public function setCreer_compte_delegue($creer_compte_delegue)
    {
        if (is_bool($creer_compte_delegue))
            $this->_creer_compte_delegue = $creer_compte_delegue;
    }

    public function setModifier_compte_delegue($modifier_compte_delegue)
    {
        if (is_bool($modifier_compte_delegue))
            $this->_modifier_compte_delegue = $modifier_compte_delegue;
    }

    public function setSupprimer_compte_delegue($supprimer_compte_delegue)
    {
        if (is_bool($supprimer_compte_delegue))
            $this->_supprimer_compte_delegue = $supprimer_compte_delegue;
    }

    public function setAssigner_droits_delegue($assigner_droits_delegue)
    {
        if (is_bool($assigner_droits_delegue))
            $this->_assigner_droits_delegue = $assigner_droits_delegue;
    }

    public function setRechercher_compte_etudiant($rechercher_compte_etudiant)
    {
        if (is_bool($rechercher_compte_etudiant))
            $this->_rechercher_compte_etudiant = $rechercher_compte_etudiant;
    }

    public function setCreer_compte_etudiant($creer_compte_etudiant)
    {
        if (is_bool($creer_compte_etudiant))
            $this->_creer_compte_etudiant = $creer_compte_etudiant;
    }

    public function setModifier_compte_etudiant($modifier_compte_etudiant)
    {
        if (is_bool($modifier_compte_etudiant))
            $this->_modifier_compte_etudiant = $modifier_compte_etudiant;
    }

    public function setSupprimer_compte_etudiant($supprimer_compte_etudiant)
    {
        if (is_bool($supprimer_compte_etudiant))
            $this->_supprimer_compte_etudiant = $supprimer_compte_etudiant;
    }

    public function setConsulter_stats_etudiants($consulter_stats_etudiants)
    {
        if (is_bool($consulter_stats_etudiants))
            $this->_consulter_stats_etudiants = $consulter_stats_etudiants;
    }

    public function setAjouter_offre_wish_list($ajouter_offre_wish_list)
    {
        if (is_bool($ajouter_offre_wish_list))
            $this->_ajouter_offre_wish_list = $ajouter_offre_wish_list;
    }

    public function setRetirer_offre_wish_list($retirer_offre_wish_list)
    {
        if (is_bool($retirer_offre_wish_list))
            $this->_retirer_offre_wish_list = $retirer_offre_wish_list;
    }

    public function setPostuler_offre($postuler_offre)
    {
        if (is_bool($postuler_offre))
            $this->_postuler_offre = $postuler_offre;
    }

    public function setInfo_sys_avance_candi1($info_sys_avance_candi1)
    {
        if (is_bool($info_sys_avance_candi1))
            $this->_info_sys_avance_candi1 = $info_sys_avance_candi1;
    }

    public function setInfo_sys_avance_candi2($info_sys_avance_candi2)
    {
        if (is_bool($info_sys_avance_candi2))
            $this->_info_sys_avance_candi2 = $info_sys_avance_candi2;
    }

    public function setInfo_sys_avance_candi3($info_sys_avance_candi3)
    {
        if (is_bool($info_sys_avance_candi3))
            $this->_info_sys_avance_candi3 = $info_sys_avance_candi3;
    }

    public function setInfo_sys_avance_candi4($info_sys_avance_candi4)
    {
        if (is_bool($info_sys_avance_candi4))
            $this->_info_sys_avance_candi4 = $info_sys_avance_candi4;
    }

    public function setInfo_sys_avance_candi5($info_sys_avance_candi5)
    {
        if (is_bool($info_sys_avance_candi5))
            $this->_info_sys_avance_candi5 = $info_sys_avance_candi5;
    }
}
