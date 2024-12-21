<?php

return [
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
    ]
    
]

?>