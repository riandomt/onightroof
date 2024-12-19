<?php
class Error404Controller
{
    private $twig;

    public function __construct($twig) {
        $this->twig = $twig;
    }

    public function index() {
        ob_start(); // Démarre le tampon de sortie
        include __DIR__."/../views/template/php/error404.php"; // Inclure le fichier
        $errorContent = ob_get_clean(); // Récupère le contenu et nettoie le tampon
        $isLogged = isset($_SESSION['isLogged']) ? $_SESSION['isLogged'] : false;

        echo $this->twig->render('global.php.twig', [
            'content' => $errorContent,
            'isLogged' => $isLogged
        ]);
    }
    
}

