<?php
namespace Dorian\Onightroof\Models\TableManager;

use Dorian\Onightroof\Models\Db;
use Dorian\Onightroof\Models\Table\Kitchen;
use PDO;
use PDOException;

class KitchenManager extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(Kitchen $kitchen): void
    {
        try {
            $db = $this->getdb();
            
            $query = $db->prepare("INSERT INTO kitchen (idRental, oven, microwaveOven, refrigerator, 
            diningTable, kitchenEquipment) VALUES (:idRental, :oven, :microwaveOven, :refrigerator,
             :diningTable, :kitchenEquipment)");
            $query->bindValue(':idRental',$kitchen->getIdRental());
            $query->bindValue(':oven',$kitchen->getOven());
            $query->bindValue(':microwaveOven',$kitchen->getMicrowaveOven());
            $query->bindValue(':refrigerator',$kitchen->getRefrigerator());
            $query->bindValue(':diningTable',$kitchen->getDinningTable());
            $query->bindValue(':kitchenEquipment',$kitchen->getKitchenEquipment());
            $query->execute();
        } catch (PDOException $e) {
            echo "Unable to insert values into the table 'Kitchen': " . $e->getMessage();
            die();
        }
    }
}