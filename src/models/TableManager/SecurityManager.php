<?php
namespace Dorian\Onightroof\Models\TableManager;

use Dorian\Onightroof\Models\Db;
use Dorian\Onightroof\Models\Table\Security;
use PDO;
use PDOException;

class SecurityManager extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(Security $security): void
    {
        try {
            $db = $this->getdb();
            
            $query = $db->prepare("INSERT INTO Temperature (idRental, heating,
            airConditioning, airFan) 
            VALUES (:idRental, :heating, :airConditioning, :airFan)");
            $query->bindValue(':idRental',$security->getIdRental());
            $query->bindValue(':smokeDetector',$security->getSmokeDetector());
            $query->bindValue(':carbonMonoxideDetector',$security->getCarbonMonoxydeDetector());
            $query->bindValue(':fireExtinguisher',$security->getFireExtinguisher());
            $query->bindValue(':safetyKit',$security->getSafetyKit());
            $query->execute();
        } catch (PDOException $e) {
            echo "Unable to insert values into the table 'Security': " . $e->getMessage();
            die();
        }
    }
}