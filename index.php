<?php include 'system/engine.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php if (empty($_SESSION['user'])) { ?>
        <form action="process.php" method="post">

            <input type="hidden" name="req" value="login" />
            <label for="">username</label>
            <input type="text" name="user" /><br />
            <label for="">password</label>
            <input type="password" name="pass" /><br />
            <button type="submit">Login</button>

        </form>
    <?php } ?>




    <?php
    if (
        $engine->user->Permission() == 1
    ) { ?>
        <button>
            <a href="test.php" class="">Backend</a>
        </button>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>PASS</th>

                </tr>
            </thead>
            <tbody>

                <!-- <tr>
                    <form action="process.php" method="post">
                        <input type="hidden" name="req" value="backend.todo.create" />
                        <td>
                            <input type="text" placeholder="AUTO ID" disabled />
                        </td>
                        <td>
                            <input type="text" name="title" required />
                        </td>
                       
                    </form>
                </tr> -->

                <?php
                $showuser = $engine->backend->ShowUsers();
                foreach ($showuser as $key => $user) :
                ?>

                    <tr>
                        <form action="process.php" method="post">
                            <!-- <input type="hidden" name="req" value="backend.todo.update" />
                            <input type="hidden" name="todo_id" value="<?php echo $user->id; ?>" /> -->
                            <td><?php echo $user->id; ?></td>
                            <td>
                                <?php echo $user->user; ?>
                            </td>
                            <td>
                                <?php echo $user->pass; ?>
                            </td>

                        </form>
                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>
    <?php } ?>

    <?php

    if (!empty($_SESSION['user'])) {
        echo 'Login Success';
    } else {
        echo "<p>if you don't have account. click here <a href='Register.php' >Register</a></p>";
    }

    ?>

    <?php if (!empty($_SESSION['user'])) { ?>
        <form action="logout.php" method="post">
            <button type="submit">
                Logout
            </button>
        </form>
    <?php } ?>

</body>

</html>