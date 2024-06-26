<?php
namespace App\DbConnection;
use PDO;
use PDOException;

final class Db
{
  
    private $DB;
    private $config;
  
    public function __construct()
    {
      $this->config = __DIR__ . '/../../config/database.php';
      require_once $this->config;
  
      try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        $this->DB = new PDO($dsn, DB_USER, DB_PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      } catch (PDOException $error) {
        echo "Erreur de connexion à la Base de Données : " . $error->getMessage();
      }
    }
  
    /**
     * Retourne la connexion BDD établie et l'objet PDO associé.
     */
    public function getDB(): PDO
    {
      return $this->DB;
    }
  }