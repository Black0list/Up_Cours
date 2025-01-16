<?php

use App\Controllers\AuthController;
use App\DAOs\RoleDAO;
use App\DAOs\UtilisateurDAO;
use App\http\Login;
use App\http\Register;
use App\Model\Role;
use App\Model\Utilisateur;

require_once dirname(__DIR__) . "\\UpCours\\vendor\\autoload.php";
session_start();


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
                // require __DIR__ . "/Views/Home/home.php";
                $role = new RoleDAO;
                $roleObj = new Role;
                $roleObj->Build(["id" => 2, "role_name" => "gerant", "description" => "dddaaaaaaaaaaaaaaaaa"]);
                $role->Update($roleObj);
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
                    if(!isset($_POST['email']) && !isset($_POST['password'])) 
                    {
                        return require __DIR__ . $AuthPage;
                    }
                    
                    $AuthController = new AuthController;
                    switch ($RequestArray[2]) 
                    {
                        case 'login':
                            $LoginForm = new Login($_POST['email'], $_POST['password']);
                            $AuthController->login($LoginForm);
                            break;

                        case 'register':
                            $RegisterForm = new Register($_POST['username'], $_POST['email'], $_POST['password'], $_POST['Cpassword'], $_POST['role']);
                            $AuthController->register($RegisterForm);
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

?>

