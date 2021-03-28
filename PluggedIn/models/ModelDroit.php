<?php
class ModelDroit
{
    private $_bdd;

    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }

    // FONCTION QUI RÉCUPÈRE TOUS LES ARTICLES ET QUI CRÉE UN OBJET (Article) POUR CHAQUE ARTICLE
    public function getDroits()
    {
        $droits = [];
        $req = $this->_bdd->query('SELECT * FROM droit ORDER BY login DESC');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $droits[] = new Droit($data);
        }
        return $droits;
        $req->closeCursor();
    }

    // FONCTION QUI RÉCUPÈRE L'ARTICLE PAR RAPPORT À SON ID
    public function getDroit($id)
    {
        $req = $this->_bdd->prepare('SELECT * FROM droit WHERE login = ?');
        $req->execute(array($id));

        if ($req->rowCount() == 1) {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Droit($data);
        } else
            throw new Exception("Aucun Droit ne correspond à l'identifiant '$id'");

        $req->closeCursor();
    }

    public function getOneDroit($id, $colonne)
    {
        $req = $this->_bdd->prepare('SELECT ? FROM droit WHERE login = ?');
        $req->execute(array($colonne, $id));

        if ($req->rowCount() == 1) {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Droit($data);
        } else
            throw new Exception("Aucun Droit ne correspond à l'identifiant '$id'");

        $req->closeCursor();
    }



    // FONCTION QUI AJOUTE UN ARTICLE EN BDD
    public function addDroitPilote($id_pilote)
    {
        //$req = $this->_bdd->prepare('INSERT INTO droit (login, authentifier, rechercher_entreprise, creer_entreprise, modifier_entreprise, evaluer_entreprise, supprimer_entreprise, consulter_stats_entreprises, rechercher_offre, creer_offre, modifier_offre, supprimer_offre, consulter_stats_offres, rechercher_compte_pilote, creer_compte_pilote, modifier_compte_pilote, supprimer_compte_pilote, rechercher_compte_delegue, creer_compte_delegue, modifier_compte_delegue, supprimer_compte_delegue, assigner_droits_delegue, rechercher_compte_etudiant, creer_compte_etudiant, modifier_compte_etudiant,supprimer_compte_etudiant, consulter_stats_etudiants, ajouter_offre_wish-list, retirer_offre_wish-list, postuler_offre, info_sys_avance_candi1, info_sys_avance_candi2, info_sys_avance_candi3, info_sys_avance_candi4, info_sys_avance_candi5)                                                                       VALUES (?, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 0, 0');
        $req = $this->_bdd->prepare('INSERT INTO `droit`(`login`, `authentifier`, `rechercher_entreprise`, `creer_entreprise`, `modifier_entreprise`, `evaluer_entreprise`, `supprimer_entreprise`, `consulter_stats_entreprises`, `rechercher_offre`, `creer_offre`, `modifier_offre`, `supprimer_offre`, `consulter_stats_offres`, `rechercher_compte_pilote`, `creer_compte_pilote`, `modifier_compte_pilote`, `supprimer_compte_pilote`, `rechercher_compte_delegue`, `creer_compte_delegue`, `modifier_compte_delegue`, `supprimer_compte_delegue`, `assigner_droits_delegue`, `rechercher_compte_etudiant`, `creer_compte_etudiant`, `modifier_compte_etudiant`, `supprimer_compte_etudiant`, `consulter_stats_etudiants`, `ajouter_offre_wish_list`, `retirer_offre_wish_list`, `postuler_offre`, `info_sys_avance_candi1`, `info_sys_avance_candi2`, `info_sys_avance_candi3`, `info_sys_avance_candi4`, `info_sys_avance_candi5`) VALUES (?, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 1, 0)');
        $req->execute(array($id_pilote));
        $req->closeCursor();
    }

    public function addDroitEtudiant($id_etudiant)
    {
        //$req = $this->_bdd->prepare('INSERT INTO droit (login, authentifier, rechercher_entreprise, creer_entreprise, modifier_entreprise, evaluer_entreprise, supprimer_entreprise, consulter_stats_entreprises, rechercher_offre, creer_offre, modifier_offre, supprimer_offre, consulter_stats_offres, rechercher_compte_pilote, creer_compte_pilote, modifier_compte_pilote, supprimer_compte_pilote, rechercher_compte_delegue, creer_compte_delegue, modifier_compte_delegue, supprimer_compte_delegue, assigner_droits_delegue, rechercher_compte_etudiant, creer_compte_etudiant, modifier_compte_etudiant,supprimer_compte_etudiant, consulter_stats_etudiants, ajouter_offre_wish-list, retirer_offre_wish-list, postuler_offre, info_sys_avance_candi1, info_sys_avance_candi2, info_sys_avance_candi3, info_sys_avance_candi4, info_sys_avance_candi5)                                                                       VALUES (?, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 1, 0');
        $req = $this->_bdd->prepare('INSERT INTO `droit`(`login`, `authentifier`, `rechercher_entreprise`, `creer_entreprise`, `modifier_entreprise`, `evaluer_entreprise`, `supprimer_entreprise`, `consulter_stats_entreprises`, `rechercher_offre`, `creer_offre`, `modifier_offre`, `supprimer_offre`, `consulter_stats_offres`, `rechercher_compte_pilote`, `creer_compte_pilote`, `modifier_compte_pilote`, `supprimer_compte_pilote`, `rechercher_compte_delegue`, `creer_compte_delegue`, `modifier_compte_delegue`, `supprimer_compte_delegue`, `assigner_droits_delegue`, `rechercher_compte_etudiant`, `creer_compte_etudiant`, `modifier_compte_etudiant`, `supprimer_compte_etudiant`, `consulter_stats_etudiants`, `ajouter_offre_wish_list`, `retirer_offre_wish_list`, `postuler_offre`, `info_sys_avance_candi1`, `info_sys_avance_candi2`, `info_sys_avance_candi3`, `info_sys_avance_candi4`, `info_sys_avance_candi5`) VALUES (?, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 1, 0)');

        $req->execute(array($id_etudiant));
        $req->closeCursor();
    }

    public function updateDroitDelegue($id_etudiant, $name_droit, $value)
    {
        $req = $this->_bdd->prepare('UPDATE droit SET ? = ? WHERE id_droit = ?');
        $req->execute(array($name_droit, $value, $id_etudiant));
    }

    public function updateDroit(Droit $droit, $id)
    {
        $req = $this->_bdd->prepare('UPDATE `droit` SET `authentifier`= ?,`rechercher_entreprise`= ?,`creer_entreprise`= ?,`modifier_entreprise`= ?,`evaluer_entreprise`= ?,`supprimer_entreprise`= ?,`consulter_stats_entreprises`= ?,`rechercher_offre`= ?,`creer_offre`= ?,`modifier_offre`= ?,`supprimer_offre`= ?,`consulter_stats_offres`= ?,`rechercher_compte_pilote`= ?,`creer_compte_pilote`= ?,`modifier_compte_pilote`= ?,`supprimer_compte_pilote`= ?,`rechercher_compte_delegue`= ?,`creer_compte_delegue`= ?,`modifier_compte_delegue`= ?,`supprimer_compte_delegue`= ?,`assigner_droits_delegue`= ?,`rechercher_compte_etudiant`= ?,`creer_compte_etudiant`= ?,`modifier_compte_etudiant`= ?,`supprimer_compte_etudiant`= ?,`consulter_stats_etudiants`= ?,`ajouter_offre_wish_list`= ?,`retirer_offre_wish_list`= ?,`postuler_offre`= ?,`info_sys_avance_candi1`= ?,`info_sys_avance_candi2`= ?,`info_sys_avance_candi3`= ?,`info_sys_avance_candi4`= ?,`info_sys_avance_candi5`= ?
        WHERE login = ?');
        $req->execute(array(
            $droit->authentifier(),
            $droit->rechercher_entreprise(),
            $droit->creer_entreprise(),
            $droit->modifier_entreprise(),
            $droit->evaluer_entreprise(),
            $droit->supprimer_entreprise(),
            $droit->consulter_stats_entreprises(),
            $droit->rechercher_offre(),
            $droit->creer_offre(),
            $droit->modifier_offre(),
            $droit->supprimer_offre(),
            $droit->consulter_stats_offres(),
            $droit->rechercher_compte_pilote(),
            $droit->creer_compte_pilote(),
            $droit->modifier_compte_pilote(),
            $droit->supprimer_compte_pilote(),
            $droit->rechercher_compte_delegue(),
            $droit->creer_compte_delegue(),
            $droit->modifier_compte_delegue(),
            $droit->supprimer_compte_delegue(),
            $droit->assigner_droits_delegue(),
            $droit->rechercher_compte_etudiant(),
            $droit->creer_compte_etudiant(),
            $droit->modifier_compte_etudiant(),
            $droit->supprimer_compte_etudiant(),
            $droit->consulter_stats_etudiants(),
            $droit->ajouter_offre_wish_list(),
            $droit->retirer_offre_wish_list(),
            $droit->postuler_offre(),
            $droit->info_sys_avance_candi1(),
            $droit->info_sys_avance_candi2(),
            $droit->info_sys_avance_candi3(),
            $droit->info_sys_avance_candi4(),
            $droit->info_sys_avance_candi5(),
            $id
        ));
        $req->closeCursor();
    }

    /*
    public function updateLogin(Droit $droit, $id)
    {
        $req = $this->_bdd->prepare('UPDATE droit SET login = ?  WHERE login = ?');
        $req->execute(array( $droit->login(), $id ));
        $req->closeCursor();
    }
*/
    // FONCTION QUI SUPPRIME UN ARTICLE
    public function deleteDroit($id)
    {
        $req = $this->_bdd->prepare('DELETE FROM droit WHERE login = ?');
        $req->execute(array($id));
        $req->closeCursor();
    }

    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}
