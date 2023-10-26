<?php

    class Users Extends Database
    {

        public function login($user, $pass)
        {

            if(
                !empty($user) &&
                !empty($pass)
            ){

                $db = $this->connect();
                $sql = "SELECT * FROM `user` WHERE `user` = ?";
                $query = $db->prepare($sql);
                $execute = $query->execute([$user]);

                $result = $query->fetch(PDO::FETCH_OBJ);

                if($result->user == $user)
                {

                    if($result->pass == $pass)
                    {
                        $_SESSION['user'] = $result->id;
                        return true;
                    }else{
                        return false;
                    }

                }else{
                    return false;
                }

            }else{
                return false;
            }

        }

    }