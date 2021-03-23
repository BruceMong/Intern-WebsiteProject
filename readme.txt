
La bdd est pluggedin.sql
à installer avant de pourvoir tester le site










Note random:

session_start();
// JE VÉRIFIE QUE L'ADMINISTRATEUR EST BIEN AUTHENTIFIÉ
if(empty($_SESSION['admin']))
    header('Location:'.URL.'login');

    redirection
