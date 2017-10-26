<?php $this->title = 'Projet Blog - Modifier'; ?>

<?php $this->header = '<h1>Modifier un Article</h1>'; ?>

<?php $this->subheader = '<span class="subheading">Vous pouvez modifier les champs ci-dessous</span>'; ?>

<!-- Update Page -->
<div class="row">
	<div class="col-lg-10 col-md-10 mx-auto">
		<form class="form" role="form" action="index.php?p=edit&id=<?= $_GET['id']; ?>" method="post">
			<div class="form-group">
				<label for="author">Auteur :</label>
				<input type="text" class="form-control" id="author" name="author" placeholder="Auteur" value="<?= $article['author']; ?>" required>
			</div>
			<div class="form-group">
				<label for="title">Titre :</label>
				<input type="text" class="form-control" id="title" name="title" placeholder="Titre" value="<?= $article['title']; ?>" required>
			</div>
			<div class="form-group">
				<label for="chapo">Chapô :</label>
				<textarea type="text" class="form-control" id="chapo" name="chapo" placeholder="Chapô de l'article" rows="8" required><?= $article['chapo']; ?></textarea>
			</div>
			<div class="form-group">
				<label for="content">Contenu :</label>
				<textarea type="text" class="form-control" id="content" name="content" placeholder="Contenu de l'article" rows="25" required><?= $article['content']; ?></textarea>
			</div>
			<br>
			<div class="form-actions">
			    <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>">
				<button type="submit" name="edit" class="btn btn-success">Modifier</button>
                <a class="btn btn-primary" href="index.php?p=list">Retour</a>
			</div>
		</form>
	</div>
</div>
