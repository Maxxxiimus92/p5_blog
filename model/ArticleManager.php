<?php

require_once 'model/Article.php';
require_once 'model/Configuration.php';

class ArticleManager
{
    private static $db;
    
    private function getDb()
    {
        if(self::$db === null)
        {
            // Récupération des paramètres de configuration de la base de données
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $pass = Configuration::get("pass");
            // Création de la connexion
            self::$db = new PDO($dsn, $login, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$db;
    }
    
    public function getArticles()
    {
        $articles = [];
        $request = $this->getDb()->query('SELECT id, title, chapo, DATE_FORMAT(created_at, "%d/%m/%Y à %Hh%i") AS created, DATE_FORMAT(updated_at, "%d/%m/%Y à %Hh%i") AS updated FROM article ORDER BY updated DESC, id DESC');
        while ($datas = $request->fetch(PDO::FETCH_ASSOC))
        {
            $articles[] = new Article($datas);
        }
        $request->closeCursor();
        return $articles;
    }
    
    public function getArticle($id)
    {
        if ($this->exist($id))
        {
            $request = $this->getDb()->prepare('SELECT id, title, author, chapo, content, DATE_FORMAT(created_at, "%d/%m/%Y à %Hh%i") AS created, DATE_FORMAT(updated_at, "%d/%m/%Y à %Hh%i") AS updated FROM article WHERE id = ?');
            $request->execute(array($id));
            $article = new Article($request->fetch(PDO::FETCH_ASSOC));
            return $article;
        }
        else
        {
            throw new Exception("Aucun article ne correspond à l'identifiant '$id'");
        }
    }
    
    public function addArticle()
    {
        if (!empty($_POST))
        {
            $datas['author'] = $_POST['author'];
            $datas['title'] = $_POST['title'];
            $datas['chapo'] = $_POST['chapo'];
            $datas['content'] = $_POST['content'];
            
            $article = new Article($datas);
            
            $stmt = $this->getDb()->prepare('INSERT INTO article (title, chapo, content, author, created_at, updated_at) VALUES (:title, :chapo, :content, :author, NOW(), NOW())');
            $stmt->bindValue(':title', $article->getTitle());
            $stmt->bindValue(':chapo', $article->getChapo());
            $stmt->bindValue(':content', $article->getContent());
            $stmt->bindValue(':author', $article->getAuthor());
            $stmt->execute();
            $stmt->closeCursor();
            return $stmt;
        }
        
    }
    
    public function editArticle()
    {
        if (!empty($_POST))
        {
            $datas['id'] = $_POST['id'];
            $datas['author'] = $_POST['author'];
            $datas['title'] = $_POST['title'];
            $datas['chapo'] = $_POST['chapo'];
            $datas['content'] = $_POST['content'];
            
            $article = new Article($datas);

            $stmt = $this->getDb()->prepare('UPDATE article SET title= :title, chapo= :chapo, content= :content, author= :author, updated_at= NOW() WHERE id = :id');
            $stmt->bindValue(':id', $article->getId());
            $stmt->bindValue(':title', $article->getTitle());
            $stmt->bindValue(':chapo', $article->getChapo());
            $stmt->bindValue(':content', $article->getContent());
            $stmt->bindValue(':author', $article->getAuthor());
            $stmt->execute();
            $stmt->closeCursor();
            return $stmt;
        }
    }
    
    public function deleteArticle()
    {
        if(!empty($_POST['id']))
        {
            $id = $_POST['id'];
            $stmt = $this->getDb()->prepare('DELETE FROM article WHERE id= :id');
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $stmt->closeCursor();
            return true;
        }
    }
    
    public function exist($id)
    {
        $stmt = $this->getDb()->prepare('SELECT title FROM article WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    
}
