<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Projet Blog pour OpenClassrooms - Parcours développeur d'application - PHP / Symfony">
	<meta name="author" content="">

	<title>Projet Blog - Articles</title>

	<!-- Bootstrap core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

	<!-- Custom styles for this template -->
	<link href="../css/clean-blog.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
		<a class="navbar-brand" href="../index.html">Projet Blog</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		  Menu
			<i class="fa fa-bars"></i>
		</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="../index.html">Accueil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="list.php">Articles</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="add.php">Ajouter</a>
					</li>
				</ul>
			</div>
		</div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../img/computer.jpg')">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-md-10 mx-auto">
					<div class="site-heading">
						<h1>Liste des Articles</h1>
						<span class="subheading">Cliquez sur un titre pour voir son contenu et/ou le modifier</span>
						<br>
						<a href="add.php" class="btn btn-secondary">Ajouter un article</a>
					</div>
				</div>
			</div>
		</div>
    </header>

    <!-- Articles list -->
	<div class="container">
		<?php
		require "database.php";
		$db = Database::connect();
		$statement = $db->query('SELECT id, title, chapo, DATE_FORMAT(created_at, "%d/%m/%Y à %H:%i") AS created, DATE_FORMAT(updated_at, "%d/%m/%Y à %H:%i") AS updated FROM article ORDER BY updated DESC, id DESC');

		while($article = $statement->fetch())
		{
			echo "<div class='row'>";
            echo "<div class='col-lg-10 col-md-10 mx-auto'>";
			echo "<a href='view.php?id=" . $article["id"] . "'><h2>" . $article["title"] . "</h2></a>";
			echo "<p>" . nl2br($article["chapo"]) . "</p>";
			echo "<p>Créé le " . $article["created"] . ". Modifié le " . $article["updated"] . "</p>";
			echo "</div>";
            echo "</div>";
            echo "<hr>";
		}

		Database::disconnect();

		?>
	</div>

    <!-- Footer -->
    <footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-md-10 mx-auto">
					<ul class="list-inline text-center">
						<li class="list-inline-item">
							<a href="https://www.twitter.com/Maxxximus92" target="_blank">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="https://www.linkedin.com/in/ulrichhuet" target="_blank">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="https://www.github.com/Maxxxiimus92/p5_blog" target="_blank">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-github fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
					</ul>
					<p class="copyright text-muted">Copyright &copy; Projet Blog 2017</p>
				</div>
			</div>
		</div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

	<!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/clean-blog.min.js"></script>

</body>

</html>
