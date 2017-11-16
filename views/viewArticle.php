<?php $this->title = 'Projet Blog - ' . $this->clean($article->getTitle()); ?>

<?php $this->header = "<a class='btn btn-success' href='index.php?p=edit&id=" . $article->getId() . "'>Modifier</a>
						<a class='btn btn-danger' href='index.php?p=delete&id=" . $article->getId() . "'>Supprimer</a>
						<a class='btn btn-primary' href='index.php?p=list'>Retour</a>"; ?>

<!-- View Article -->
<div class="row">
	<div class="col-lg-12 col-md-12 mx-auto">
		<h1><?= $this->clean($article->getTitle()); ?></h1>
		<p><em>Ecrit par <?= $this->clean($article->getAuthor()); ?>, le <?= $article->getCreated(); ?>. Modifié le <?= $article->getUpdated(); ?>.</em></p>
		<p><strong><?= nl2br($this->clean($article->getChapo())); ?></strong></p>
		<p><?= nl2br($this->clean($article->getContent())); ?></p>
		<?= "<a class='btn btn-success' href='index.php?p=edit&id=" . $article->getId() . "'>Modifier</a>"; ?>
		<?= "<a class='btn btn-danger' href='index.php?p=delete&id=" . $article->getId() . "'>Supprimer</a>"; ?>
		<a class="btn btn-primary" href="index.php?p=list">Retour</a>
	</div>
</div>

