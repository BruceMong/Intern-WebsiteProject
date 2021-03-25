
La bdd est pluggedin.sql
à installer avant de pourvoir tester le site










Note random:

session_start();
// JE VÉRIFIE QUE L'ADMINISTRATEUR EST BIEN AUTHENTIFIÉ
if(empty($_SESSION['admin']))
    header('Location:'.URL.'login');

    redirection


`id_droit`, `authentifier`, `rechercher_entreprise`, `creer_entreprise`, 
`modifier_entreprise`, `evaluer_entreprise`, `supprimer_entreprise`,
 `consulter_stats_entreprises`, `rechercher_offre`, `creer_offre`, 
`modifier_offre`, `supprimer_offre`, `consulter_stats_offres`,
 `rechercher_compte_pilote`, `creer_compte_pilote`, 
 `modifier_compte_pilote`, 
`supprimer_compte_pilote`, `rechercher_compte_delegue`,
 `creer_compte_delegue`,
 `modifier_compte_delegue`, `supprimer_compte_delegue`, 
 `assigner_droits_delegue`, 
`rechercher_compte_etudiant`, `creer_compte_etudiant`, 
`modifier_compte_etudiant`, 
`supprimer_compte_etudiant`, `consulter_stats_etudiants`,
 `ajouter_offre_wish_list`,
 `retirer_offre_wish_list`, `postuler_offre`,
  `info_sys_avance_candi1`, 
`info_sys_avance_candi2`, `info_sys_avance_candi3`, 
`info_sys_avance_candi4`,
 `info_sys_avance_candi5`