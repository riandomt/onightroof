<?php
namespace Dorian\Onightroof\Models\Table;

class Rentals 
{
    private int $_idRental;
    private string $_rentalName;
    private string $_lblRental;
    private string $_city;
    private string $_zipCode;
    private string $_address;
    private string $_addressComplement;
    private string $_typeOfRental;
    private int $_capacity;
    private int $_bedroomNbr;
    private int $_singleBedNbr;
    private int $_doubleBedNbr;
    private int $_showerNbr;
    private int $_idUser;

    public function __construct(string $rentalName, string $lblRental, string $city, 
    string $zipCode, string $address, string $addressComplement,
    string $typeOfRental, int $capacity, int $bedroomNbr,int $singleBedNbr, int $doubleBedNbr, int $showerNbr, int $idUser) 
    {
        $this->hydrate([
            "rentalName" => $rentalName,
            "lblRental" => $lblRental,
            "city" => $city,
            "zipCode" => $zipCode,
            "address" => $address,
            "addressComplement" => $addressComplement,
            "typeOfRental" => $typeOfRental,
            "capacity" => $capacity,
            "bedroomNbr" =>$bedroomNbr,
            "singleBedNbr" => $singleBedNbr,
            "doubleBedNbr" => $doubleBedNbr,
            "showerNbr" => $showerNbr,
            "idUser" => $idUser
        ]);
    }

    /**
     * Get the value of _rentalName
     */
    public function getRentalName(): string
    {
        return $this->_rentalName;
    }

    /**
     * Set the value of _rentalName
     */
    public function setRentalName(string $_rentalName): self
    {
        $this->_rentalName = $_rentalName;

        return $this;
    }

    /**
     * Get the value of _lblRental
     */
    public function getLblRental(): string
    {
        return $this->_lblRental;
    }

    /**
     * Set the value of _lblRental
     */
    public function setLblRental(string $_lblRental): self
    {
        $this->_lblRental = $_lblRental;

        return $this;
    }

    /**
     * Get the value of _city
     */
    public function getCity(): string
    {
        return $this->_city;
    }

    /**
     * Set the value of _city
     */
    public function setCity(string $_city): self
    {
        $this->_city = $_city;

        return $this;
    }

    /**
     * Get the value of _zipCode
     */
    public function getZipCode(): string
    {
        return $this->_zipCode;
    }

    /**
     * Set the value of _zipCode
     */
    public function setZipCode(string $_zipCode): self
    {
        $this->_zipCode = $_zipCode;

        return $this;
    }

    /**
     * Get the value of _address
     */
    public function getAddress(): string
    {
        return $this->_address;
    }

    /**
     * Set the value of _address
     */
    public function setAddress(string $_address): self
    {
        $this->_address = $_address;

        return $this;
    }

    /**
     * Get the value of _addressComplement
     */
    public function getAddressComplement(): string
    {
        return $this->_addressComplement;
    }

    /**
     * Set the value of _addressComplement
     */
    public function setAddressComplement(string $_addressComplement): self
    {
        $this->_addressComplement = $_addressComplement;

        return $this;
    }

    /**
     * Get the value of _typeOfRental
     */
    public function getTypeOfRental(): string
    {
        return $this->_typeOfRental;
    }

    /**
     * Set the value of _typeOfRental
     */
    public function setTypeOfRental(string $_typeOfRental): self
    {
        $this->_typeOfRental = $_typeOfRental;

        return $this;
    }

    /**
     * Get the value of _capacity
     */
    public function getCapacity(): int
    {
        return $this->_capacity;
    }

    /**
     * Set the value of _capacity
     */
    public function setCapacity(int $_capacity): self
    {
        $this->_capacity = $_capacity;

        return $this;
    }

    /**
     * Get the value of _bedroomNbr
     */
    public function getBedroomNbr(): int
    {
        return $this->_bedroomNbr;
    }

    /**
     * Set the value of _bedroomNbr
     */
    public function setBedroomNbr(int $_bedroomNbr): self
    {
        $this->_bedroomNbr = $_bedroomNbr;

        return $this;
    }

    /**
     * Get the value of _singleBedNbr
     */
    public function getSingleBedNbr(): int
    {
        return $this->_singleBedNbr;
    }

    /**
     * Set the value of _singleBedNbr
     */
    public function setSingleBedNbr(int $_singleBedNbr): self
    {
        $this->_singleBedNbr = $_singleBedNbr;

        return $this;
    }

    /**
     * Get the value of _doubleBedNbr
     */
    public function getDoubleBedNbr(): int
    {
        return $this->_doubleBedNbr;
    }

    /**
     * Set the value of _doubleBedNbr
     */
    public function setDoubleBedNbr(int $_doubleBedNbr): self
    {
        $this->_doubleBedNbr = $_doubleBedNbr;

        return $this;
    }

    /**
     * Get the value of _showerNbr
     */
    public function getShowerNbr(): int
    {
        return $this->_showerNbr;
    }

    /**
     * Set the value of _showerNbr
     */
    public function setShowerNbr(int $_showerNbr): self
    {
        $this->_showerNbr = $_showerNbr;

        return $this;
    }

    /**
     * Get the value of _idUser
     */
    public function getIdUser(): int
    {
        return $this->_idUser;
    }

    /**
     * Set the value of _idUser
     */
    public function setIdUser(int $_idUser): self
    {
        $this->_idUser = $_idUser;

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
