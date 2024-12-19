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
            
            // Correction du nom des paramètres : airConditionning -> airConditioning et airFran -> airFan
            $query = $db->prepare("INSERT INTO Temperature (idRental, heating, airConditioning, airFan) 
            VALUES (:idRental, :heating, :airConditioning, :airFan)");
            
            // Liaison des valeurs avec les paramètres correspondants
            $query->bindValue(':idRental', $temperature->getIdRental());
            $query->bindValue(':heating', $temperature->getHeating());
            $query->bindValue(':airConditioning', $temperature->getAirConditioning()); // correction du nom du paramètre
            $query->bindValue(':airFan', $temperature->getAirFan()); // correction du nom du paramètre
            $query->execute();
        } catch (PDOException $e) {
            echo "Unable to insert values into the table 'Temperature': " . $e->getMessage();
            die();
        }
    }
}
