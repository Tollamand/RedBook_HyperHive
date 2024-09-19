<?php

namespace router;

use controllers\EntityController;
use controllers\UserController;

class Router
{

    public static $list = [];

    public static function myGet(string $url, string $namePage)
    {
        self::$list[] = [
            'url' => $url,
            'namePage' => $namePage
        ];
    }

    public static function myPost(string $url, string $controller, string $method)
    {
        self::$list[] = [
            'url' => $url,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public static function getContent()
    {
        $rout = $_GET['route'] ?? '';
        foreach (self::$list as $item)
        {
            if($item['url'] === '/' . $rout)
            {
                if ($_SERVER['REQUEST_METHOD'] === "GET")
                {
                    switch ($item['namePage'])
                    {
                        case 'home':
                            $entity = new EntityController();
                            $entity -> getEntities($item['namePage']);
                            die();
                        case 'login':
                            require_once __DIR__ . '/../../views/pages/user/' . $item['namePage'] . '.php';
                            die();
                        case 'item':
                            $entity = new EntityController();
                            $entity -> getEntity($item['namePage'], $_GET['id']);
                            die();
                        case 'admin':
                            $user = new UserController();
                            $user -> getUsers($item['namePage']);
                            die();
                    }
                }
                elseif ($_SERVER['REQUEST_METHOD'] === "POST")
                {
                    $method = $item['method'];
                    $action = new $item['controller'];
                    $action->$method();
                    die();
                }
            }
        }
    }

}