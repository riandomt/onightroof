<?php

namespace Dorian\Onightroof\Models\TableManager;

use Dorian\Onightroof\Models\Db;
use Dorian\Onightroof\Models\Table\LivingRoom;
use PDO;
use PDOException;

class LivingRoomManager extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(LivingRoom $livingRoom): void
    {
        try {
            $db = $this->getdb();

            $query = $db->prepare("INSERT INTO LivingRoom (idRental, sofa, tv, wifi)
            VALUES (:idRental, :sofa, :tv, :wifi)");

            $query->bindValue(':idRental', $livingRoom->getIdRental(), PDO::PARAM_INT);
            $query->bindValue(':sofa', $livingRoom->getSofa(), PDO::PARAM_INT);
            $query->bindValue(':tv', $livingRoom->getTv(), PDO::PARAM_INT);
            $query->bindValue(':wifi', $livingRoom->getWifi(), PDO::PARAM_INT);

            $query->execute();
            
        } catch (PDOException $e) {
            echo "Unable to insert values into the table 'Living Room': " . $e->getMessage();
            die();
        }
    }
}
