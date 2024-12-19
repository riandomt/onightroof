<?php
namespace Dorian\Onightroof\Models\TableManager;

use Dorian\Onightroof\Models\Db;
use Dorian\Onightroof\Models\Table\Rentals;
use PDO;
use PDOException;



class RentalsManager extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(Rentals $rental): int
    {
        try {
            $db = $this->getdb();

            $query = $db->prepare("INSERT INTO Rentals (rentalName, lblRental, city, zipCode,
            address, addressComplement, typeOfRental, capacity, bedroomNbr, singleBedNbr,
            doubleBedNbr, showerNbr, idUser) VALUES (:rentalName, :lblRental, :city, :zipCode,
            :address, :addressComplement, :typeOfRental, :capacity, :bedroomNbr,
            :singleBedNbr, :doubleBedNbr, :showerNbr, :idUser)");
            
            $query->bindValue(":rentalName", $rental->getRentalName(), PDO::PARAM_STR);
            $query->bindValue(":lblRental", $rental->getLblRental(), PDO::PARAM_STR);
            $query->bindValue(":city", $rental->getCity(), PDO::PARAM_STR);
            $query->bindValue(":zipCode", $rental->getZipCode(), PDO::PARAM_STR);
            $query->bindValue(":address", $rental->getAddress(), PDO::PARAM_STR);
            $query->bindValue(":addressComplement", $rental->getAddressComplement(), PDO::PARAM_STR);
            $query->bindValue(":typeOfRental", $rental->getTypeOfRental(), PDO::PARAM_STR);
            $query->bindValue(":capacity", $rental->getCapacity(), PDO::PARAM_INT);
            $query->bindValue(":bedroomNbr", $rental->getBedroomNbr(), PDO::PARAM_INT);
            $query->bindValue(":singleBedNbr", $rental->getSingleBedNbr(), PDO::PARAM_INT);
            $query->bindValue(":doubleBedNbr", $rental->getDoubleBedNbr(), PDO::PARAM_INT);
            $query->bindValue(":showerNbr", $rental->getShowerNbr(), PDO::PARAM_INT);
            $query->bindValue(":idUser", $rental->getIdUser(), PDO::PARAM_INT);

            $query->execute();
            
            return $db->lastInsertId();

        } catch (PDOException $e) {
            echo "Unable to insert values into the table 'Rentals': " . $e->getMessage();
            die();
        }
    }

    public function delete(int $idRental): void
    {
        try {
            $db = $this->getdb();

            $query = $db->prepare("DELETE FROM Rentals WHERE idRental = :idRental");
            $query->bindValue(':idRental', $idRental, PDO::PARAM_INT);
            $query->execute();
        } catch(PDOException $e) {
            echo "Unable to delete the user in the table 'Users': " . $e->getMessage();
        }
    }

}