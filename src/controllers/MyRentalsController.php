<?php
use Dorian\Onightroof\Models\TableManager\{RentalsManager, ShowersManager,
KitchenManager, LivingRoomManager, TemperatureManager, SecurityManager, 
AccessibilityManager, PicturesManager};

use Dorian\Onightroof\Models\Table\{Rentals, Showers, Kitchen, LivingRoom, 
Temperature, Security, Accessibility, Pictures};

class MyRentalsController
{
    private $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    private function getUploadErrorMessage($errorCode)
    {
        switch ($errorCode) {
            case UPLOAD_ERR_INI_SIZE:
                return "Le fichier dépasse la taille autorisée dans la directive upload_max_filesize.";
            case UPLOAD_ERR_FORM_SIZE:
                return "Le fichier dépasse la taille maximale autorisée dans le formulaire.";
            case UPLOAD_ERR_PARTIAL:
                return "Le fichier a été téléchargé partiellement.";
            case UPLOAD_ERR_NO_FILE:
                return "Aucun fichier n'a été téléchargé.";
            case UPLOAD_ERR_NO_TMP_DIR:
                return "Le répertoire temporaire est manquant.";
            case UPLOAD_ERR_CANT_WRITE:
                return "Échec de l'écriture du fichier sur le disque.";
            case UPLOAD_ERR_EXTENSION:
                return "Une extension PHP a arrêté le téléchargement du fichier.";
            default:
                return "Une erreur inconnue s'est produite lors du téléchargement du fichier.";
        }
    }
    private function uploadPictures($file, $idUser, $idRental, $picName)
    {
        $uploadDir = 'images/rentals/';

        // Vérifier que le répertoire existe
        if (!is_dir($uploadDir)) {
            throw new Exception("Le répertoire d'upload n'existe pas.");
        }

        // Renommer l'image avec idUser, idRental et un nom de type picMain, pic2, pic3...
        $fileName = $idUser . '_' . $idRental . '_' . $picName . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $uploadFile = $uploadDir . $fileName;

        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

        if (!in_array($file['type'], $allowedTypes)) {
            throw new Exception('Le type de fichier est invalide. Seuls les fichiers JPEG, JPG et PNG sont autorisés.');
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('Erreur d\'upload : ' . $this->getUploadErrorMessage($file['error']));
        }

        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            return $fileName;
        } else {
            throw new Exception("Le téléchargement du fichier a échoué.");
        }
    }



    private function checkingValue(
        mixed $value,
        int $min,
        int $max,
        string $regex
    ): bool {
        $regexArr = [
            'text' => '/^[a-zA-ZàâçéèêëîïôûùüÿñÆŒœ\s]+$/',
            'textNumber' => '/^[a-zA-ZàâçéèêëîïôûùüÿñÆŒœ0-9\s]+$/',
            'image' => '/^[\w,\s-]+\.(png|jpg|jpeg)$/i',
            'zipCode' => '/^[0-9]{5}$/',
            'null' => null
        ];


        $value = strval($value);
        $lenValue = strlen($value);

        if ($regex == 'null') {
            return $lenValue >= $min && $lenValue <= $max;
        } else {
            return $lenValue >= $min && $lenValue <= $max &&
                preg_match($regexArr[$regex], $value);
        }
    }

    private function insertShower($idRental)
    {
        $services = json_decode($_COOKIE['Services'], true);
        $showerValues = $services['shower'];
        $shower = new Showers(
            $idRental,
            $showerValues['towel'],
            $showerValues['soap'],
            $showerValues['hairDryer'],
            $showerValues['dryer'],
            $showerValues['washingMachine']
        );
        $showerManager = new ShowersManager();
        return $showerManager->insert($shower);
    }

    private function insertKitchen($idRental)
    {
        $services = json_decode($_COOKIE['Services'], true);
        $kitchenValues = $services['kitchen'];
        $kitchen = new Kitchen(
            $idRental,
            $kitchenValues['oven'],
            $kitchenValues['microwaveOven'],
            $kitchenValues['refrigerator'],
            $kitchenValues['diningTable'],
            $kitchenValues['kitchenEquipment']
        );
        $kitchenManager = new KitchenManager();
        $kitchenManager->insert($kitchen);
    }

    private function insertLivingRoom($idRental)
    {
        $services = json_decode($_COOKIE['Services'], true);
        $livingRoomValues = $services['livingRoom'];
        $livingRoom = new LivingRoom(
            $idRental,
            $livingRoomValues['sofa'],
            $livingRoomValues['tv'],
            $livingRoomValues['wifi']
        );
        $livingRoomManager = new LivingRoomManager();
        $livingRoomManager->insert($livingRoom);
    }

    private function insertTemperature($idRental)
    {
        $services = json_decode($_COOKIE['Services'], true);
        $temperatureValues = $services['temperature'];
        $temperature = new Temperature(
            $idRental,
            $temperatureValues['heating'],
            $temperatureValues['airConditioning'],
            $temperatureValues['airFan']
        );
        $temperatureManager = new TemperatureManager();
        $temperatureManager->insert($temperature);
    }

    private function insertSecurity($idRental)
    {
        $services = json_decode($_COOKIE['Services'], true);
        $securityValues = $services['security'];
        $security = new Security(
            $idRental,
            $securityValues['smokeDetector'],
            $securityValues['carbonMonoxydeDetector'],
            $securityValues['fireExtinguisher'],
            $securityValues['safetyKit']
        );
        $securityManager = new SecurityManager();
        $securityManager->insert($security);
    }

    private function insertAccesibility($idRental)
    {
        $services = json_decode($_COOKIE['Services'], true);
        $accessibilityValues = $services['accessibility'];
        $accessibility = new accessibility(
            $idRental,
            $accessibilityValues['nbrOfParkingSpaces'],
            $accessibilityValues['singleStorey']
        );
        $accessibilityManager = new accessibilityManager();
        $accessibilityManager->insert($accessibility);
    }

    private function insertRental()
    {
        $rental = json_decode($_COOKIE['Rentals'], true);

        if (!$this->checkingValue($rental['rentalName'], 5, 30, 'text')) {
            throw new Exception('The name of rentals is invalid');
        }

        if (!$this->checkingValue($rental['lblRental'], 0, 300, 'null')) {
            throw new Exception('The description of rentals is invalid');
        }

        if (!$this->checkingValue($rental['city'], 0, 50, 'text')) {
            throw new Exception('The city of rentals is invalid');
        }

        if (!$this->checkingValue($rental['zipCode'], 5, 5, 'zipCode')) {
            throw new Exception('The zip code of rentals is invalid');
        }

        if (!$this->checkingValue($rental['address'], 10, 50, 'textNumber')) {
            throw new Exception('The address of rentals is invalid');
        }

        if (!$this->checkingValue($rental['addressComplement'], 10, 50, 'textNumber')) {
            throw new Exception('The address complement of rentals is invalid');
        }

        $rental = new Rentals(
            $rental['rentalName'],
            $rental['lblRental'],
            $rental['city'],
            $rental['zipCode'],
            $rental['address'],
            $rental['addressComplement'],
            $rental['typeOfRental'],
            $rental['capacity'],
            $rental['bedroomNbr'],
            $rental['singleBedNbr'],
            $rental['doubleBedNbr'],
            $rental['showerNbr'],
            $_SESSION['idUser']
        );

        $rentalsManager = new RentalsManager();
        return $rentalsManager->insert($rental);
    }

    private function insertPictures($idRental)
    {
        $idUser = $_SESSION['idUser'];
    
        if (isset($_COOKIE['pictures']) && !empty($_COOKIE['pictures'])) {
            $pictures = json_decode($_COOKIE['pictures'], true); 
    
            foreach ($pictures as $picName => $filePath) {
                // Vérifie si le fichier existe
                if (!empty($filePath)) {
                    $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    
                    if (in_array($fileExtension, ['jpeg', 'jpg'])) {
                        
                        $file = [
                            'tmp_name' => $filePath,  
                            'name' => $picName,       
                            'type' => 'image/jpeg',   
                            'error' => 0,             
                            'size' => filesize($filePath)
                        ];
    
                        $fileName = $this->uploadPictures($file, $idUser, $idRental, $picName);
    
                        $picture = new Pictures($idRental, $fileName);
                        $picturesManager = new PicturesManager();
                        $picturesManager->insert($picture);
                    } else {
                        echo "Le fichier {$picName} n'est pas un format valide. Seuls les fichiers JPEG ou JPG sont autorisés.";
                    }
                }
            }
        }
    }
    



    private function insertRentalAndTableAssocied()
    {
        $idRental = $this->insertRental();
        $this->insertShower($idRental);
        $this->insertKitchen($idRental);
        $this->insertLivingRoom($idRental);
        $this->insertTemperature($idRental);
        $this->insertSecurity($idRental);
        $this->insertAccesibility($idRental);
        $this->insertPictures($idRental);
    }



    public function basicInfo()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'basicInfo') {
            $basicInfo = [
                "rentalName" => htmlspecialchars($_POST['rentalName']),
                "lblRental" => htmlspecialchars($_POST['lblRental']),
                "city" => htmlspecialchars($_POST['city']),
                "zipCode" => htmlspecialchars($_POST['zipCode']),
                "address" => htmlspecialchars($_POST['address']),
                "addressComplement" => htmlspecialchars($_POST['addressComplement']),
                "typeOfRental" => htmlspecialchars($_POST['typeOfRental']),
                "capacity" => htmlspecialchars($_POST['capacity']),
                "bedroomNbr" => htmlspecialchars($_POST['bedroomNbr']),
                "singleBedNbr" => htmlspecialchars($_POST['singleBedNbr']),
                "doubleBedNbr" => htmlspecialchars($_POST['doubleBedNbr']),
                "showerNbr" => htmlspecialchars($_POST['showerNbr']),
                "idUser" => $_SESSION['idUser']
            ];
            setcookie('Rentals', json_encode($basicInfo), time() + 600, '/', '', true, true);
            header('Location: /onightroof/myRentals/services');
            exit;
        } else {
            ob_start();
            include __DIR__ . "/../views/template/php/myRentals/basicInfo.php";
            $content = ob_get_clean();

            echo $this->twig->render('global.php.twig', [
                'content' => $content,
                'isLogged' => isset($_SESSION['isLogged']) ? $_SESSION['isLogged'] : false,
            ]);
        }
    }

    public function services()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'services') {

            $shower = [
                "towel" => htmlspecialchars((int)$_POST['towel']),
                "soap" => htmlspecialchars((int)$_POST['soap']),
                "hairDryer" => htmlspecialchars((int)$_POST['hairDryer']),
                "dryer" => htmlspecialchars((int)$_POST['dryer']),
                "washingMachine" => htmlspecialchars((int)$_POST['washingMachine'])
            ];

            $kitchen = [
                "oven" => htmlspecialchars((int)$_POST['oven']),
                "microwaveOven" => htmlspecialchars((int)$_POST['microwaveOven']),
                "refrigerator" => htmlspecialchars((int)$_POST['refrigerator']),
                "diningTable" => htmlspecialchars((int)$_POST['diningTable']),
                "kitchenEquipment" => htmlspecialchars((int)$_POST['kitchenEquipment']),
            ];

            $livingRoom = [
                "sofa" => htmlspecialchars((int)$_POST['sofa']),
                "tv" => htmlspecialchars((int)$_POST['tv']),
                "wifi" => htmlspecialchars((int)$_POST['wifi'])
            ];

            $temperature = [
                "heating" => htmlspecialchars((int)$_POST['heating']),
                "airConditioning" => htmlspecialchars((int)$_POST['airConditioning']),
                "airFan" => htmlspecialchars((int)$_POST['airFan'])
            ];

            $security = [
                "smokeDetector" => htmlspecialchars((int)$_POST['smokeDetector']),
                "carbonMonoxydeDetector" => htmlspecialchars((int)$_POST['carbonMonoxydeDetector']),
                "fireExtinguisher" => htmlspecialchars((int)$_POST['fireExtinguisher']),
                "safetyKit" => htmlspecialchars((int)$_POST['safetyKit'])
            ];

            $accessibility = [
                "singleStorey" => htmlspecialchars((int)$_POST['singleStorey']),
                "nbrOfParkingSpaces" => htmlspecialchars((int)$_POST['nbrOfParkingSpaces'])
            ];

            $services = [
                "shower" => $shower,
                "kitchen" => $kitchen,
                "livingRoom" => $livingRoom,
                "temperature" => $temperature,
                "security" => $security,
                "accessibility" => $accessibility
            ];

            setcookie('Services', json_encode($services), time() + 600, '/', '', true, true);
            header('Location: /onightroof/myRentals/pictures');
            exit;
        } else {
            ob_start();
            include __DIR__ . "/../views/template/php/myRentals/services.php";
            $content = ob_get_clean();

            echo $this->twig->render('global.php.twig', [
                'content' => $content,
                'isLogged' => isset($_SESSION['isLogged']) ? $_SESSION['isLogged'] : false,
            ]);
        }
    }
    public function pictures()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'create') {
            $pictures = [];

            if (isset($_FILES['mainPic']) && !empty($_FILES['mainPic'])) {
                $pictures['mainPic'] = $_FILES['mainPic'];
            }

            if (isset($_FILES['picTwo']) && !empty($_FILES['picTwo'])) {
                $pictures['picTwo'] = $_FILES['picTwo'];
            }

            if (isset($_FILES['picThree']) && !empty($_FILES['picThree'])) {
                $pictures['picThree'] = $_FILES['picThree'];
            }

            if (isset($_FILES['picFour']) && !empty($_FILES['picFour'])) {
                $pictures['picFour'] = $_FILES['picFour'];
            }

            if (isset($_FILES['picFive']) && !empty($_FILES['picFive'])) {
                $pictures['picFive'] = $_FILES['picFive'];
            }

            setcookie('Pictures', json_encode($pictures), time() + 600, '/', '', true, true);

            $this->insertRentalAndTableAssocied();

            header('Location: /onightroof/myRentals/');
            exit;
        } else {
            ob_start();
            include __DIR__ . "/../views/template/php/myRentals/pictures.php";
            $content = ob_get_clean();

            echo $this->twig->render('global.php.twig', [
                'content' => $content,
                'isLogged' => isset($_SESSION['isLogged']) ? $_SESSION['isLogged'] : false,
            ]);
        }
    }



    public function index()
    {
        ob_start();
        include __DIR__ . "/../views/template/php/myRentals.php";
        $errorContent = ob_get_clean();

        setcookie('Services', '', time() + 0, '/', '', true, true);
        setcookie('Rentals', '', time() + 0, '/', '', true, true);
        $isLogged = isset($_SESSION['isLogged']) ? $_SESSION['isLogged'] : false;

        echo $this->twig->render('global.php.twig', [
            'content' => $errorContent,
            'isLogged' => $isLogged,
        ]);
    }
}
