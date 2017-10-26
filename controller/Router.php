<?php

require_once 'controller/ArticleController.php';
require_once 'views/View.php';

class Router
{
    private $ctrlArticle;

    public function __construct()
    {
    $this->ctrlArticle = new ArticleController();
    }

    // Route une requête entrante
    public function routerRequest()
    {
        try
        {
            if(isset($_GET['p']))
            {
                if($_GET['p'] == 'list')
                {
                    $this->ctrlArticle->listArticles();
                }
                elseif($_GET['p'] == 'article')
                {
					$id = intval($this->getParam($_GET, 'id'));
					if($id != 0)
					{
						$this->ctrlArticle->article($id);
					}
					else
					{
						throw new Exception("Identifiant d'article non valide");
					}
                }
				elseif($_GET['p'] == 'add')
				{
                    $this->ctrlArticle->add();
				}
				elseif($_GET['p'] == 'edit' && !empty($_GET['id']))
				{
					$id = intval($this->getParam($_GET, 'id'));
					if($id != 0)
					{
						$this->ctrlArticle->edit($id);
					}
					else
					{
						throw new Exception("Identifiant d'article non valide");
					}
				}
				elseif($_GET['p'] == 'delete')
				{
					$id = intval($this->getParam($_GET, 'id'));
                    if($id != 0)
					{
						$this->ctrlArticle->delete($id);
					}
					else
					{
						throw new Exception("Identifiant d'article non valide");
					}
				}
				else
				{
					throw new Exception("Action non valide");
				}
            }
            else
            {
                $this->home(); // aucune action définie : affichage de l'accueil
            }
        }
        catch(Exception $e)
        {
            $this->error($e->getMessage());
        }
    }

    // Affiche page d'accueil
    private function home()
    {
        $view = new View("Home");
        $view->generate(array());
    }

    // Affiche une erreur
    private function error($msgError)
    {
        $view = new View("Error");
        $view->generate(array('msgError' => $msgError));
    }

	public function getParam($tableau, $nom)
	{
		if(isset($tableau[$nom]))
		{
			return $tableau[$nom];
		}
		else
		{
			throw new Exception("Paramètre '$nom' absent.");
		}
	}

}
