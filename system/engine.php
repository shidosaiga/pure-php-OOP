<?php

    session_start();

    include 'database.php';
    include 'users.php';
    include 'backend.php';

    $engine = (object) [

        "db" => new Database,
        "user" => new Users,
        "backend" => new Backend,

    ];