<?php
namespace Dorian\Onightroof\Models\TableManager;

use Dorian\Onightroof\Models\Db;
use Dorian\Onightroof\Models\Table\Showers;
use PDO;
use PDOException;

class ShowersManager extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(Showers $shower): void
    {
        try {
            $db = $this->getdb();
            
            $query = $db->prepare("INSERT INTO showers(idRental, towel, soap, hairDryer, dryer, washingMachine) 
            VALUES (:idRental, :towel, :soap, :hairDryer, :dryer, :washingMachine)");
            $query->bindValue(':idRental',$shower->getIdRental());
            $query->bindValue(':towel',$shower->getTowel());
            $query->bindValue(':soap',$shower->getSoap());
            $query->bindValue(':hairDryer',$shower->getHairDryer());
            $query->bindValue(':dryer',$shower->getDryer());
            $query->bindValue(':washingMachine',$shower->getWashingMachine());
            $query->execute();
        } catch (PDOException $e) {
            echo "Unable to insert values into the table 'Showers': " . $e->getMessage();
            die();
        }
    }
}