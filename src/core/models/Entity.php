<?php

namespace models;

use services\Connect;

class Entity {

    // **** Actions with users ****
    public function getAllEntity()
    {
        $query = Connect::Connect()->query("SELECT * FROM `entity`");
        return mysqli_fetch_all($query);
    }

    public function getOneEntity($id)
    {
        $query = Connect::Connect()->query("SELECT * FROM `entity` where id = '$id'");
        return mysqli_fetch_assoc($query);
    }

//    public function getOneUser($id)
//    {
//        $query = Connect::Connect()->query("SELECT * FROM `users` where id = '$id'");
//        if(!$query){
//            throw new \Exception();
//        }
//        return mysqli_fetch_assoc($query);
//    }
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