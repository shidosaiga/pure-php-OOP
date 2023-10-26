<?php 

    include 'system/engine.php';

    if(
        !empty($_POST['user']) &&
        !empty($_POST['pass'])
    )
    {

        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $login = $engine->user->login($user, $pass);

        if($login == true)
        {
            print '<script> alert("เข้าสู่ระบบสำเร็จ"); </script>';
            header("refresh: 0; url=index.php");
        }else{
            print '<script> alert("เข้าสู่ระบบไม่สำเร็จ"); </script>';
            header("refresh: 0; url=index.php");
        }

    }else{
        print '<script> alert("ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง"); </script>';
        header("refresh: 0; url=index.php");
    }