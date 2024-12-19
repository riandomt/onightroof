<?php
namespace Dorian\Onightroof\Models\Table;

class Kitchen
{
    private int $_idRental;
    private int $_oven;
    private int $_microwaveOven;
    private int $_refrigerator;
    private int $_dinningTable;
    private int $_kitchenEquipment;

    public function __construct(int $idRental, int $oven,
    int $microwaveOven, int $refrigerator, int $dinningTable,
    int $kitchenEquipment) 
    {
        $this->hydrate([
            "idRental" => $idRental,
            "oven" => $oven,
            "microwaveOven" => $microwaveOven,
            "refrigerator" => $refrigerator,
            "dinningTable" => $dinningTable,
            "kitchenEquipment" => $kitchenEquipment,
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
     * Get the value of _oven
     */
    public function getOven(): int
    {
        return $this->_oven;
    }

    /**
     * Set the value of _oven
     */
    public function setOven(int $_oven): self
    {
        $this->_oven = $_oven;

        return $this;
    }

    /**
     * Get the value of _microwaveOven
     */
    public function getMicrowaveOven(): int
    {
        return $this->_microwaveOven;
    }

    /**
     * Set the value of _microwaveOven
     */
    public function setMicrowaveOven(int $_microwaveOven): self
    {
        $this->_microwaveOven = $_microwaveOven;

        return $this;
    }

    /**
     * Get the value of _refrigerator
     */
    public function getRefrigerator(): int
    {
        return $this->_refrigerator;
    }

    /**
     * Set the value of _refrigerator
     */
    public function setRefrigerator(int $_refrigerator): self
    {
        $this->_refrigerator = $_refrigerator;

        return $this;
    }

    /**
     * Get the value of _dinningTable
     */
    public function getDinningTable(): int
    {
        return $this->_dinningTable;
    }

    /**
     * Set the value of _dinningTable
     */
    public function setDinningTable(int $_dinningTable): self
    {
        $this->_dinningTable = $_dinningTable;

        return $this;
    }

    /**
     * Get the value of _kitchenEquipment
     */
    public function getKitchenEquipment(): int
    {
        return $this->_kitchenEquipment;
    }

    /**
     * Set the value of _kitchenEquipment
     */
    public function setKitchenEquipment(int $_kitchenEquipment): self
    {
        $this->_kitchenEquipment = $_kitchenEquipment;

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
