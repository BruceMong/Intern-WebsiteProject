host:localhost
dbname:blog
username:root
password:root (mac)

Administration (en local):
Login: jean
Mot de passe: forteroche



url du site en ligne => https://projet4.jonathanrichard.fr

https://github.com/JOE54


MESSAGE DE BRUCE : 

ON S'EN BALLEC

    <?php foreach($entreprises as $entreprise): ?>
            <h3><?= ucfirst($entreprise->nom() ) ?></h3>
        <br />
    <?php endforeach; ?>