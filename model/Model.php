<?php

require_once 'model/Configuration.php';

abstract class Model
{
    private static $db;

	private function getDb()
    {
        if(self::$db === null)
        {
            // Récupération des paramètres de configuration BD
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $pass = Configuration::get("pass");
            // Création de la connexion
            self::$db = new PDO($dsn, $login, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$db;
    }

	protected function executeRequest($sql, $params = null)
    {
        if ($params == null) {
            $result = $this->getDb()->query($sql); // exécution directe
        }
        else {
            $result = $this->getDb()->prepare($sql);  // requête préparée
            $result->execute($params);
        }
        return $result;
    }

}
