<?php

use router\Router;

Router::myGet('/', 'home');
Router::myGet('/item.php', 'item');
Router::getContent();