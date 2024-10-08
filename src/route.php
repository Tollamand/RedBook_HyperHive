<?php

use controllers\EntityController;
use controllers\UserController;
use router\Router;

Router::myGet('/', 'home');
Router::myGet('/login', 'login');
Router::myGet('/admin', 'admin');
Router::myGet('/item.php', 'item');

Router::myPost('/deleteEntity', EntityController::class, 'deleteEntity');
Router::myPost('/addEntity', EntityController::class, 'addEntity');
Router::myPost('/updateEntity', EntityController::class, 'updateEntity');
Router::myPost('/deleteUser', UserController::class, 'deleteUser');
Router::myPost('/addUser', UserController::class, 'addUser');
Router::myPost('/updateUser', UserController::class, 'updateUser');


Router::myPost('/auth', UserController::class, 'auth');
Router::myPost('/logout', UserController::class, 'logout');

Router::getContent();