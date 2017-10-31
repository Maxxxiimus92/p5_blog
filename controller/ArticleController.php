<?php

require_once 'model/Article.php';
require_once 'views/View.php';

class ArticleController
{
    private $article;

    public function __construct()
    {
        $this->article = new Article();
    }

	// Afficher tous les articles
	public function listArticles()
    {
        $articles = $this->article->getArticles();
        $view = new View("List");
        $view->generate(array('articles' => $articles));
    }

    // Afficher les détails d'un article
    public function article($id)
    {
        $article = $this->article->getArticle($id);
        $view = new View("Article");
        $view->generate(array('article' => $article));
    }

	// Ajouter un article
	public function add(){
        if (!empty($_POST))
        {
            $result = $this->article->addArticle([
                'author' => $_POST['author'],
				'title' => $_POST['title'],
				'chapo' => $_POST['chapo'],
                'content' => $_POST['content']
            ]);
            if($result)
            {
                return $this->listArticles();
            }
        }
        $view = new View("Add");
		$view->generate(array());
    }

	// Modifier un article
	public function edit()
	{
        $article = $this->article->getArticle($_GET['id']);
		if (!empty($_POST))
        {
            $result = $this->article->editArticle([
                'author' => $_POST['author'],
				'title' => $_POST['title'],
				'chapo' => $_POST['chapo'],
                'content' => $_POST['content']
            ]);
            if($result)
            {
                return $this->listArticles();
            }
        }
        $view = new View("Edit");
        $view->generate(array('article' => $article));
	}

	// Supprimer un article
	public function delete()
	{
        $id = $this->article->getArticle($_GET['id']);
		if (!empty($_GET['id']))
        {
            $result = $this->article->deleteArticle($_GET['id']);
            if($result)
            {
                return $this->listArticles();
            }
        }
        $view = new View("Delete");
        $view->generate(array());
	}

}
