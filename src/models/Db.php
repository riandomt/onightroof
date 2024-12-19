<?php 
namespace Dorian\Onightroof\Models;

use PDO;
use PDOException;

class Db {
    const HOST = 'localhost';
    const DBNAME = 'onightroof';
    const USER = 'root';
    const PASSWORD = '';

    private $db;

    public function __construct() {
        $this->db = $this->setDb();
    }

    public function getDb(): PDO { // Retourne un objet PDO ou null
        return $this->db;
    }

    private function setDb(): PDO { // Spécifie le type de retour comme PDO
        try {
            return new PDO('mysql:host=' . self::HOST . ';dbname=' . self::DBNAME, self::USER, self::PASSWORD, [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"
            ]);
        } catch(PDOException $e) {
            echo "Unable to connect to the Database : " . $e->getMessage();
            return null; // Retourne null en cas d'erreur
        }
    }
}
