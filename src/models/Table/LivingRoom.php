<?php
namespace Dorian\Onightroof\Models\Table;

class LivingRoom
{
    private int $_idRental;
    private int $_sofa;
    private int $_tv;
    private int $_wifi;

    public function __construct(int $idRental, int $sofa,
    int $tv, int $wifi)
    {
        $this->hydrate([
            "idRental" => $idRental,
            "sofa" => $sofa,
            "tv" => $tv,
            "wifi" => $wifi
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
     * Get the value of _sofa
     */
    public function getSofa(): int
    {
        return $this->_sofa;
    }

    /**
     * Set the value of _sofa
     */
    public function setSofa(int $_sofa): self
    {
        $this->_sofa = $_sofa;

        return $this;
    }

    /**
     * Get the value of _tv
     */
    public function getTv(): int
    {
        return $this->_tv;
    }

    /**
     * Set the value of _tv
     */
    public function setTv(int $_tv): self
    {
        $this->_tv = $_tv;

        return $this;
    }

    /**
     * Get the value of _wifi
     */
    public function getWifi(): int
    {
        return $this->_wifi;
    }

    /**
     * Set the value of _wifi
     */
    public function setWifi(int $_wifi): self
    {
        $this->_wifi = $_wifi;

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