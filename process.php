<?php 

    include 'system/engine.php';

    switch ($_POST['req']) {

        case "login":

            $engine->user->login($_POST['user'], $_POST['pass']);
           
        break;

        case "register":

            $engine->user->register($_POST['user'], $_POST['pass'], $_POST['confrim_pass']);

        break;

        case "backend.todo.create":

            $engine->backend->TodoInsert($_POST['title'], $_POST['des']);

        break;

        case "backend.todo.update":

            $engine->backend->TodoUpdate($_POST['title'], $_POST['des'], $_POST['todo_id']);

        break;

        case "backend.todo.delete":

            $engine->backend->TodoDelete($_POST['todo_id']);

        break;

        default:
            echo "Request is not working.";

    }
?>