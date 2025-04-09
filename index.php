<?php

use App\Controllers\AuthController;
use App\Controllers\CategorieController;
use App\Controllers\CourController;
use App\Controllers\RoleController;
use App\Controllers\TagController;
use App\Controllers\UtilisateurController;
use App\http\Login;
use App\http\Register;
<<<<<<< HEAD
use Dotenv\Dotenv;

// Autoload & .env
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
=======
use App\Model\Categorie;
use App\Model\Cour;
use App\Model\Role;
use App\Model\Tag;
use App\Model\Utilisateur;
>>>>>>> 387f45d952c734e19a6d96f5bb591accb1827fdf

session_start();

// Controllers
$authController = new AuthController;

<<<<<<< HEAD
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
=======
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
$CourDetailsPage = "/Views/Page/courDetails.php";
$EditCour = "/Views/Actions/EditCour.php";
$EditRole = "/Views/Actions/EditRole.php";
$EditSection = "/Views/Actions/EditSection.php";
$EditUser = "/Views/Actions/EditUser.php";
$SubscriptionPage = "/Views/Page/subscriptions.php";

switch ($RequestArray[1]) {
    case '': {
            require __DIR__ . $HomePage;
            // $Cour = new CourDAO;
            // $role = new RoleDAO;
            // $roleObj = new Role;
            // $courObj = new CourController;
            // $categorieObj = new Categorie;
            // $categorieObj->Build(["id" => 1, "nom" => "Action", "description" => "ca desc"]);
            // $enseignantObj = new Enseignant;
            // $roleObj->Build(["id" => 1, "role_name" => "admin", "description" => "aaaaaaaaaaaaaaaaa"]);
            // $enseignantObj->Build(["name" => "hadoui", "id" => 1, "role" => $roleObj]);
            // $courObj->Build(["id" => 2, "title" => "gerant", "description" => "Courdddddd", "content" => "Video", "tags" => ['Hwlo', 'dawdwa', 'dwadwa', 'dwadaw'], "categorie" => $categorieObj, "enseignant" => $enseignantObj, "InscriptedStudents" => ["ahmed", "foullane"]]);
            // var_dump($courObj->getAll());
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
                        if (isset($_SESSION['user'])) {
                            return require __DIR__ . $CoursPage;
                        }
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
                        if (!isset($_SESSION['user']) || $_SESSION['user']->getRoleName() != "admin") {
                            return require __DIR__ . $AuthPage;
                        }
                        $users = $UtilisateurController->getAll();
                        require __DIR__ . $UsersPage;
                        break;

                    case 'categories':
                        if (!isset($_SESSION['user']) || $_SESSION['user']->getRoleName() != "admin") {
                            return require __DIR__ . $AuthPage;
                        }
                        $categories = $CategorieController->getAll();
                        require __DIR__ . $CategoriesPage;
                        break;

                    case 'requests':
                        if (!isset($_SESSION['user']) || $_SESSION['user']->getRoleName() != "admin") {
                            return require __DIR__ . $AuthPage;
                        }
                        $users = $UtilisateurController->getAllBy("status", "pending");
                        require __DIR__ . $RequestPage;
                        break;

                    case 'tags':
                        if (!isset($_SESSION['user']) || $_SESSION['user']->getRoleName() != "admin") {
                            return require __DIR__ . $AuthPage;
                        }
                        $tags = $TagController->getAll();
                        require __DIR__ . $TagsPage;
                        break;

                    case 'subscriptions':
                        if (!isset($_SESSION['user']) || $_SESSION['user']->getRoleName() != "etudiant") {
                            return require __DIR__ . $AuthPage;
                        }
                        $subscriptions = $UtilisateurController->getAllSubscriptions($_SESSION['user']->getId());
                        require __DIR__ . $SubscriptionPage;
                        break;

                    case 'roles':
                        if (!isset($_SESSION['user']) || $_SESSION['user']->getRoleName() != "admin") {
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

                    case 'get':
                        $Object = $UtilisateurController->findOneBy("id", $_POST['user_id']);
                        $redirection = "/user/edit";
                        require __DIR__ . $EditUser;
                        break;

                    case 'edit':
                        $Object = new Utilisateur;
                        $ObjectRole = new Role;
                        $ObjectRole->Build(["id" => $_POST['role']]);
                        $Object->Build(["id" => $_POST['id'], "name" => $_POST['name'], "email" => $_POST['email'], "role" => $ObjectRole, "status" => $_POST['status']]);
                        $UtilisateurController->Update($Object);
                        header("location: /page/users");
                        break;

                    case 'subscribe':
                        $UtilisateurController->Subscribe($_POST['cour_id'], $_POST['etudiant_id']);
                        header("location: /page/subscriptions");
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

    case 'role': {
            if (isset($RequestArray[2])) {
                switch ($RequestArray[2]) {
                    case 'delete':
                        $RoleController->Delete($_POST['role_id']);
                        header("Location: /page/roles");
                        break;

                    case 'get':
                        $Object = $RoleController->findOneBy("id", $_POST['role_id']);
                        $redirection = "/role/edit";
                        require __DIR__ . $EditRole;
                        break;

                    case 'edit':
                        $Object = new Role;
                        $Object->Build(["id" => $_POST['id'], "role_name" => $_POST['name'], "description" => $_POST['description']]);
                        $RoleController->Update($Object);
                        header("location: /page/roles");
                        break;

                    case 'create':
                        $Object = new Role;
                        $Object->Build(["role_name" => $_POST['role_name'], "description" => $_POST['description']]);
                        $RoleController->Create($Object);
                        header("location: /page/roles");
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

    case 'tag': {
            if (isset($RequestArray[2])) {
                switch ($RequestArray[2]) {
                    case 'delete':
                        $TagController->Delete($_POST['tag_id']);
                        header("Location: /page/tags");
                        break;

                    case 'get':
                        $Object = $TagController->findOneBy("id", $_POST['tag_id']);
                        $redirection = "/tag/edit";
                        require __DIR__ . $EditSection;
                        break;

                    case 'edit':
                        $Object = new Tag;
                        $Object->Build(["id" => $_POST['id'], "nom" => $_POST['name'], "description" => $_POST['description']]);
                        $TagController->Update($Object);
                        header("location: /page/tags");
                        break;

                    case 'create':
                        $Object = new Tag;
                        $Object->Build(["nom" => $_POST['tag_name'], "description" => $_POST['description']]);
                        $TagController->Create($Object);
                        header("location: /page/tags");
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

                    case 'get':
                        $Object = $CategorieController->findOneBy("id", $_POST['categorie_id']);
                        $redirection = "/categorie/edit";
                        require __DIR__ . $EditSection;
                        break;

                    case 'edit':
                        $Object = new Categorie;
                        $Object->Build(["id" => $_POST['id'], "nom" => $_POST['name'], "description" => $_POST['description']]);
                        $CategorieController->Update($Object);
                        header("location: /page/categories");
                        break;

                    case 'create':
                        $Object = new Categorie;
                        $Object->Build(["nom" => $_POST['categorie_name'], "description" => $_POST['description']]);
                        $CategorieController->Create($Object);
                        header("location: /page/categories");
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
    case 'cour': {
            if (isset($RequestArray[2])) {
                switch ($RequestArray[2]) {
                    
                    case 'courDetails':
                        $cour = $CourController->findOneBy("id", $_POST['cour_id']);
                        require __DIR__ . $CourDetailsPage;
                        break;

                    case 'get':
                        $Object = $CourController->findOneBy("id", $_POST['cour_id']);
                        $redirection = "/cour/edit";
                        require __DIR__ . $EditCour;
                        break;    

                    case 'create':
                        $Object = new Cour;
                        $Categorie = new Categorie;
                        $Enseignant = new Utilisateur;
                        $Categorie->Build(["id" => $_POST['categorie']]);
                        $Enseignant->Build(["id" => $_POST['enseignant']]);
                        $Object->Build(["title" => $_POST['title'], "description" => $_POST['description'], "content" => $_POST['content'], "categorie" => $Categorie, "enseignant" => $Enseignant, "tags" => $_POST['tags']]);
                        $CourController->Create($Object);
                        header("location: /page/cours");
                        break;

                    case 'edit':
                        $Object = new Cour;
                        $Categorie = new Categorie;
                        $Enseignant = new Utilisateur;
                        $Categorie->Build(["id" => $_POST['categorie']]);
                        $Enseignant->Build(["id" => $_POST['enseignant']]);
                        $Object->Build(["id" => $_POST['id'], "title" => $_POST['title'], "description" => $_POST['description'], "content" => $_POST['content'], "categorie" => $Categorie, "enseignant" => $Enseignant, "tags" => $_POST['tags']]);
                        $CourController->Update($Object);
                        header("location: /page/cours");
                        break;

                    case 'delete':
                        $CourController->Delete($_POST['cour_id']);
                        header("Location: /page/cours");
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
>>>>>>> 387f45d952c734e19a6d96f5bb591accb1827fdf
        break;
}
