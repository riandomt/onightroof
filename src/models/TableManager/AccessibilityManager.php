<?php
namespace Dorian\Onightroof\Models\TableManager;

use Dorian\Onightroof\Models\Db;
use Dorian\Onightroof\Models\Table\Accessibility;
use PDO;
use PDOException;

class AccessibilityManager extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(Accessibility $accessibility): void
    {
        try {
            $db = $this->getdb();
            
            $query = $db->prepare("INSERT INTO Accessibility (nbrOfParkingSpace, singleStorey) 
            VALUES (:nbrOfParkingSpace, :singleStorey)");
            $query->bindValue(':idRental',$accessibility->getIdRental());
            $query->bindValue(':nbrOfParkingSpace',$accessibility->getNbrOfParkingSpaces());
            $query->bindValue(':singleStorey',$accessibility->getSingleStorey());

            $query->execute();
        } catch (PDOException $e) {
            echo "Unable to insert values into the table 'Accessibility': " . $e->getMessage();
            die();
        }
    }
}