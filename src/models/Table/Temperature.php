<?php
namespace Dorian\Onightroof\Models\Table;

class Temperature 
{
    private int $_idRental;
    private int $_heating;
    private int $_airConditioning;
    private int $_airFan;

    public function __construct(int $idRental,int $heating,
    int $airConditioning, int $airFan)
    {
        $this->hydrate([
            "idRental" => $idRental,
            "heating" => $heating,
            "airConditioning" => $airConditioning,
            "airFan" => $airFan
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
     * Get the value of _heating
     */
    public function getHeating(): int
    {
        return $this->_heating;
    }

    /**
     * Set the value of _heating
     */
    public function setHeating(int $_heating): self
    {
        $this->_heating = $_heating;

        return $this;
    }

    /**
     * Get the value of _airConditioning
     */
    public function getAirConditioning(): int
    {
        return $this->_airConditioning;
    }

    /**
     * Set the value of _airConditioning
     */
    public function setAirConditioning(int $_airConditioning): self
    {
        $this->_airConditioning = $_airConditioning;

        return $this;
    }

    /**
     * Get the value of _airFan
     */
    public function getAirFan(): int
    {
        return $this->_airFan;
    }

    /**
     * Set the value of _airFan
     */
    public function setAirFan(int $_airFan): self
    {
        $this->_airFan = $_airFan;

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