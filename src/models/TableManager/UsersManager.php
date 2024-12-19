<?php
namespace Dorian\Onightroof\Models\TableManager;

use Dorian\Onightroof\Models\Db;
use Dorian\Onightroof\Models\Table\Users;
use PDO;
use PDOException;

class UsersManager extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(Users $user): void
    {
        try {
            $db = $this->getdb();
    
            $query = $db->prepare('INSERT INTO Users (lastname, firstname, birthday, gender,
             email, passcode,phoneNbr) VALUES (:lastname, :firstname, :birthday, :gender, 
             :email, :passcode,:phoneNbr)');
    
            $query->bindValue(':lastname', $user->getLastname());
            $query->bindValue(':firstname', $user->getFirstname());
            $query->bindValue(':birthday', $user->getBirthday());
            $query->bindValue(':gender', $user->getGender());
            $query->bindValue(':email', $user->getEmail());
            $query->bindValue(':passcode', $user->getPasscode());
            $query->bindValue(':phoneNbr', $user->getPhoneNbr());
    
            $query->execute();
        } catch (PDOException $e) {
            echo "Unable to insert values into the table 'Users': " . $e->getMessage();
            die();
        }
    }
    

    public function update(int $idUser): void
    {
        try {
            $db = $this->getDb();
            $condition = '';
            if (!empty($values)) {
                foreach ($values as $key => $value) {
                    $condition .= $key . ' = :' . $key . ', ';
                }
                $condition = rtrim($condition, ', ');

                $query = $db->prepare('UPDATE Users SET ' . $condition . ' WHERE idUser = :idUser');
                foreach ($values as $key => $value) {
                    $query->bindValue(':' . $key, $value);
                }
                $query->bindValue(':idUser', $idUser);
                $query->execute();
            } else {
                throw new PDOException('The array must contain at least one value');
            }
        } catch (PDOException $e) {
            echo "Unable to update value(s) in the table 'Users': " . $e->getMessage();
        }
    }

    public function delete(int $idUser): void
    {
        try {
            $db = $this->getDb();
            $query = $db->prepare('DELETE FROM Users WHERE idUser = :idUser');
            $query->bindValue(':idUser', $idUser);
            $query->execute();
        } catch (PDOException $e) {
            echo "Unable to delete the user in the table 'Users': " . $e->getMessage();
        }
    }

    public function getUserByEmail(string $email): ?array
    {
        try {
            $db = $this->getDb();
            $query = $db->prepare('SELECT * FROM Users WHERE email = :email');
            $query->bindValue(':email', $email);
            $query->execute();
    
            // Retourner les données de l'utilisateur ou null si aucun résultat
            return $query->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}