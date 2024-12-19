<?php
require_once 'vendor/autoload.php';

class Router {
    private $url;
    private $_routes = [];
    private $twig;

    public function __construct() {
        // Récupération de l'URL
        $this->url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->url = trim($this->url, '/'); // Enlever les slashs de début et de fin
        $this->url = explode('/', $this->url); // Convertir en tableau
    
        // Supprimer le préfixe 'onightroof' de l'URL si nécessaire
        if (isset($this->url[0]) && $this->url[0] === 'onightroof') {
            array_shift($this->url); // Supprime 'onightroof' du tableau
        }

        // Initialisation de Twig
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/src/views/template');
        $this->twig = new \Twig\Environment($loader, [
            'cache' => false,
            'debug' => true
        ]);
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());

        // Définir l'URL de base dynamiquement
        $baseUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}/onightroof";
        $this->twig->addGlobal('base_url', $baseUrl);
    }
    
    public function getRoutes() {
        return $this->_routes;
    }

    public function addRoute($action) {
        $route = ucfirst($action) . 'Controller';
        $this->_routes[$action] = $route;
    }

    public function delRoute($path) {
        unset($this->_routes[$path]);
    }

    public function run() {
        // Définir le contrôleur principal, par défaut 'index'
        $controller = isset($this->url[0]) && !empty($this->url[0]) ? $this->url[0] : 'index';
    
        // Redirection vers la page d'accueil pour 'index'
        if ($controller === 'index') {
            header('Location: /onightroof/home');
            exit();
        }
    
        // Vérification si le contrôleur existe dans les routes
        if (array_key_exists($controller, $this->_routes)) {
            // Si la route est 'myRentals', gérer dynamiquement les sous-routes
            if ($controller === 'myRentals' && isset($this->url[1])) {
                $this->handleRequest($this->_routes[$controller], [$this->url[1]]);
            } else {
                $this->handleRequest($this->_routes[$controller]);
            }
        } else {
            // Redirection vers une page 404
            header('Location: /onightroof/error404');
            exit();
        }
    }
    

    private function handleRequest($controller, $subSteps = [], $isError = false) {
        static $errorOccurred = false;
    
        if ($isError && $errorOccurred) {
            echo "Erreur: 404 controller not found.";
            return;
        }
    
        if ($isError) {
            $errorOccurred = true;
        }
    
        $controllerFile = __DIR__ . "/src/controllers/{$controller}.php";
        try {
            if (file_exists($controllerFile)) {
                require $controllerFile;
    
                if (class_exists($controller)) {
                    $controllerInstance = new $controller($this->twig);
    
                    // Appeler la méthode correspondant à la sous-étape
                    $method = !empty($subSteps) ? $subSteps[0] : 'index';
                    if (method_exists($controllerInstance, $method)) {
                        call_user_func([$controllerInstance, $method], array_slice($subSteps, 1));
                    } else {
                        throw new Exception("Error: 404 method or 'index' not found in {$controller}.");
                    }
                } else {
                    throw new Exception("Error: 404 controller class not found.");
                }
            } else {
                throw new Exception("Error: 404 controller file not found.");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
}
