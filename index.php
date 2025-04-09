<?php

use App\Controllers\AuthController;
use App\http\Register;
use Dotenv\Dotenv;

// Autoload & .env
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

session_start();

// Controllers
$authController = new AuthController;

// Routing
$requestUri = trim($_SERVER['REQUEST_URI'], '/');
$requestSegments = explode("/", $requestUri);

// View Paths
$views = [
    'home'       => __DIR__ . '/Views/Home/home.php',
    'auth'       => __DIR__ . '/Views/Forms/auth.php',
    'cours'      => __DIR__ . '/Views/Page/cours.php',
    'users'      => __DIR__ . '/Views/Page/users.php',
    'categories' => __DIR__ . '/Views/Page/categories.php',
    'tags'       => __DIR__ . '/Views/Page/tags.php',
    'roles'      => __DIR__ . '/Views/Page/roles.php',
];

// Routing Logic
switch ($requestSegments[0]) {
    case '':
        require $views['home'];
        break;

    case 'form':
        if (!empty($requestSegments[1])) {
            switch ($requestSegments[1]) {
                case 'auth':
                    require $views['auth'];
                    break;
                default:
                    require $views['home'];
                    break;
            }
        } else {
            require $views['home'];
        }
        break;

    case 'page':
        if (!empty($requestSegments[1])) {
            switch ($requestSegments[1]) {
                case 'cours':
                    require $views['cours'];
                    break;
                case 'users':
                    require $views['users'];
                    break;
                case 'categories':
                    require $views['categories'];
                    break;
                case 'tags':
                    require $views['tags'];
                    break;
                case 'roles':
                    require $views['roles'];
                    break;
                default:
                    require $views['home'];
                    break;
            }
        } else {
            require $views['home'];
        }
        break;

    case 'auth':
        if (!empty($requestSegments[1])) {
            switch ($requestSegments[1]) {
                case 'login':
                    $authController->login();
                    break;
                case 'register':
                    $registerForm = new Register(
                        $_POST['username'] ?? '',
                        $_POST['email'] ?? '',
                        $_POST['password'] ?? '',
                        $_POST['Cpassword'] ?? '',
                        $_POST['role'] ?? ''
                    );
                    $authController->register($registerForm);
                    break;
                case 'logout':
                    $authController->logout();
                    break;
                default:
                    require $views['home'];
                    break;
            }
        } else {
            require $views['home'];
        }
        break;

    default:
        require $views['home'];
        break;
}
