<?php

    session_start();

    include 'database.php';
    include 'users.php';

    $engine = (object) [

        "db" => new Database,
        "user" => new Users,

    ];