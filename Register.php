<?php include 'system/engine.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
        <form action="process.php" method="post">
            <input type="hidden" name="req" value="register" />
            <label for="">username</label>
            <input type="text" name="user" /><br />
            <label for="">password</label>
            <input type="password" name="pass" /><br />
            <label for="">comfirm password</label>
            <input type="password" name="confrim_pass" /><br />
            <button type="submit"name ="regis">register</button>
            <p>if you have account.  <a href="index.php">
                click here</a>
            </p>
        </form>
        
    </body>
</html>

