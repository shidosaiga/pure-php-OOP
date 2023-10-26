<?php include 'system/engine.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="login.php" method="post">
            <label for="">username</label>
            <input type="text" name="user" /><br />
            <label for="">password</label>
            <input type="password" name="pass" /><br />
            <button type="submit">Login</button>
        </form>

        <?php 

            if(!empty($_SESSION['user']))
            {
                echo 'Login Success';
            }

        ?>

    </body>
</html>

