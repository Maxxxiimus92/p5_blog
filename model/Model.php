<?php

abstract class Model
{
	private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $db;

	// Here you can modify your database connexion
	public function __construct($db_name = 'projet_blog', $db_user = 'root', $db_pass = '', $db_host = 'localhost'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

	private function getDb()
    {
        if($this->db === null)
        {
            $this->db = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass, array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
			$this->db;
        }
        return $this->db;
    }

	protected function executeRequest($sql, $params = null)
    {
        if ($params == null) {
            $resultat = $this->getDb()->query($sql); // exécution directe
        }
        else {
            $resultat = $this->getDb()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

}
