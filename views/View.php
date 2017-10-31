<?php

class View {

    // Nom du fichier associé à la vue
    private $file;

    // Titre de la vue (défini dans le fichier view)
    private $title;
    private $header;
    private $subheader;
    private $button;

    public function __construct($p)
    {
        // Détermination du nom du fichier vue à partir de l'action
        $this->file = "views/view" . $p . ".php";
    }

    // Génère et affiche la vue
    public function generate($datas)
    {
        // Génération de la partie spécifique de la vue
        $content = $this->generateFile($this->file, $datas);
        // Génération du gabarit commun utilisant la partie spécifique
        $view = $this->generateFile('views/layout.php',
        array(
            'title' => $this->title,
            'header' => $this->header,
            'subheader' => $this->subheader,
            'button' => $this->button,
            'content' => $content
          ));
        // Renvoi de la vue au navigateur
        echo $view;
    }

    // Génère un fichier vue et renvoie le résultat produit
    private function generateFile($file, $datas)
    {
        if (file_exists($file))
        {
            // Rend les éléments du tableau $datas accessibles dans la vue
            extract($datas);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $file;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else
        {
            throw new Exception("Fichier '$file' introuvable");
        }
    }

	private function clean($data)
	{
		return htmlspecialchars($data, ENT_QUOTES, 'UTF-8', false);
	}
}
