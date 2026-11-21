<?php 
    declare(strict_types = 1);
    require_once __DIR__. "/models/NoteModel.php";
    require_once __DIR__. "/models/UserModel.php";
    require_once __DIR__. "/controllers/noteController.php";
    require_once __DIR__. "/controllers/userController.php";
    require_once __DIR__. "/config/database.php";
    session_start();

    $database = new Database();
    // $noteModel = new NoteModel($database->connect());
    $userModel = new UserModel($database->connect());

    // $noteController = new NoteController($noteModel);

    $userController = new UserController($userModel);

    $url = $_SERVER['REQUEST_URI'];
    

    $routes = [
        "/notes/main.php?action=signup" => [$userController, "signup"],
        "/notes/main.php?action=login" => [$userController, "login"],
        "/notes/main.php?action=store" => [$userController, "store"],
        "/notes/main.php?action=register" => [$userController, "register"],
        "/notes/main.php?action=dashboard" => [$userController, "dashboard"]
     ];

    if (array_key_exists($url, $routes)) {
        $routes[$url]();
    } else {
        http_response_code(404);
        die("the page not available now");
    }

    
    

    
?>