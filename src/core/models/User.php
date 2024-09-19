<?php

namespace models;

use services\Connect;

class User
{

    // **** Actions with the session ****
    public function loginUser($phone)
    {
        if ($phone == null)
        {
            die("Поля пустые");
        }
        $user = mysqli_fetch_assoc(Connect::Connect()->query("SELECT * FROM `users` JOIN `roles` ON users.role_id = roles.id WHERE users.phone = '$phone'"));
        if($user){
            $_SESSION["user"] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'middle_name' => $user['middle_name'],
                'surname' => $user['surname'],
                'password' => $user['password'],
                'role' => $user['role_id']
            ];
        } else {
            die("Пользователь $phone не найден");
        }
    }

    public function getAllUsers()
    {
        $query = Connect::Connect()->query("SELECT * FROM `users` JOIN `roles` ON users.role_id = roles.id");
        if(!$query){
            throw new \Exception();
        }
        return mysqli_fetch_all($query);
    }

    public function redactUser($id, $name, $middle_name, $surname, $phone, $email, $role)
    {
        $id_role = mysqli_fetch_assoc(Connect::Connect()->query("SELECT * FROM `roles` WHERE role = '$role'"))['id'];
        Connect::Connect()->query("UPDATE `users` SET `name`='$name',`middle_name`='$middle_name',`surname`='$surname',`phone`='$phone',`email`='$email', `role_id` = '$id_role' WHERE `id`='$id'");
    }

    public function deleteUser($id)
    {
        Connect::Connect()->query("DELETE FROM `users` WHERE `users`.`id`='$id'");
    }

    public function addUsers($name, $middle_name, $surname, $phone, $email, $role)
    {
        $id_role = mysqli_fetch_assoc(Connect::Connect()->query("SELECT * FROM `roles` WHERE role = '$role'"))['id'];
        Connect::Connect()->query("INSERT INTO `users`(`name`, `middle_name`, `surname`, `phone`, `email`, `role_id`) VALUES ('$name','$middle_name','$surname','$phone','$email','$id_role')");
    }

}