<?php
include 'system/engine.php';
$engine->user->PermissionDeny([0, 2]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Hello, Admin.</p>
    <h1></h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>DESCRIT</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <form action="process.php" method="post">
                    <input type="hidden" name="req" value="backend.todo.create" />
                    <td>
                        <input type="text" placeholder="AUTO ID" disabled />
                    </td>
                    <td>
                        <input type="text" name="title" required />
                    </td>
                    <td>
                        <input type="text" name="des" required />
                    </td>
                    <td>
                        <button type="submit">Save</button>
                    </td>
                </form>
            </tr>

            <?php
            $todo_list = $engine->backend->ShowTodolist();
            foreach ($todo_list as $key => $todo) :
            ?>

                <tr>
                    <form action="process.php" method="post">
                        <input type="hidden" name="req" value="backend.todo.update" />
                        <input type="hidden" name="todo_id" value="<?php echo $todo->id; ?>" />
                        <td><?php echo $todo->id; ?></td>
                        <td>
                            <input type="text" name="title" value="<?php echo $todo->title; ?>" required />
                        </td>
                        <td>
                            <input type="text" name="des" value="<?php echo $todo->description; ?>" required />
                        </td>
                        <td>
                            <button type="submit">update</button>
                            <form action="process.php" method="post">
                                <input type="hidden" name="req" value="backend.todo.delete" />
                                <input type="hidden" name="todo_id" value="<?php echo $todo->id; ?>" />
                                <button type="submit">delete</button>
                            </form>
                        </td>
                    </form>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
    <button>
        <a href="index.php" class="">Go back to profile</a>
    </button>

</html>