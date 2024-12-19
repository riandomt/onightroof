<?php 
class IndexController {
    private $twig;

    public function __construct($twig) {
        $this->twig = $twig;
        session_start([
            'cookie_lifetime' => 0, // Durée de vie du cookie (0 signifie qu'il disparaît à la fermeture du navigateur)
            'cookie_path' => '/', // Chemin sur lequel le cookie est disponible
            'cookie_domain' => '', // Domaine pour lequel le cookie est valable
            'cookie_secure' => true, // Ne transmettre que si une connexion sécurisée (HTTPS) est utilisée
            'cookie_httponly' => true, // Le cookie n'est accessible qu'à travers le protocole HTTP
            'cookie_samesite' => 'Strict', // Limite l'envoi du cookie avec des requêtes inter-sites
        ]);
        
    }
    public function index() {
        ob_start(); 
        include __DIR__."/../views/template/php/home.php";
        $errorContent = ob_get_clean();
        
        $isLogged = isset($_SESSION['isLogged']) ? $_SESSION['isLogged'] : false;
        echo $this->twig->render('global.php.twig', [
            'content' => $errorContent,
            'isLogged' => $isLogged 
        ]);
    }
    
}
