<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<div class="banniere_image">
    <img src="content/images/bannierePluggedIn.jpg" alt="Banniere Home" />
</div>


<div class=bloc_page>

    <?= var_dump( $_SESSION['droits'][0]->rechercher_offre() ) ; ?>
</div>


<?php require_once('views/footer.php'); ?>