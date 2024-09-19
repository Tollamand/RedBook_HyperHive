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
        $squad_ru_id = $_POST['squad_ru_id'];
        $squad_lat_id = $_POST['squad_lat_id'];
        $family_ru_id = $_POST['family_ru_id'];
        $family_lat_id = $_POST['family_lat_id'];
        $species_ru_id = $_POST['species_ru_id'];
        $species_lat_id = $_POST['species_lat_id'];
        $department_ru_id = $_POST['department_ru_id'];
        $department_lat_id = $_POST['department_lat_id'];
        $procedure_ru_id = $_POST['procedure_ru_id'];
        $procedure_lat_id = $_POST['procedure_lat_id'];
        $rarity_status_id = $_POST['rarity_status_id'];
        $park_id = $_POST['park_id'];
        $population = $_POST['population'];
        $habitat_features = $_POST['habitat_features'];
        $limiting_factors = $_POST['limiting_factors'];
        $security_measures_taken = $_POST['security_measures_taken'];
        $species_state_changes = $_POST['species_state_changes'];
        $species_conservation_measures = $_POST['species_conservation_measures'];

        $this->entity->addEntity($class_ru_id, $class_lat_id, $squad_ru_id, $squad_lat_id, $family_ru_id, $family_lat_id, $species_ru_id, $species_lat_id, $department_ru_id, $department_lat_id, $procedure_ru_id, $procedure_lat_id, $rarity_status_id, $park_id, $population, $habitat_features, $limiting_factors, $security_measures_taken, $species_state_changes, $species_conservation_measures);
        header('location: /admin');
    }

    public function updateEntity()
    {
        $id = $_POST['id'];
        $class_ru_id = $_POST['class_ru_id'];
        $class_lat_id = $_POST['class_lat_id'];
        $squad_ru_id = $_POST['squad_ru_id'];
        $squad_lat_id = $_POST['squad_lat_id'];
        $family_ru_id = $_POST['family_ru_id'];
        $family_lat_id = $_POST['family_lat_id'];
        $species_ru_id = $_POST['species_ru_id'];
        $species_lat_id = $_POST['species_lat_id'];
        $department_ru_id = $_POST['department_ru_id'];
        $department_lat_id = $_POST['department_lat_id'];
        $procedure_ru_id = $_POST['procedure_ru_id'];
        $procedure_lat_id = $_POST['procedure_lat_id'];
        $rarity_status_id = $_POST['rarity_status_id'];
        $park_id = $_POST['park_id'];
        $population = $_POST['population'];
        $habitat_features = $_POST['habitat_features'];
        $limiting_factors = $_POST['limiting_factors'];
        $security_measures_taken = $_POST['security_measures_taken'];
        $species_state_changes = $_POST['species_state_changes'];
        $species_conservation_measures = $_POST['species_conservation_measures'];
        $this->entity->redactEntity($id, $class_ru_id, $class_lat_id, $squad_ru_id, $squad_lat_id, $family_ru_id, $family_lat_id, $species_ru_id, $species_lat_id, $department_ru_id, $department_lat_id, $procedure_ru_id, $procedure_lat_id, $rarity_status_id, $park_id, $population, $habitat_features, $limiting_factors, $security_measures_taken, $species_state_changes, $species_conservation_measures);
        header ('location: /admin');
    }



}