<?php

namespace models;

use services\Connect;

class Tables
{

    public function getAllStatus()
    {
        return mysqli_fetch_all(Connect::Connect()->query("SELECT * FROM `rarity_status`"));
    }



}