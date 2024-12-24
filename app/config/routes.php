<?php

$routes = [
    '' => [
        'controller' => 'LoginPageController', 
        'action' => 'index'
    ],

    'home' => [
        'controller' => 'HomePageController', 
        'action' => 'index'
    ],

    'login/logar' => [
        'controller' => 'UserController', 
        'action' => 'login'
    ],
    'player' => [
        'controller' => 'PlayerController', 
        'action' => 'index'
    ],
    'login/logout' => [
        'controller' => 'UserController', 
        'action' => 'logout'
    ],
    'signup' => [
        'controller' => 'SignupPageController', 
        'action' => 'index'
    ],

    'signup/register' => [
        'controller' => 'UserController', 
        'action' => 'signup'
    ],

    'upload' => [
        'controller' => 'UploadController', 
        'action' => 'index'
    ],

    'upload/start' => [
        'controller' => 'UploadController', 
        'action' => 'processUpload'
    ]
];
// ISTo è para paginas COM GEtS
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $routes['item?id=' . $_GET['id']] = [
        'controller' => 'ItemPageController',
        'action' => 'index'
    ];
}

return $routes;

?>
