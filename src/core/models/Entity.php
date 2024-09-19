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

            // Используем LEFT JOIN вместо JOIN, чтобы сохранить строки из основной таблицы
            if ($this->isFieldNotNull($field)) {
                $joins .= " LEFT JOIN $table ON $onCondition";
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

    public function addEntity($class_ru_id, $class_lat_id, $species_ru_id, $species_lat_id, $rarity_status_id, $population)
    {
        $status_id = mysqli_fetch_assoc(Connect::Connect()->query("SELECT * FROM `rarity_status` WHERE status = '$rarity_status_id'"))['id'];
        $class_lat = $this->queryTable("class_lat", "class_lat", $class_lat_id);
        $class_ru = $this->queryTable("class_ru", "class_ru", $class_ru_id);
        $species_ru = $this->queryTable("species_ru", "species_ru", $species_ru_id);
        $species_lat = $this->queryTable("species_lat", "species_lat", $species_lat_id);
        Connect::Connect()->query("INSERT INTO `entity`(`class_ru_id`, `class_lat_id`, `species_ru_id`, `species_lat_id`, `rarity_status_id`, `population`) VALUES ('$class_ru', '$class_lat', '$species_ru', '$species_lat', '$status_id', '$population')");
    }

    public function redactEntity($id, $class_ru_id, $class_lat_id, $species_ru_id, $species_lat_id, $rarity_status_id, $population)
    {
        $status_id = mysqli_fetch_assoc(Connect::Connect()->query("SELECT * FROM `rarity_status` WHERE status = '$rarity_status_id'"))['id'];
        $class_lat = $this->queryTable("class_lat", "class_lat", $class_lat_id);
        $class_ru = $this->queryTable("class_ru", "class_ru", $class_ru_id);
        $species_ru = $this->queryTable("species_ru", "species_ru", $species_ru_id);
        $species_lat = $this->queryTable("species_lat", "species_lat", $species_lat_id);
        Connect::Connect()->query("UPDATE `entity` SET `class_ru_id`='$class_ru',`class_lat_id`='$class_lat', `species_ru_id`=$species_ru, `species_lat_id`=$species_lat, `rarity_status_id`=$status_id, `population`=$population WHERE `id`='$id'");
    }

    public function queryTable($table_name, $column_name,$value) {
        if (Connect::Connect()->query("INSERT INTO $table_name ($column_name) VALUES ('$value')")) {
            return mysqli_fetch_assoc(Connect::Connect()->query("SELECT id FROM `$table_name` WHERE $column_name = '$value'"))['id'];
        } else {
            return null;
        }
    }

}