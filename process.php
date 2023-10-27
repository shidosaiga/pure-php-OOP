<?php 

    include 'system/engine.php';

    switch ($_POST['req']) {

        case "login":

            $engine->user->login($_POST['user'], $_POST['pass']);

        break;

        case "register":

            $engine->user->register($_POST['user'], $_POST['pass'], $_POST['confrim_pass']);

        break;

        default:
            echo "Request is not working.";

    }
