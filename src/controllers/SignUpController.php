<?php
use Dorian\Onightroof\Models\Db;
use Dorian\Onightroof\Models\Table\Users;
use Dorian\Onightroof\Models\TableManager\UsersManager;
class SignUpController
{
    private $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    private function checkingValue(mixed $value, int $min, int $max, string $regex): bool
    {
        $regexArr = [
            'text' => '/^[a-zA-ZÀ-ÿ\s-]{2,}$/',
            'number' => '/^\d+$/',
            'password' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/',
            'phone' => '/^(?:\+33|0)[1-9](\d{2}){4}$/',
            'date' => '/^(?:19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/'
        ];

        $value = strval($value);
        $lenValue = strlen($value);

        return $lenValue >= $min && $lenValue <= $max &&
            preg_match($regexArr[$regex], $value);
    }

    private function birthdayChecking(string $birthday): bool
    {
        $birthday = new DateTime($birthday);
        $currentDay = new DateTime();
        $age = $currentDay->diff($birthday);
        return $age->y >= 18;
    }

    private function insertUser()
    {
        $errorMessage = '';
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $lastname = htmlspecialchars($_POST['lastname']);
                $firstname = htmlspecialchars($_POST['firstname']);
                $birthday = htmlspecialchars($_POST['birthday']);
                $gender = htmlspecialchars($_POST['gender']);
                $email = trim(htmlspecialchars($_POST['email']));
                $passcode = htmlspecialchars($_POST['passcode']);
                $phoneNbr = htmlspecialchars($_POST['phoneNbr']);

                // Validation des données
                if (!$this->checkingValue($lastname, 3, 30, 'text')) {
                    throw new Exception('Le nom est invalide');
                }

                if (!$this->checkingValue($firstname, 3, 30, 'text')) {
                    throw new Exception('Le prénom est invalide');
                }

                if (!$this->birthdayChecking($birthday)) {
                    throw new Exception('Vous n\'avez pas l\'âge requis pour créer un compte');
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    throw new Exception('L\'email est invalide');
                }

                if (!$this->checkingValue($passcode, 8, 32, 'password')) {
                    throw new Exception('Le mot de passe doit contenir au moins 8 caractères, incluant des lettres majuscules/minuscules, des chiffres et des caractères spéciaux.');
                }

                if (!$this->checkingValue($phoneNbr, 10, 10, 'phone')) {
                    throw new Exception('Le numéro de téléphone est invalide');
                }

                // Création d'un nouvel utilisateur
                $user = new Users(
                    $lastname,
                    $firstname,
                    $birthday,
                    $gender,
                    $email,
                    $phoneNbr,
                    password_hash($passcode, PASSWORD_BCRYPT),
                    
                );

                // Insérer l'utilisateur
                $userManager = new UsersManager();
                $userManager->insert($user);

                header('Location: /onightroof/signIn');
                exit;
            }
        } catch (Exception $e) {
            $errorMessage = '<p style="color:var(--red);">' . $e->getMessage() . '</p>';
        }
        return $errorMessage;
    }

    public function index()
    {
        $errorMessage = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action']) && $_POST['action'] == 'insert') {
                $errorMessage = $this->insertUser();
            } else {
                throw new Exception("Action invalide spécifiée dans \$_POST['action']");
            }
        }

        ob_start();
        include __DIR__ . "/../views/template/php/signUp.php";
        $content = ob_get_clean();
        $isLogged = isset($_SESSION['isLogged']) ? $_SESSION['isLogged'] : false;

        echo $this->twig->render('global.php.twig', [
            'content' => $content,
            'errorMessage' => $errorMessage,
            'isLogged' => $isLogged
        ]);
    }
}
