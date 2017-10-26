<?php $this->title = 'Projet Blog - Articles'; ?>

<?php $this->header = '<h1>Liste des Articles</h1>'; ?>

<?php $this->subheader = '<span class="subheading">Cliquez sur un titre pour voir son contenu et/ou le modifier</span>'; ?>

<?php $this->button = '<a href="index.php?p=add" class="btn btn-secondary">Ajouter un article</a>'; ?>

<!-- List of Articles -->
<?php foreach ($articles as $article): ?>
    <div class='row'>
        <div class='col-lg-10 col-md-10 mx-auto'>
            <a href="index.php?p=article&id=<?= $article['id']; ?>"><h2><?= $article['title']; ?></h2></a>
            <p><?= nl2br($article['chapo']); ?></p>
            <p><em>Créé le <?= $article['created']; ?>. Modifié le <?= $article['updated']; ?></em></p>
        </div>
    </div>
    <hr>
<?php endforeach; ?>
