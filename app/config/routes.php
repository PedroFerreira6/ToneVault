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
    'logout' => [
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
    ],

    'buy' => [
        'controller' => 'ItemPageController',
        'action' => 'buy'
    ],
    'like' => [
        'controller' => 'ItemPageController',
        'action' => 'like'
    ],

    'listUsers' => [
        'controller' => 'UserController',
        'action' => 'listUsers'
    ],

    'listAudios' => [
        'controller' => 'ItemPageController',
        'action' => 'list'
    ],

  

];


// ISTo è para paginas COM GEtS
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $routes['item?id=' . $_GET['id']] = [
        'controller' => 'ItemPageController',
        'action' => 'index'
    ];
    $routes['edit?id=' . $_GET['id']] = [
        'controller' => 'ItemPageController',
        'action' => 'edit'
    ];
    $routes['editUser?id=' . $_GET['id']] = [
        'controller' => 'UserController',
        'action' => 'editUser'
    ];
    $routes['toggleUserState?id=' . $_GET['id']] = [
        'controller' => 'UserController',
        'action' => 'toggleUserState'
    ];

    $routes['editAudio?id=' . $_GET['id']] = [
        'controller' => 'ItemPageController',
        'action' => 'EditAudio'
    ];

    $routes['deleteAudio?id=' . $_GET['id']] = [
        'controller' => 'ItemPageController',
        'action' => 'deleteAudio'
    ];
}


return $routes;
