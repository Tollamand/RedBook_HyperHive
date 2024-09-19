<?php

namespace controllers;

use models\Entity;
use View\View;

class EntityController
{

    public $view;
    public $entity;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../views');
        $this->entity = new Entity();
    }

    public function getEntities($namePage)
    {
        return $this->view->render("pages/user/$namePage.php", ['AllEntity' => $this->entity->getAllEntity()]);
    }

    public function getEntity($namePage, $id)
    {
        return $this->view->render("pages/user/$namePage.php", ['OneEntity' => $this->entity->getOneEntity($id)]);
    }

    public function deleteEntity($namePage, $id)
    {
        $id = $_POST['id'];
        $this->entity->deleteEntity($id);
        header('location: /admin');
    }





}