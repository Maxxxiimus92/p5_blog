<?php $this->title = 'Projet Blog - Ajouter'; ?>

<?php $this->header = '<h1>Ajouter un Article</h1>'; ?>

<?php $this->subheader = '<span class="subheading">Veuillez remplir les champs ci-dessous</span>'; ?>

<!-- Add Articles Form -->
<div class="row">
	<div class="col-lg-10 col-md-10 mx-auto">
		<form class="form" role="form" action="index.php?p=add" method="post">
			<div class="form-group">
				<label for="author">Auteur :</label>
				<input type="text" class="form-control" id="author" name="author" placeholder="Auteur" required>
			</div>
			<div class="form-group">
				<label for="title">Titre :</label>
				<input type="text" class="form-control" id="title" name="title" placeholder="Titre" required>
			</div>
			<div class="form-group">
				<label for="chapo">Chapô :</label>
				<textarea type="text" class="form-control" id="chapo" name="chapo" placeholder="Chapô de l'article" rows="8" required></textarea>
			</div>
			<div class="form-group">
				<label for="content">Contenu :</label>
				<textarea type="text" class="form-control" id="content" name="content" placeholder="Contenu de l'article" rows="25" required></textarea>
			</div>
			<br>
			<div class="form-actions">
				<button type="submit" name="add" class="btn btn-success">Ajouter</button>
				<a class="btn btn-primary" href="index.php?p=list">Retour</a>
			</div>
		</form>
	</div>
</div>
