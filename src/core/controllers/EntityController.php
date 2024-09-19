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

    public function deleteEntity()
    {
        $id = $_POST['id'];
        $this->entity->deleteEntity($id);
        header('location: /admin');
    }

    public function addEntity()
    {
        $class_ru_id = $_POST['class_ru_id'];
        $class_lat_id = $_POST['class_lat_id'];
        $species_ru_id = $_POST['species_ru_id'];
        $species_lat_id = $_POST['species_lat_id'];
        $rarity_status_id = $_POST['rarity_status'];
        $population = $_POST['population'];

        $this->entity->addEntity($class_ru_id, $class_lat_id, $species_ru_id, $species_lat_id, $rarity_status_id, $population);
        header('location: /admin');
    }

    public function updateEntity()
    {
        $id = $_POST['id'];
        $class_ru_id = $_POST['class_ru_id'];
        $class_lat_id = $_POST['class_lat_id'];
        $species_ru_id = $_POST['species_ru_id'];
        $species_lat_id = $_POST['species_lat_id'];
        $rarity_status_id = $_POST['rarity_status'];
        $population = $_POST['population'];

        $this->entity->redactEntity($id, $class_ru_id, $class_lat_id, $species_ru_id, $species_lat_id, $rarity_status_id, $population);
        header('location: /admin');
    }



}