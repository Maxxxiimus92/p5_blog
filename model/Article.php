<?php

require_once 'model/Model.php';

class Article extends Model {

    public function getArticles()
    {
        $sql = 'SELECT id, title, chapo, DATE_FORMAT(created_at, "%d/%m/%Y à %H:%i") AS created, DATE_FORMAT(updated_at, "%d/%m/%Y à %H:%i") AS updated FROM article ORDER BY updated DESC, id DESC';
        $articles = $this->executeRequest($sql);
        return $articles;
    }

    public function getArticle($id)
    {
        $sql = 'SELECT id, title, author, chapo, content, DATE_FORMAT(created_at, "%d/%m/%Y à %H:%i") AS created, DATE_FORMAT(updated_at, "%d/%m/%Y à %H:%i") AS updated FROM article WHERE id = ?';
        $article = $this->executeRequest($sql, array($id));
        if($article->rowCount() == 1)
        {
            return $article->fetch();  // Accès à la première ligne de résultat
        }
        else
        {
            throw new Exception("Aucun article ne correspond à l'identifiant '$id'");
        }
    }

	public function addArticle($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v)
        {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(', ', $sql_parts);
        return $this->executeRequest("INSERT INTO article SET $sql_part, created_at = NOW(), updated_at = NOW()", $attributes);
    }

	public function editArticle($fields)
    {
        if(!empty($_POST['id']))
        {
            $id = $_POST['id'];
            $sql_parts = [];
            $attributes = [];
            foreach($fields as $k => $v)
            {
                $sql_parts[] = "$k = ?";
                $attributes[] = $v;
            }
            $sql_part = implode(', ', $sql_parts);
            return $this->executeRequest("UPDATE article SET $sql_part, updated_at = NOW() WHERE id = $id", $attributes);
        }
    }

    public function deleteArticle($id)
    {
		if(!empty($_POST['id']))
        {
            return $this->executeRequest("DELETE FROM article WHERE id = ?", [$id]);
        }
    }

}
