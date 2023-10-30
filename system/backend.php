<?php

class Backend Extends Database
{

    public function ShowTodolist() 
    { 

        $db = $this->connect();
        $sql = "SELECT * FROM `todo` ORDER BY `id`";
        $query = $db->prepare($sql);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $result;

    }

    public function TodoInsert($title, $des)
    { 

        if (
            !empty($title) &&
            !empty($des)
        ){

            $db = $this->connect();

            $sql = "INSERT INTO `todo`(`title`, `description`) VALUES(?,?)";
            $query = $db->prepare($sql);
            $execute = $query->execute([$title, $des]);

            $lastId = $db->lastInsertId();

            if(!empty($lastId))
            {
                echo '<script> alert("สร้างรายการ todo สำเร็จ"); </script>';
                header("Refresh:0; url=test.php");
            }else{
                echo '<script> alert("สร้างรายการ todo ไม่สำเร็จ"); </script>';
                header("Refresh:0; url=test.php");
            }

        } else {
            echo '<script> alert("ผิดพลาด โปรดลองใหม่"); </script>';
            header("Refresh:0; url=test.php");
        }

    }

    public function TodoUpdate($title, $des, $id)
    { 

        if (
            !empty($title) &&
            !empty($des) &&
            !empty($id)
        ){

            $db = $this->connect();

            $sql = "UPDATE `todo` SET `title` = ?, `description`= ? WHERE `id` = ?";
            $query = $db->prepare($sql);
            $execute = $query->execute([$title, $des, $id]);

            if($execute)
            {
                echo '<script> alert("แก้ไขรายการ todo สำเร็จ"); </script>';
                header("Refresh:0; url=test.php");
            }else{
                echo '<script> alert("แก้ไขรายการ todo ไม่สำเร็จ"); </script>';
                header("Refresh:0; url=test.php");
            }

        } else {
            echo '<script> alert("ผิดพลาด โปรดลองใหม่"); </script>';
            header("Refresh:0; url=test.php");
        }

    }

    public function TodoDelete($id)
    { 

        if (
            !empty($id)
        ){

            $db = $this->connect();

            $sql = "DELETE FROM `todo` WHERE `id` = ?";
            $query = $db->prepare($sql);
            $execute = $query->execute([$id]);

            if($execute)
            {
                echo '<script> alert("ลบรายการ todo สำเร็จ"); </script>';
                header("Refresh:0; url=test.php");
            }else{
                echo '<script> alert("ลบรายการ todo ไม่สำเร็จ"); </script>';
                header("Refresh:0; url=test.php");
            }

        } else {
            echo '<script> alert("ผิดพลาด โปรดลองใหม่"); </script>';
            header("Refresh:0; url=test.php");
        }

    }


}
