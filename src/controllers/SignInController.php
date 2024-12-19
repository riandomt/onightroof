<?php
use Dorian\Onightroof\Models\Db;
use Dorian\Onightroof\Models\TableManager\UsersManager;
class SignInController
{
    private $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    private function auth(): string
    {
        try {
            $error = '';
            $email = htmlspecialchars($_POST['email']);
            $passcode = htmlspecialchars($_POST['passcode']);

            $userManager = new UsersManager();
            $user = $userManager->getUserByEmail($email);

            if ($user && password_verify($passcode, $user['passcode'])) {
                $_SESSION['lastname'] = $user['lastname'];
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['idUser'] = $user['idUser'];
                $_SESSION['isLogged'] = true;

            } else {
                $error = "Identifiants incorrects.";
            }
            
        } catch (Exception $e) {
            $error = '<p style="color:var(--red);">' . $e->getMessage() . '</p>';
        }

        return $error;
    }

    public function index()
    {
        $errorSignIn = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action']) && $_POST['action'] == 'auth') {
                $errorSignIn = $this->auth();
            } else {
                throw new Exception("Action invalide spécifiée dans \$_POST['action']");
            }
        }
    
        ob_start();
        include __DIR__ . "/../views/template/php/signIn.php";
        $content = ob_get_clean();
        $isLogged = isset($_SESSION['isLogged']) ? $_SESSION['isLogged'] : false;

        echo $this->twig->render('global.php.twig', [
            'content' => $content,
            'errorSignIn' => $errorSignIn,
            'isLogged' => $isLogged,
        ]);
    }
    
}
