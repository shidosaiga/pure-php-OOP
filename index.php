<?php include 'system/engine.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

        <?php if(empty($_SESSION['user'])) { ?>
            <form action="process.php" method="post">

                <input type="hidden" name="req" value="login" />
                
                <label for="">username</label>
                <input type="text" name="user" /><br />

                <label for="">password</label>
                <input type="password" name="pass" /><br />

                <button type="submit">Login</button>
                
            </form>
        <?php } ?>

        
        <?php if(!empty($_SESSION['user'])) {?>
            <form action="logout.php" method="post">
                <button type="submit">
                    Logout
                </button>
            </form>
        <?php } ?>

        <?php 

            if(!empty($_SESSION['user']))
            {
                echo 'Login Success';
            }else{
                echo "<p>if you don't have account. click here <a href='Register.php' >Register</a></p>";
            }

        ?>

    </body>
</html>

