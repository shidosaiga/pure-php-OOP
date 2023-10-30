<?php

class Users extends Database
{

    public function PermissionDeny($permit = [])
    {

        if(!empty($_SESSION['user']))
        {

            $user_login = $_SESSION['user'];

            $db = $this->connect();
            $sql = "SELECT * FROM `user` WHERE `id` = ?";
            $query = $db->prepare($sql);
            $query->execute([$user_login]);
            
            $result = $query->fetch(PDO::FETCH_OBJ);

            if(!empty($permit)){
                
                foreach ($permit as $permit_array) 
                {

                    if($result->permission == $permit_array)
                    {
                        echo '<script> alert("คุณไม่สามารถเข้าถึงหน้านี้ได้"); </script>';
                        header("Refresh:0; url=index.php");
                    }

                }

            }

        }else{
            echo '<script> alert("โปรดเข้าสู่ระบบ"); </script>';
            header("Refresh:0; url=index.php");
        }

    }

    public function Permission()
    {

        if(!empty($_SESSION['user']))
        {

            $user_login = $_SESSION['user'];

            $db = $this->connect();
            $sql = "SELECT * FROM `user` WHERE `id` = ?";
            $query = $db->prepare($sql);
            $query->execute([$user_login]);
            
            $result = $query->fetch(PDO::FETCH_OBJ);

            return $result->permission;

        }else{
            return false;
        }

    }

    public function login($user, $pass)
    {

        if (
            !empty($user) &&
            !empty($pass)
        ){

            $db = $this->connect();
            $sql = "SELECT * FROM `user` WHERE `user` = ?";
            $query = $db->prepare($sql);
            $query->execute([$user]);

            $result = $query->fetch(PDO::FETCH_OBJ);

            if ($result->user == $user) {

                if ($result->pass == $pass) {

                    $_SESSION['user'] = $result->id;

                    echo '<script> alert("เข้าสู่ระบบเรียบร้อย"); </script>';
                    header("Refresh:0; url=index.php");
                    
                } else {
                    echo '<script> alert("ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง"); </script>';
                    header("Refresh:0; url=index.php");
                }

            } else {
                echo '<script> alert("ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง"); </script>';
                header("Refresh:0; url=index.php");
            }

        } else {
            echo '<script> alert("โปรดกรอกชื่อผู้ใช้ หรือ รหัสผ่าน"); </script>';
            header("Refresh:0; url=index.php");
        }
        
    }

    public function register($user, $pass, $pass_confrim)
    {

        if (
            !empty($user) &&
            !empty($pass) &&
            !empty($pass_confrim)
        ){

            $db = $this->connect();
            $sql = "SELECT * FROM `user` WHERE `user` = ?";
            $query = $db->prepare($sql);
            $query->execute([$user]);

            $result = $query->fetch(PDO::FETCH_OBJ);
            if ($pass == $pass_confrim){
               
                if ($result->user != $user) {

                    $sql = "INSERT INTO `user`(`user`, `pass`) VALUES(:username, :passwd)";
                    $query = $db->prepare($sql);
                    $query->bindParam(':username', $user, PDO::PARAM_STR);
                    $query->bindParam(':passwd', $pass, PDO::PARAM_STR);
                    $query->execute();
    
                    $lastId = $db->lastInsertId();
    
                    $_SESSION['user'] = $lastId;
    
                    echo '<script> alert("เข้าสู่ระบบเรียบร้อย"); </script>';
                    header("Refresh:0; url=index.php");
    
                } else {
                    echo '<script> alert("มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว, โปรดใช้ชื่อผู้ใช้ใหม่"); </script>';
                    header("Refresh:0; url=register.php");
                }

            }else{
                echo '<script> alert("โปรดยืนยันรหัสผ่าน"); </script>';
            header("Refresh:0; url=register.php");
            }

        } else {
            echo '<script> alert("โปรดกรอกชื่อผู้ใช้ กับ รหัสผ่าน, ยืนยันรหัสผ่าน"); </script>';
            header("Refresh:0; url=register.php");
        }
        
    }


}
