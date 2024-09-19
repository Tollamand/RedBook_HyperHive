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
    ];

    private function buildQuery()
    {
        $baseQuery = "SELECT *";
        $joins = " FROM `entity` ";
        foreach ($this->tables as $table => $onCondition) {
            $joins .= " JOIN $table ON $onCondition";
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

//    public function deleteUser($id, $path)
//    {
//        Connect::Connect()->query("DELETE FROM `users` WHERE `users`.`id`='$id'");
//    }
//    public function addUsers($email, $password, $avatar)
//    {
//        Connect::Connect()->query("INSERT INTO `users`(`id`, `email`, `password`, `image`) VALUES (NULL,'$email','$password','$path')");
//    }
//    public function redactUser($id, $email, $password, $avatar)
//    {
//        Connect::Connect()->query("UPDATE `users` SET `email`='$email',`password`='$password',`image`='$avatar' WHERE `id`='$id'") ? true : false;
//    }
//
//    // **** Actions with the session ****
//    public function loginUser($email, $password)
//    {
//        if ($email == null || $password == null)
//        {
//            die("Поля пустые");
//        }
//        $user = mysqli_fetch_assoc(Connect::Connect()->query("SELECT * FROM `users` WHERE email = '$email'"));
//        if(!$user){
//            die("Пользователь $email не найден");
//        }
////        if($user['email'] == $email && $user['password'] == $password)
//        if(password_verify($password, $user['password']))
//        {
//            $_SESSION["user"] = [
//                'id' => $user['id'],
//                'email' => $user['email'],
//                'password' => $user['password'],
//                'role' => $user['role']
//            ];
//        } else {
//            die("Неверный логин или пароль");
//        }
//    }
//    public function registerUser($email, $password, $confirm_password)
//    {
//        if ($password!==$confirm_password){
//            die("Пароли не совпали");
//        } elseif ($email==null || $password==null){
//            die("Поля пустые");
//        }
//        $mbUser = mysqli_fetch_assoc(Connect::Connect()->query("SELECT * FROM `users` WHERE `users` . `email`='$email'"));
//        if ($mbUser){
//            die("Такой пользователь уже есть");
//        } else {
//            $pass = password_hash($password, PASSWORD_DEFAULT);
//            $query = Connect::Connect()->query("INSERT INTO `users`(`id`,`email`,`password`) VALUES (NULL,'$email','$pass')");
//            if (!$query)
//            {
//                die ('Ошибка регистрации');
//            }
//        }
//    }

}