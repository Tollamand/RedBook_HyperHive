<?php

session_start();
require_once __DIR__ . "/src/config/services/Connect.php";
require_once __DIR__ . "/src/core/View/View.php";
require_once __DIR__ . "/src/core/controllers/EntityController.php";
require_once __DIR__ . "/src/core/controllers/UserController.php";
require_once __DIR__ . "/src/core/models/Entity.php";
require_once __DIR__ . "/src/core/models/User.php";
require_once __DIR__ . "/src/core/models/Tables.php";
require_once __DIR__ . "/src/router/Router.php";
require_once __DIR__ . "/src/route.php";
