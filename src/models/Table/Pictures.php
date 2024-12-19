<?php
namespace Dorian\Onightroof\Models\Table;

class Pictures
{
    private string $_picturePath;
    private int $_idRental;

    public function __construct(string $picturePath, int $idRental)
    {
        $this->hydrate([
            "picturePath" => $picturePath,
            "idRental" => $idRental
        ]);
    }

    /**
     * Get the value of _picturePath
     */
    public function getPicturePath(): string
    {
        return $this->_picturePath;
    }

    /**
     * Set the value of _picturePath
     */
    public function setPicturePath(string $_picturePath): self
    {
        $this->_picturePath = $_picturePath;

        return $this;
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