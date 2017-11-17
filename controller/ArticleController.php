<?php

require_once 'model/ArticleManager.php';
require_once 'views/View.php';

class ArticleController
{
    private $manager;

    public function __construct()
    {
        $this->manager = new ArticleManager();
    }
    
    // Afficher tous les articles
    public function listArticles()
    {
        $articles = $this->manager->getArticles();
        $view = new View("List");
        $view->generate(array('articles' => $articles));
    }

    // Afficher les détails d'un article
    public function article($id)
    {
        $article = $this->manager->getArticle($id);
        $view = new View("Article");
        $view->generate(array('article' => $article));
    }
    
    // Ajouter un article
    public function add()
    {
        $result = $this->manager->addArticle();
        if($result)
        {
            header('Location: index.php?p=list');
        }
        $view = new View("Add");
        $view->generate(array());
    }
    
    // Modifier un article
    public function edit($id)
    {
        $article = $this->manager->getArticle($id);
        $result = $this->manager->editArticle();
        if($result)
        {
            header('Location: index.php?p=article&id=' . $article->getId());
        }
        $view = new View("Edit");
        $view->generate(array('article' => $article));
    }
    
    // Supprimer un article
    public function delete($id)
    {
        $article = $this->manager->getArticle($id);
        $result = $this->manager->deleteArticle();
        if($result)
        {
            header('Location: index.php?p=list');
        }
        $view = new View("Delete");
        $view->generate(array('article' => $article));
    }
    
}
