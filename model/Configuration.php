<?php

class Configuration
{
    private static $parameters;

    // Renvoie la valeur d'un paramètre de configuration
    public static function get($name, $standardValue = null)
    {
        if (isset(self::getParameters()[$name]))
        {
            $value = self::getParameters()[$name];
        }
        else
        {
            $value = $standardValue;
        }
        return $value;
    }

    // Renvoie le tableau des paramètres en le chargeant au besoin
    private static function getParameters()
    {
        if (self::$parameters == null)
        {
            $configFile = "config/prod.ini";
            if (!file_exists($configFile))
            {
                $configFile = "config/dev.ini";
            }
            if (!file_exists($configFile))
            {
                throw new Exception("Aucun fichier de configuration trouvé");
            }
            else
            {
                self::$parameters = parse_ini_file($configFile);
            }
        }
        return self::$parameters;
    }
}
