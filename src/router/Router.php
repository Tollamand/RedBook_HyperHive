<?php

namespace router;

use controllers\EntityController;

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
                            $obj = new EntityController();
                            $obj -> getEntities($item['namePage']);
                            die();
                        case 'item':
                            $obj = new EntityController();
                            $obj -> getEntity($item['namePage'], $_GET['id']);
                            die();
                    }
                }
//                elseif ($_SERVER['REQUEST_METHOD'] === "POST")
//                {
//                    $method = $item['method'];
//                    $action = new $item['controller'];
//                    $action->$method();
//                    die();
//                }
            }
        }
    }

}