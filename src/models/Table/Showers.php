<?php
namespace Dorian\Onightroof\Models\Table;

class Showers
{
    private int $_idRental;
    private int $_towel;
    private int $_soap;
    private int $_hairDryer;
    private int $_dryer;
    private int $_washingMachine;

    public function __construct($idRental, $towel, $soap, $hairDryer, $dryer, $washingMachine)
    {
        $this->hydrate([
            "idRental" => $idRental,
            "towel" => $towel,
            "soap" => $soap,
            "hairDryer" => $hairDryer,
            "dryer" => $dryer,
            "washingMachine" => $washingMachine
        ]);
    }
    public function getIdRental(): int
    {
        return $this->_idRental;
    }

    public function getTowel(): int
    {
        return $this->_towel;
    }

    public function getSoap(): int
    {
        return $this->_soap;
    }

    public function getHairDryer(): int
    {
        return $this->_hairDryer;
    }

    public function getDryer(): int
    {
        return $this->_dryer;
    }

    public function getWashingMachine(): int
    {
        return $this->_washingMachine;
    }

    public function setIdRental($idRental): void
    {
        $this->_idRental = $idRental;
    }

    public function setTowel($towel): void
    {
        $this->_towel = $towel;
    }

    public function setSoap($soap): void
    {
        $this->_soap = $soap;
    }
    public function setHairDryer($hairDryer): void
    {
        $this->_hairDryer = $hairDryer;
    }

    public function setDryer($dryer): void
    {
        $this->_dryer = $dryer;
    }

    public function setWashingMachine($washingMachine): void
    {
        $this->_washingMachine = $washingMachine;
    }


    public function hydrate(array $donnees): void
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . $key;
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
