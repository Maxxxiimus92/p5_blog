<?php

    require 'database.php';

    $authorError = $titleError = $chapoError = $contentError = $author = $title = $chapo = $content = "";

    if(!empty($_POST))
    {
        $author = checkInput($_POST['author']);
        $title = checkInput($_POST['title']);
        $chapo = checkInput($_POST['chapo']);
        $content = checkInput($_POST['content']);
        $isSuccess = true;

		if(empty($author))
        {
            $authorError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($title))
        {
            $titleError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($chapo))
        {
            $chapoError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($content))
        {
            $contentError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if($isSuccess)
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO article (author, title, chapo, content, created_at, updated_at) values (?, ?, ?, ?, NOW(), NOW())");
            $statement->execute(array($author, $title, $chapo, $content));
            Database::disconnect();
            header("Location: list.php");
        }

    }

    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Projet Blog pour OpenClassrooms - Parcours développeur d'application - PHP / Symfony">
	<meta name="author" content="">

	<title>Projet Blog - Ajouter</title>

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
						<h1>Ajouter un Article</h1>
						<span class="subheading">Veuillez remplir les champs ci-dessous</span>
						<br>
					</div>
				</div>
			</div>
		</div>
    </header>

    <!-- Add Articles Page -->
	<div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 mx-auto">
                <form class="form" role="form" action="add.php" method="post">
                    <div class="form-group">
                        <label for="author">Auteur :</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Auteur" value="<?php echo $author; ?>">
                        <span class="help-inline"><?php echo $authorError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="title">Titre :</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titre" value="<?php echo $title; ?>">
                        <span class="help-inline"><?php echo $titleError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="chapo">Chapô :</label>
                        <textarea type="text" class="form-control" id="chapo" name="chapo" placeholder="Chapô de l'article" rows="8"><?php echo $chapo; ?></textarea>
                        <span class="help-inline"><?php echo $chapoError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="content">Contenu :</label>
                        <textarea type="text" class="form-control" id="content" name="content" placeholder="Contenu de l'article" rows="25"><?php echo $content; ?></textarea>
                        <span class="help-inline"><?php echo $contentError; ?></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Ajouter</button>
                        <a class="btn btn-primary" href="../index.html">Retour</a>
                    </div>
                </form>
            </div>
		</div>
	</div>

    <hr>

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