<?php

use App\Controllers\AuthController;
use App\Controllers\CategorieController;
use App\Controllers\CourController;
use App\Controllers\RoleController;
use App\Controllers\TagController;
use App\Controllers\UtilisateurController;
use App\DAOs\CourDAO;
use App\DAOs\RoleDAO;
use App\DAOs\UtilisateurDAO;
use App\http\Login;
use App\http\Register;
use App\Model\Categorie;
use App\Model\Cour;
use App\Model\Enseignant;
use App\Model\Role;
use App\Model\Utilisateur;

require_once dirname(__DIR__) . "\\UpCours\\vendor\\autoload.php";
session_start();


$request = $_SERVER['REQUEST_URI'];
$RequestArray = explode("/", $_SERVER['REQUEST_URI']);

//  ========================== Controllers =============================
$AuthController = new AuthController;
$UtilisateurController = new UtilisateurController;
$RoleController = new RoleController;
$CategorieController = new CategorieController;
$CourController = new CourController;
$TagController = new TagController;


$HomePage = "/Views/Home/home.php";
$AuthPage = "/Views/Forms/auth.php";
$CoursPage = "/Views/Page/cours.php";
$FCoursPage = "/Views/Page/Fcours.php";
$UsersPage = "/Views/Page/users.php";
$CategoriesPage = "/Views/Page/categories.php";
$TagsPage = "/Views/Page/tags.php";
$RolesPage = "/Views/Page/roles.php";
$RequestPage = "/Views/Page/requests.php";

switch ($RequestArray[1]) {
    case '': {
            require __DIR__ . "/Views/Home/home.php";
            // $Cour = new CourDAO;
            // $role = new RoleDAO;
            // $roleObj = new Role;
            // $courObj = new Cour;
            // $categorieObj = new Categorie;
            // $categorieObj->Build(["id" => 1, "nom" => "Action", "description" => "ca desc"]);
            // $enseignantObj = new Enseignant;
            // $roleObj->Build(["id" => 1, "role_name" => "admin", "description" => "aaaaaaaaaaaaaaaaa"]);
            // $enseignantObj->Build(["name" => "hadoui", "id" => 1, "role" => $roleObj]);
            // $courObj->Build(["id" => 2, "title" => "gerant", "description" => "Courdddddd", "content" => "Video", "tags" => ['Hwlo', 'dawdwa', 'dwadwa', 'dwadaw'], "categorie" => $categorieObj, "enseignant" => $enseignantObj, "InscriptedStudents" => ["ahmed", "foullane"]]);
            // var_dump($courObj);
            // die();
            break;
        }
    case 'form': {
            if (isset($RequestArray[2])) {
                if (isset($_SESSION['user'])) {
                    return require __DIR__ . $CoursPage;
                }
                switch ($RequestArray[2]) {
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
    case 'page': {
            if (isset($RequestArray[2])) {
                $NbrUsers = $UtilisateurController->getNumberOf();
                $NbrCours = $CourController->getNumberOf();
                $NbrCategories = $CategorieController->getNumberOf();
                $NbrRoles = $RoleController->getNumberOf();
                $NbrTags = $TagController->getNumberOf();
                switch ($RequestArray[2]) {
                    case 'cours':

                        if (!isset($_SESSION['user'])) {
                            return require __DIR__ . $FCoursPage;
                        }
                        $cours = $CourController->getAll();
                        require __DIR__ . $CoursPage;
                        break;

                    case 'users':
                        if (!isset($_SESSION['user'])) {
                            return require __DIR__ . $AuthPage;
                        }
                        $users = $UtilisateurController->getAll();
                        require __DIR__ . $UsersPage;
                        break;

                    case 'categories':
                        if (!isset($_SESSION['user'])) {
                            return require __DIR__ . $AuthPage;
                        }
                        $CategorieController = new CategorieController;
                        $categories = $CategorieController->getAll();
                        require __DIR__ . $CategoriesPage;
                        break;

                    case 'requests':
                        if (!isset($_SESSION['user'])) {
                            return require __DIR__ . $AuthPage;
                        }
                        $UtilisateurController = new $UtilisateurController;
                        $users = $UtilisateurController->getAllBy("status", "pending");
                        require __DIR__ . $RequestPage;
                        break;

                    case 'tags':
                        if (!isset($_SESSION['user'])) {
                            return require __DIR__ . $AuthPage;
                        }
                        $TagController = new TagController;
                        $tags = $TagController->getAll();
                        require __DIR__ . $TagsPage;
                        break;

                    case 'roles':
                        if (!isset($_SESSION['user'])) {
                            return require __DIR__ . $AuthPage;
                        }
                        $roles = $RoleController->getAll();
                        require __DIR__ . $RolesPage;
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
    case 'auth': {
            if (isset($RequestArray[2])) {
                switch ($RequestArray[2]) {
                    case 'login':
                        if (!isset($_POST['email']) && !isset($_POST['password'])) {
                            return require __DIR__ . $AuthPage;
                        }
                        $LoginForm = new Login($_POST['email'], $_POST['password']);
                        $AuthController->login($LoginForm);
                        break;

                    case 'register':
                        if (!isset($_POST['email']) && !isset($_POST['password']) && !isset($_POST['password'])) {
                            return require __DIR__ . $AuthPage;
                        }
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
    case 'user': {
            if (isset($RequestArray[2])) {
                switch ($RequestArray[2]) {
                    case 'delete':
                        $UtilisateurController->Delete($_POST['user_id']);
                        header("Location: /page/users");
                        break;

                    case 'edit':
                        if (!isset($_POST['email']) && !isset($_POST['password']) && !isset($_POST['password'])) {
                            return require __DIR__ . $AuthPage;
                        }
                        $RegisterForm = new Register($_POST['username'], $_POST['email'], $_POST['password'], $_POST['Cpassword'], $_POST['role']);
                        $AuthController->register($RegisterForm);
                        break;

                    case 'request':
                        switch ($RequestArray[3]) {
                            case 'accept':
                                $UtilisateurController->AcceptRequest($_POST['user_id']);
                                header("Location: /page/requests");
                                break;
                        }
                        
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
    case 'categorie': {
            if (isset($RequestArray[2])) {
                switch ($RequestArray[2]) {
                    case 'delete':
                        $CategorieController->Delete($_POST['categorie_id']);
                        header("Location: /page/categories");
                        break;

                    case 'edit':
                        if (!isset($_POST['email']) && !isset($_POST['password']) && !isset($_POST['password'])) {
                            return require __DIR__ . $AuthPage;
                        }
                        $RegisterForm = new Register($_POST['username'], $_POST['email'], $_POST['password'], $_POST['Cpassword'], $_POST['role']);
                        $AuthController->register($RegisterForm);
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
