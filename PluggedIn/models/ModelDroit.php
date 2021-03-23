@@ -0,0 +1,71 @@
<?php
class ModelOffer
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
        $req = $this->_bdd->query('SELECT * FROM offre ORDER BY id_droit DESC');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $droits[] = new Droit($data);
        }
        return $droits;
        $req->closeCursor();
    }
    
    // FONCTION QUI RÉCUPÈRE L'ARTICLE PAR RAPPORT À SON ID
    public function getDroit($id)
    {
        $req = $this->_bdd->prepare('SELECT * FROM droit WHERE id_droit = ?');
        $req->execute(array($id));
        
        if($req->rowCount() == 1)
        {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return new Droit($data);   
        }
        else
            throw new Exception("Aucun Droit ne correspond à l'identifiant '$id'");

        $req->closeCursor();
    }
    
    // FONCTION QUI AJOUTE UN ARTICLE EN BDD
    public function addDroitPilote($id_pilote)
    {
        $req = $this->_bdd->prepare('INSERT INTO droit (id_droit, authentifier, rechercher_entreprise, creer_entreprise, modifier_entreprise, evaluer_entreprise, supprimer_entreprise, consulter_stats_entreprises, rechercher_offre, creer_offre, modifier_offre, supprimer_offre, consulter_stats_offres, rechercher_compte_pilote, creer_compte_pilote, modifier_compte_pilote, supprimer_compte_pilote, rechercher_compte_delegue, creer_compte_delegue, modifier_compte_delegue, supprimer_compte_delegue, assigner_droits_delegue, rechercher_compte_etudiant, creer_compte_etudiant, modifier_compte_etudiant,supprimer_compte_etudiant, consulter_stats_etudiants, ajouter_offre_wish-list, retirer_offre_wish-list, postuler_offre, info_sys_avance_candi1, info_sys_avance_candi2, info_sys_avance_candi3, info_sys_avance_candi4, info_sys_avance_candi5) VALUES(?, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, FALSE, FALSE, FALSE, FALSE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, FALSE, FALSE, FALSE, FALSE, FALSE, TRUE, TRUE, FALSE, FALSE');
        $req->execute(array($id_pilote));
        $req->closeCursor();    
    }
    
    public function addDroitEtudiant($id_etudiant)
    {
        $req = $this->_bdd->prepare('INSERT INTO droit (id_droit, authentifier, rechercher_entreprise, creer_entreprise, modifier_entreprise, evaluer_entreprise, supprimer_entreprise, consulter_stats_entreprises, rechercher_offre, creer_offre, modifier_offre, supprimer_offre, consulter_stats_offres, rechercher_compte_pilote, creer_compte_pilote, modifier_compte_pilote, supprimer_compte_pilote, rechercher_compte_delegue, creer_compte_delegue, modifier_compte_delegue, supprimer_compte_delegue, assigner_droits_delegue, rechercher_compte_etudiant, creer_compte_etudiant, modifier_compte_etudiant,supprimer_compte_etudiant, consulter_stats_etudiants, ajouter_offre_wish-list, retirer_offre_wish-list, postuler_offre, info_sys_avance_candi1, info_sys_avance_candi2, info_sys_avance_candi3, info_sys_avance_candi4, info_sys_avance_candi5) VALUES(?, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, FALSE, FALSE, FALSE, TRUE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, TRUE, TRUE, TRUE, TRUE, TRUE, FALSE, FALSE, TRUE, FALSE');
        $req->execute(array($id_etudiant));
        $req->closeCursor();    
    }

    public function updateDroitDelegue($id_etudiant, $name_droit, $value )
    {
        $req = $this->_bdd->prepare('UPDATE droit SET ? = ? WHERE id_droit = ?');
        $req->execute(array( $name_droit, $value, $id_etudiant));
    }
    
    // FONCTION QUI SUPPRIME UN ARTICLE
    public function deleteDroit($id)
    {
        $req = $this->_bdd->prepare('DELETE FROM droit WHERE id_droit = ?');
        $req->execute(array($id));
        $req->closeCursor();    
    }
    
    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}