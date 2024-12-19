<?php
namespace Dorian\Onightroof\Models\TableManager;

use Dorian\Onightroof\Models\Db;
use Dorian\Onightroof\Models\Table\Pictures;
use PDO;
use PDOException;

class PicturesManager extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(Pictures $picture): string
    {
        $conn = $this->getDb();
        $conn->beginTransaction();
        
        try {
            // Insertion de l'image sans nom personnalisé
            $query = "INSERT INTO Pictures (picturePath, idRental) VALUES (:picturePath, :idRental)";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':picturePath', $picture->getPicturePath(), PDO::PARAM_STR);
            $stmt->bindValue(':idRental', $picture->getIdRental(), PDO::PARAM_INT);
            $stmt->execute();
            
            $picId = $conn->lastInsertId();
            
            $newPictureName = "pic_". $picId . '_' . $picture->getIdRental();
            
            // Mise à jour du nom de l'image
            $query = "UPDATE Pictures SET pictureName = :newPictureName WHERE idPicture = :idPicture";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':newPictureName', $newPictureName, PDO::PARAM_STR);
            $stmt->bindValue(':idPicture', $picId, PDO::PARAM_INT);
            $stmt->execute();
            
            $conn->commit();
            
            return $newPictureName;

        } catch (PDOException $e) {
            $conn->rollBack();
            echo "Unable to insert values into the table 'Pictures': " . $e->getMessage();
            exit;
        }
    }
}
