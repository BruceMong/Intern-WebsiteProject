<?php
class Droit
{
    private $_login;
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
    public function login()
    {
        return $this->_login;
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
    public function setLogin($login)
    {
        if (is_string($login))
            $this->_login = $login;
    }

    public function setAuthentifier($authentifier)
    {
        if ($authentifier == 0 || $authentifier == 1)
            $this->_authentifier = $authentifier;
    }

    public function setRechercher_entreprise($rechercher_entreprise)
    {
        if ( ($rechercher_entreprise == 0 || $rechercher_entreprise == 1))
            $this->_rechercher_entreprise = $rechercher_entreprise;
    }


    public function setCreer_entreprise($creer_entreprise)
    {
        if ( ($creer_entreprise == 0 || $creer_entreprise == 1))
            $this->_creer_entreprise = $creer_entreprise;
    }


    public function setModifier_entreprise($modifier_entreprise)
    {
        if ( ($modifier_entreprise == 0 || $modifier_entreprise == 1))
            $this->_modifier_entreprise = $modifier_entreprise;
    }

    public function setEvaluer_entreprise($evaluer_entreprise)
    {
        if ( ($evaluer_entreprise == 0 || $evaluer_entreprise == 1))
            $this->_evaluer_entreprise = $evaluer_entreprise;
    }

    public function setSupprimer_entreprise($supprimer_entreprise)
    {
        if ( ($supprimer_entreprise == 0 || $supprimer_entreprise == 1))
            $this->_supprimer_entreprise = $supprimer_entreprise;
    }

    public function setConsulter_stats_entreprises($consulter_stats_entreprises)
    {
        if ( ($consulter_stats_entreprises == 0 || $consulter_stats_entreprises == 1))
            $this->_consulter_stats_entreprises = $consulter_stats_entreprises;
    }

    public function setRechercher_offre($rechercher_offre)
    {
        if ( ($rechercher_offre == 0 || $rechercher_offre == 1))
            $this->_rechercher_offre = $rechercher_offre;
    }

    public function setCreer_offre($creer_offre)
    {
        if ( ($creer_offre == 0 || $creer_offre == 1))
            $this->_creer_offre = $creer_offre;
    }

    public function setModifier_offre($modifier_offre)
    {
        if ( ($modifier_offre == 0 || $modifier_offre == 1))
            $this->_modifier_offre = $modifier_offre;
    }

    public function setSupprimer_offre($supprimer_offre)
    {
        if ( ($supprimer_offre == 0 || $supprimer_offre == 1))
            $this->_supprimer_offre = $supprimer_offre;
    }

    public function setConsulter_stats_offres($consulter_stats_offres)
    {
        if ( ($consulter_stats_offres == 0 || $consulter_stats_offres == 1))
            $this->_consulter_stats_offres = $consulter_stats_offres;
    }

    public function setRechercher_compte_pilote($rechercher_compte_pilote)
    {
        if ( ($rechercher_compte_pilote == 0 || $rechercher_compte_pilote == 1))
            $this->_rechercher_compte_pilote = $rechercher_compte_pilote;
    }

    public function setCreer_compte_pilote($creer_compte_pilote)
    {
        if ( ($creer_compte_pilote == 0 || $creer_compte_pilote == 1))
            $this->_creer_compte_pilote = $creer_compte_pilote;
    }

    public function setModifier_compte_pilote($modifier_compte_pilote)
    {
        if ( ($modifier_compte_pilote == 0 || $modifier_compte_pilote == 1))
            $this->_modifier_compte_pilote = $modifier_compte_pilote;
    }

    public function setSupprimer_compte_pilote($supprimer_compte_pilote)
    {
        if ( ($supprimer_compte_pilote == 0 || $supprimer_compte_pilote == 1))
            $this->_supprimer_compte_pilote = $supprimer_compte_pilote;
    }

    public function setRechercher_compte_delegue($rechercher_compte_delegue)
    {
        if ( ($rechercher_compte_delegue == 0 || $rechercher_compte_delegue == 1))
            $this->_rechercher_compte_delegue = $rechercher_compte_delegue;
    }

    public function setCreer_compte_delegue($creer_compte_delegue)
    {
        if ( ($creer_compte_delegue == 0 || $creer_compte_delegue == 1))
            $this->_creer_compte_delegue = $creer_compte_delegue;
    }

    public function setModifier_compte_delegue($modifier_compte_delegue)
    {
        if ( ($modifier_compte_delegue == 0 || $modifier_compte_delegue == 1))
            $this->_modifier_compte_delegue = $modifier_compte_delegue;
    }

    public function setSupprimer_compte_delegue($supprimer_compte_delegue)
    {
        if ( ($supprimer_compte_delegue == 0 || $supprimer_compte_delegue == 1))
            $this->_supprimer_compte_delegue = $supprimer_compte_delegue;
    }

    public function setAssigner_droits_delegue($assigner_droits_delegue)
    {
        if ( ($assigner_droits_delegue == 0 || $assigner_droits_delegue == 1))
            $this->_assigner_droits_delegue = $assigner_droits_delegue;
    }

    public function setRechercher_compte_etudiant($rechercher_compte_etudiant)
    {
        if ( ($rechercher_compte_etudiant == 0 || $rechercher_compte_etudiant == 1))
            $this->_rechercher_compte_etudiant = $rechercher_compte_etudiant;
    }

    public function setCreer_compte_etudiant($creer_compte_etudiant)
    {
        if ( ($creer_compte_etudiant == 0 || $creer_compte_etudiant == 1))
            $this->_creer_compte_etudiant = $creer_compte_etudiant;
    }

    public function setModifier_compte_etudiant($modifier_compte_etudiant)
    {
        if ( ($modifier_compte_etudiant == 0 || $modifier_compte_etudiant == 1))
            $this->_modifier_compte_etudiant = $modifier_compte_etudiant;
    }

    public function setSupprimer_compte_etudiant($supprimer_compte_etudiant)
    {
        if ( ($supprimer_compte_etudiant == 0 || $supprimer_compte_etudiant == 1))
            $this->_supprimer_compte_etudiant = $supprimer_compte_etudiant;
    }

    public function setConsulter_stats_etudiants($consulter_stats_etudiants)
    {
        if ( ($consulter_stats_etudiants == 0 || $consulter_stats_etudiants == 1))
            $this->_consulter_stats_etudiants = $consulter_stats_etudiants;
    }

    public function setAjouter_offre_wish_list($ajouter_offre_wish_list)
    {
        if ( ($ajouter_offre_wish_list == 0 || $ajouter_offre_wish_list == 1))
            $this->_ajouter_offre_wish_list = $ajouter_offre_wish_list;
    }

    public function setRetirer_offre_wish_list($retirer_offre_wish_list)
    {
        if ( ($retirer_offre_wish_list == 0 || $retirer_offre_wish_list == 1))
            $this->_retirer_offre_wish_list = $retirer_offre_wish_list;
    }

    public function setPostuler_offre($postuler_offre)
    {
        if ( ($postuler_offre == 0 || $postuler_offre == 1))
            $this->_postuler_offre = $postuler_offre;
    }

    public function setInfo_sys_avance_candi1($info_sys_avance_candi1)
    {
        if ( ($info_sys_avance_candi1 == 0 || $info_sys_avance_candi1 == 1))
            $this->_info_sys_avance_candi1 = $info_sys_avance_candi1;
    }

    public function setInfo_sys_avance_candi2($info_sys_avance_candi2)
    {
        if ( ($info_sys_avance_candi2 == 0 || $info_sys_avance_candi2 == 1))
            $this->_info_sys_avance_candi2 = $info_sys_avance_candi2;
    }

    public function setInfo_sys_avance_candi3($info_sys_avance_candi3)
    {
        if ( ($info_sys_avance_candi3 == 0 || $info_sys_avance_candi3 == 1))
            $this->_info_sys_avance_candi3 = $info_sys_avance_candi3;
    }

    public function setInfo_sys_avance_candi4($info_sys_avance_candi4)
    {
        if ( ($info_sys_avance_candi4 == 0 || $info_sys_avance_candi4 == 1))
            $this->_info_sys_avance_candi4 = $info_sys_avance_candi4;
    }

    public function setInfo_sys_avance_candi5($info_sys_avance_candi5)
    {
        if ( ($info_sys_avance_candi5 == 0 || $info_sys_avance_candi5 == 1))
            $this->_info_sys_avance_candi5 = $info_sys_avance_candi5;
    }
}
