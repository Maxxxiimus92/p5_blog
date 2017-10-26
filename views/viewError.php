<?php $this->title = 'Projet Blog - Erreur'; ?>

<?php $this->header = '<h1>Erreur 404</h1>'; ?>

<!-- Error Page -->
<div class="row">
    <div class="col-lg-10 col-md-10 mx-auto">
        <h4>Une erreur est survenue : <?= $msgError ?></h4>
        <br>
        <a class="btn btn-primary" href="index.php?p=list">Retour</a>
    </div>
</div>
