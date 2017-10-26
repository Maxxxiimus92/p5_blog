<?php $this->title = 'Projet Blog - Détail Article'; ?>

<?php $this->header = '<h1>' . $article['title'] . '</h1>'; ?>

<!-- View Article -->
<div class="row">
	<div class="col-lg-10 col-md-10 mx-auto">
		<p><em>Ecrit par <?= $article['author']; ?>, le <?= $article['created']; ?>. Modifié le <?= $article['updated']; ?>.</em></p>
		<p><strong><?= nl2br($article['chapo']); ?></strong></p>
		<p><?= nl2br($article['content']); ?></p>
		<?= "<a class='btn btn-success' href='index.php?p=edit&id=" . $article["id"] . "'>Modifier</a>"; ?>
		<?= "<a class='btn btn-danger' href='index.php?p=delete&id=" . $article["id"] . "'>Supprimer</a>"; ?>
		<a class="btn btn-primary" href="index.php?p=list">Retour</a>
	</div>
</div>

