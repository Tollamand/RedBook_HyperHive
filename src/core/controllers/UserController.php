<?php

namespace controllers;

use models\Entity;
use models\User;
use View\View;

class UserController
{

    public $view;
    public $user;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../views');
        $this->user = new User();
    }

    // **** Actions with the session ****
    public function auth()
    {
        $phone = $_POST['phone'];
        $this->user->loginUser($phone);
        header('location: /');
    }

    public function getUsers($namePage)
    {
        try {
            return $this->view->render("pages/admin/$namePage.php", ['AllUsers' => $this->user->getAllUsers()]);
        } catch (\Exception $e) {
            return $this->view->render("errors/error.php", ['error' => 'Не удалось получить список пользователей.']);
        }
    }

//    public function getUser($namePage, $id)
//    {
//        try {
//            return $this->view->render("pages/$namePage.php", ['OneUser' => $this->users->getOneUser($id)]);
//        } catch (\Exception $e) {
//            return $this->view->render("errors/error.php", ['error' => 'Не удалось получить информацию о пользователе.']);
//        }
//    }


    // **** Actions with users ****
    public function deleteUser()
    {
        $id = $_POST['id'];
        $this->user->deleteUser($id);
        header('location: /admin');
    }

    public function addUser()
    {
        $name = $_POST['name'];
        $middle_name = $_POST['middle_name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $this->user->addUsers($name, $middle_name, $surname, $phone, $email, $role);
        header('location: /admin');
    }

    public function updateUser()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $middle_name = $_POST['middle_name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $this->user->redactUser($id, $name, $middle_name, $surname, $phone, $email, $role);
        header ('location: /admin');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('location: /');
    }

}