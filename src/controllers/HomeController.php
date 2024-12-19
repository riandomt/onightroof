<?php
class HomeController {
    private $twig;

    public function __construct($twig) {
        $this->twig = $twig;
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