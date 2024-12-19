<?php
namespace Dorian\Onightroof\Models\TableManager;

use Dorian\Onightroof\Models\Db;
use Dorian\Onightroof\Models\Table\Pictures;
use PDO;
use PDOException;


class PicturesManager extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(Pictures $picture): void
    {
        try {
            $db = $this->getdb();
            
            $query = $db->prepare("INSERT INTO Accessibility (picturePath, pictureLbl, idRental) 
            VALUES (:picturePath, 'image principale de l'annonce', :idRental)");
            $query->bindValue(':nbrOfParkingSpace',$picture->getPicturePath());
            $query->bindValue(':idRental',$picture->getIdRental());

            $query->execute();
        } catch (PDOException $e) {
            echo "Unable to insert values into the table 'Accessibility': " . $e->getMessage();
            die();
        }
    }
}