<?php
require_once 'router.php';
session_start();

$router = new Router();
// Route de base
$router->addRoute('index');

// Routes d'authentifications 
$router->addRoute('signIn');
$router->addRoute('signUp');

// Routes de fonctionnalites
$router->addRoute('home');
$router->addRoute('myRentals');
$router->addRoute('booking');
$router->addRoute('account');

// Route des gestion des erreurs
$router->addRoute('error404');

// Route de déconnexion 
$router->addRoute('logout');

$router->addRoute('docs');
// Création des routes
$router->run(); 