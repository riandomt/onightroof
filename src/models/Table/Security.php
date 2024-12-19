<?php
namespace Dorian\Onightroof\Models\Table;

class Security
{
    private int $_idRental;
    private int $_smokeDetector;
    private int $_carbonMonoxydeDetector;
    private int $_fireExtinguisher;
    private int $_safetyKit;

    public function __construct(int $idRental,int $smokeDetector,
    int $carbonMonoxydeDetector, int $fireExtinguisher, int $safetyKit)
    {
        $this->hydrate([
            "idRental" => $idRental,
            "smokeDetector" => $smokeDetector,
            "carbonMonoxydeDetector" => $carbonMonoxydeDetector,
            "fireExtinguisher" => $fireExtinguisher,
            "safetyKit" => $safetyKit
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
     * Get the value of _smokeDetector
     */
    public function getSmokeDetector(): int
    {
        return $this->_smokeDetector;
    }

    /**
     * Set the value of _smokeDetector
     */
    public function setSmokeDetector(int $_smokeDetector): self
    {
        $this->_smokeDetector = $_smokeDetector;

        return $this;
    }

    /**
     * Get the value of _carbonMonoxydeDetector
     */
    public function getCarbonMonoxydeDetector(): int
    {
        return $this->_carbonMonoxydeDetector;
    }

    /**
     * Set the value of _carbonMonoxydeDetector
     */
    public function setCarbonMonoxydeDetector(int $_carbonMonoxydeDetector): self
    {
        $this->_carbonMonoxydeDetector = $_carbonMonoxydeDetector;

        return $this;
    }

    /**
     * Get the value of _fireExtinguisher
     */
    public function getFireExtinguisher(): int
    {
        return $this->_fireExtinguisher;
    }

    /**
     * Set the value of _fireExtinguisher
     */
    public function setFireExtinguisher(int $_fireExtinguisher): self
    {
        $this->_fireExtinguisher = $_fireExtinguisher;

        return $this;
    }

    /**
     * Get the value of _safetyKit
     */
    public function getSafetyKit(): int
    {
        return $this->_safetyKit;
    }

    /**
     * Set the value of _safetyKit
     */
    public function setSafetyKit(int $_safetyKit): self
    {
        $this->_safetyKit = $_safetyKit;

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