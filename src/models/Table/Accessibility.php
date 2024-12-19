<?php 
namespace Dorian\Onightroof\Models\Table;

class Accessibility
{
    private int $_idRental;
    private int $_nbrOfParkingSpaces;
    private int $_singleStorey;

    public function __construct(int $idRental, int $nbrOfParkingSpaces, 
    int $singleStorey)
    {
        $this->hydrate([
            "idRental" => $idRental,
            "nbrOfParkingSpaces" => $nbrOfParkingSpaces,
            "singleStorey" => $singleStorey
        ]);
    }

    /**
     * Get the value of _idRental
     */
    public function getIdRental(): int
    {
        return $this->_idRental;
    }

    /**
     * Set the value of _idRental
     */
    public function setIdRental(int $_idRental): self
    {
        $this->_idRental = $_idRental;

        return $this;
    }

    /**
     * Get the value of _nbrOfParkingSpaces
     */
    public function getnbrOfParkingSpaces(): int
    {
        return $this->_nbrOfParkingSpaces;
    }

    /**
     * Set the value of _nbrOfParkingSpaces
     */
    public function setnbrOfParkingSpaces(int $_nbrOfParkingSpaces): self
    {
        $this->_nbrOfParkingSpaces = $_nbrOfParkingSpaces;

        return $this;
    }

    /**
     * Get the value of _singleStorey
     */
    public function getSingleStorey(): int
    {
        return $this->_singleStorey;
    }

    /**
     * Set the value of _singleStorey
     */
    public function setSingleStorey(int $_singleStorey): self
    {
        $this->_singleStorey = $_singleStorey;

        return $this;
    }

    public function hydrate(array $data): void
    {
        foreach($data as $key => $value) {
            $method = 'set'.$key;
            if(method_exists($this,$method)) {
                $this->$method($value);
            }
        }
    }
}