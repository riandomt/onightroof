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
            
            $query = $db->prepare("INSERT INTO Accessibility (idRental, nbrOfParkingSpaces, singleStorey) 
            VALUES (:idRental, :nbrOfParkingSpaces, :singleStorey)");
            $query->bindValue(':idRental',$accessibility->getIdRental());
            $query->bindValue(':nbrOfParkingSpaces',$accessibility->getNbrOfParkingSpaces());
            $query->bindValue(':singleStorey',$accessibility->getSingleStorey());

            $query->execute();
        } catch (PDOException $e) {
            echo "Unable to insert values into the table 'Accessibility': " . $e->getMessage();
            die();
        }
    }
}