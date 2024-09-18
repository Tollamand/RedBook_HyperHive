<?php

namespace controllers;

use models\Entity;
use View\View;

class EntityController
{

    public $view;
    public $users;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../views');
        $this->users = new Entity();
    }

    public function getEntities($namePage)
    {
        return $this->view->render("pages/user/$namePage.php", ['AllEntity' => $this->users->getAllEntity()]);
    }

    public function getEntity($namePage, $id)
    {
        return $this->view->render("pages/user/$namePage.php", ['OneEntity' => $this->users->getOneEntity($id)]);
    }



}