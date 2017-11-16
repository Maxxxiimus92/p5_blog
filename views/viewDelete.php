<?php $this->title = 'Projet Blog - Supprimer'; ?>

<?php $this->header = '<h3>Voulez-vous vraiment supprimer cet article ?</h3>'; ?>

<?php $this->subheader = '<span class="subheading">Pas de retour en arrière possible !</span>'; ?>

<?php $this->button = '<form class="form" role="form" action="index.php?p=delete&id=' . $article->getId() . '" method="post">
                                    <div class="form-actions">
                                        <input type="hidden" id="id" name="id" value="' . $article->getId() . '">
                                        <button type="submit" name="submit" class="btn btn-danger">Oui</button>
                                        <a class="btn btn-primary" href="index.php?p=article&id=' . $article->getId() .'">Non</a>
                                    </div>
                                </form>'; ?>

<!-- View Article -->
<div class="row">
	<div class="col-lg-12 col-md-12 mx-auto">
		<h1><?= $this->clean($article->getTitle()); ?></h1>
		<p><em>Ecrit par <?= $this->clean($article->getAuthor()); ?>, le <?= $article->getCreated(); ?>. Modifié le <?= $article->getUpdated(); ?>.</em></p>
		<p><strong><?= nl2br($this->clean($article->getChapo())); ?></strong></p>
		<p><?= nl2br($this->clean($article->getContent())); ?></p>
	</div>
</div>