<?php



$routes = require_once './app/config/routes.php';



$route = trim($_SERVER['REQUEST_URI'], '/');



if (array_key_exists($route, $routes)){

    $controllerName = $routes[$route]['controller'];

    $actionName = $routes[$route]['action'];



    require_once 'app/controllers/' . $controllerName . '.php';



    $controller = new $controllerName();

    $controller->$actionName();



} else {

    
    require_once 'app/controllers/HomePageController.php';



    $controller = new HomePageController();

    $controller->index();
}

?>