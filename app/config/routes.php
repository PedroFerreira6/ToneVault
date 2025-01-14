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
    'delete' => [
        'controller' => 'ItemPageController',
        'action' => 'delete'
    ],

    'listUsers' => [
        'controller' => 'UserController',
        'action' => 'listUsers'
    ],

    'listAudios' => [
        'controller' => 'ItemPageController',
        'action' => 'list'
    ],
    'search' => [
        'controller' => 'SearchController',
        'action' => 'index'
    ],
    'profile' => [
        'controller' => 'ProfileController',
        'action' => 'index'
    ],
    'profile/editPassword' => [
        'controller' => 'ProfileController',
        'action' => 'editPassword'
    ],
    'wallet' => [
        'controller' => 'WalletController',
        'action' => 'index'
    ]
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
    $routes['profile?id=' . $_GET['id']] = [
        'controller' => 'ProfileController',
        'action' => 'index'
    ];
}

if (isset($_GET['s']) || isset($_GET['p'])) {
    $query = [];
    if (isset($_GET['s'])) {
        $query[] = 's=' . $_GET['s'];
    }
    if (isset($_GET['p'])) {
        $query[] = 'p=' . $_GET['p'];
    }
    $routes['search?' . implode('&', $query)] = [
        'controller' => 'SearchController',
        'action' => 'index',
    ];
}



return $routes;
