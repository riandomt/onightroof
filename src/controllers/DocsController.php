<?php
class DocsController
{
    private $twig;

    public function __construct($twig) {
        $this->twig = $twig;
    }

public function index() {
    ob_start();
    include __DIR__."/../views/template/php/docs.php";
    $errorContent = ob_get_clean();
    
    echo $this->twig->render('docs.php.twig', [
        'title' => 'Documentation',
        'content' => $errorContent
    ]);
}

}