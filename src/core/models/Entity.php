<?php

namespace models;

use services\Connect;

class Entity {

    private $tables = [
        'class_ru' => 'entity.class_ru_id = class_ru.id',
        'class_lat' => 'entity.class_lat_id = class_lat.id',
        'department_lat' => 'entity.department_lat_id = department_lat.id',
        'department_ru' => 'entity.department_ru_id = department_ru.id',
        'family_lat' => 'entity.family_lat_id = family_lat.id',
        'family_ru' => 'entity.family_ru_id = family_ru.id',
        'species_lat' => 'entity.species_lat_id = species_lat.id',
        'species_ru' => 'entity.species_ru_id = species_ru.id',
        'procedures_lat' => 'entity.procedure_lat_id = procedures_lat.id',
        'procedures_ru' => 'entity.procedure_ru_id = procedures_ru.id',
        'rarity_status' => 'entity.rarity_status_id = rarity_status.id',
        'park' => 'entity.park_id = park.id',
        'squad_lat' => 'entity.squad_lat_id = squad_lat.id',
        'squad_ru' => 'entity.squad_ru_id = squad_ru.id',
    ];

    private function isFieldNotNull($field)
    {
        $result = Connect::Connect()->query("SELECT $field FROM `entity` WHERE $field IS NOT NULL LIMIT 1");
        return $result && $result->num_rows > 0;
    }

    private function buildQuery()
    {
        $baseQuery = "SELECT *";
        $joins = " FROM `entity` ";

        foreach ($this->tables as $table => $onCondition) {
            $field = explode('=', $onCondition)[0];
            $field = trim($field);

            if ($this->isFieldNotNull($field)) {
                $joins .= " JOIN $table ON $onCondition";
            }
        }
        return $baseQuery . $joins;
    }

    // **** Actions with entity ****
    public function getAllEntity()
    {
        $query = $this->buildQuery();
        $result = Connect::Connect()->query($query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getOneEntity($id)
    {
        $query = $this->buildQuery() . " WHERE entity.id = $id";
        $result = Connect::Connect()->query($query);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function deleteEntity($id)
    {
        Connect::Connect()->query("DELETE FROM `users` WHERE `users`.`id`='$id'");
    }

    public function addUsers($class_ru_id, $class_lat_id, $squad_ru_id, $squad_lat_id, $family_ru_id, $family_lat_id, $species_ru_id, $species_lat_id, $department_ru_id, $department_lat_id, $procedure_ru_id, $procedure_lat_id, $rarity_status_id, $park_id, $population, $habitat_features, $limiting_factors, $security_measures_taken, $species_state_changes, $species_conservation_measures)
    {
        Connect::Connect()->query("INSERT INTO `entity`(`id`, `class_ru_id`, `class_lat_id`, `squad_ru_id`, `squad_lat_id`, `family_ru_id`, `family_lat_id`, `species_ru_id`, `species_lat_id`, `department_ru_id`, `department_lat_id`, `procedure_ru_id`, `procedure_lat_id`, `rarity_status_id`, `park_id`, `population`, `habitat_features`, `limiting_factors`, `security_measures_taken`, `species_state_changes`, `species_conservation_measures`) VALUES ('$class_ru_id', '$class_lat_id', '$squad_ru_id', '$squad_lat_id', '$family_ru_id', '$family_lat_id', '$species_ru_id', '$species_lat_id', '$department_ru_id', '$department_lat_id', '$procedure_ru_id', '$procedure_lat_id', '$rarity_status_id', '$park_id', '$population', '$habitat_features', '$limiting_factors', '$security_measures_taken', '$species_state_changes', '$species_conservation_measures')");
    }


    public function redactUser($id, $email, $password, $avatar)
    {
        Connect::Connect()->query("UPDATE `users` SET `email`='$email',`password`='$password',`image`='$avatar' WHERE `id`='$id'") ? true : false;
    }

}