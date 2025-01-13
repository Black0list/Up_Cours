<?php

use App\Controllers\AuthController;
use App\http\Register;

require_once dirname(__DIR__) . "\\UpCours\\vendor\\autoload.php";
session_start();



$AuthC = new AuthController;
$request = $_SERVER['REQUEST_URI'];
$RequestArray = explode("/", $_SERVER['REQUEST_URI']);

$HomePage = "/Views/Home/home.php";
$AuthPage = "/Views/Forms/auth.php";
$CoursPage = "/Views/Page/cours.php";
$UsersPage = "/Views/Page/users.php";
$CategoriePage = "/Views/Page/categories.php";
$TagsPage = "/Views/Page/tags.php";
$RolesPage = "/Views/Page/roles.php";

    switch ($RequestArray[1]){
        case '': 
            {
                require __DIR__ . "/Views/Home/home.php";
                break;
            }
        case 'form':
            {
                if(isset($RequestArray[2]))
                {
                    switch ($RequestArray[2]) 
                    {
                        case 'auth':
                            require __DIR__ . $AuthPage;
                            break;
                        
                        default:
                            require __DIR__ . $HomePage;
                            break;
                    }
                } else {
                    require __DIR__ . $HomePage;
                }
                break;
            }
        case 'page':
            {
                if(isset($RequestArray[2]))
                {
                    switch ($RequestArray[2]) 
                    {
                        case 'cours':
                            require __DIR__ . $CoursPage;
                            break;

                        case 'users':
                            require __DIR__ . $UsersPage;
                            break;
                        
                        default:
                            require __DIR__ . $HomePage;
                            break;
                    }
                } else {
                    require __DIR__ . $HomePage;
                }
                break;
            }
        case 'auth':
            {
                if(isset($RequestArray[2]))
                {
                    $AuthController = new AuthController;
                    switch ($RequestArray[2]) 
                    {
                        case 'login':
                            $AuthController->login();
                            break;

                        case 'register':
                            $LoginForm = new Register($_POST['username'], $_POST['email'], $_POST['password'], $_POST['Cpassword'], $_POST['role']);
                            $AuthController->register($LoginForm);
                            break;

                        case 'logout':
                            $AuthController->logout();
                            break;
                        
                        default:
                            require __DIR__ . $HomePage;
                            break;
                    }
                } else {
                    require __DIR__ . $HomePage;
                }
                break;
            }
            
            
        default:
            break;
    }
// ?>


<!-- case '/profile':
            require __DIR__ .'/Views/users.php';
            break;
        case '/form/signup':
            require __DIR__ .'/Views/Forms/sign_up.php';
            break;
        case '/auth/login': 
            $AuthC->login();
            break;
        case '/auth/signup': 
            $AuthC->signup();
            break;
        case '/auth/logout': 
            $AuthC->logout();
            break;
         -->