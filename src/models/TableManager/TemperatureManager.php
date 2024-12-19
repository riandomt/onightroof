<?php
namespace Dorian\Onightroof\Models\TableManager;

use Dorian\Onightroof\Models\Db;
use Dorian\Onightroof\Models\Table\Temperature;
use PDO;
use PDOException;


class TemperatureManager extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(Temperature $temperature): void
    {
        try {
            $db = $this->getdb();
            
            $query = $db->prepare("INSERT INTO Temperature (idRental, heating,
            airConditioning, airFan) 
            VALUES (:idRental, :heating, :airConditioning, :airFan)");
            $query->bindValue(':idRental',$temperature->getIdRental());
            $query->bindValue(':oven',$temperature->getHeating());
            $query->bindValue(':microwaveOven',$temperature->getAirConditioning());
            $query->bindValue(':refrigerator',$temperature->getAirFan());
            $query->execute();
        } catch (PDOException $e) {
            echo "Unable to insert values into the table 'Living Room': " . $e->getMessage();
            die();
        }
    }
}