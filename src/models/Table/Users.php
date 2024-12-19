<?php
namespace Dorian\Onightroof\Models\Table;

class Users
{
    private string $_lastname;
    private string $_firstname;
    private string $_birthday;
    private string $_gender;
    private string $_email;
    private string $_phoneNbr;
    private string $_passcode;
    

    public function __construct(string $lastname,string $firstname,
    string $birthday, string $gender, string $email, string $phoneNbr,
    string $passcode
    ) {
        $this->hydrate([
            'lastname' => $lastname,
            'firstname' => $firstname,
            'birthday' => $birthday,
            'gender' => $gender,
            'email' => $email,
            'passcode' => $passcode,
            'phoneNbr' => $phoneNbr
        ]);
    }

    public function getLastname(): string
    {
        return $this->_lastname;
    }

    public function getFirstname(): string
    {
        return $this->_firstname;
    }

    public function getBirthday(): string
    {
        return $this->_birthday;
    }

    public function getGender(): string
    {
        return $this->_gender;
    }

    public function getEmail(): string
    {
        return $this->_email;
    }

    public function getPasscode(): string
    {
        return $this->_passcode;
    }

    public function getPhoneNbr(): string
    {
        return $this->_phoneNbr;
    }

    public function setLastname(string $lastname): void
    {
        $this->_lastname = $lastname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->_firstname = $firstname;
    }

    public function setBirthday(string $birthday): void
    {
        $this->_birthday = $birthday;
    }

    public function setGender(string $gender): void
    {
        $this->_gender = $gender;
    }

    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }

    public function setPasscode(string $passcode): void
    {
        $this->_passcode = $passcode;
    }

    public function setPhoneNbr(string $phoneNbr): void
    {
        $this->_phoneNbr = $phoneNbr;
    }


    public function hydrate(array $data): void
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.$key;
            if(method_exists($this,$method))
            {
                $this->$method($value);
            }
        }
    }
}
