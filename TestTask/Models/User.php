<?php

class User
{

    public static function authorization($userName,$userPass)
    {
        $db = DB::getConnection();
        $query = "SELECT User_id, Is_Admin FROM users WHERE User_Name=:userName AND user_password=:userPass";
        $result = $db->prepare($query);
        $result->bindParam(':userName', $userName, PDO::PARAM_STR);
        $result->bindParam(':userPass', $userPass, PDO::PARAM_STR);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $user=$result->fetch();

        if($user)
        {
            return $user;
        }
        return false;
    }
    public static function sessionAuth($user, $Name)
    {
        session_start();
        $_SESSION['User_id']=$user['User_id'];
        $_SESSION['Is_Admin']=$user['Is_Admin'];
        $_SESSION['User_Name']=$Name;
       
    }
    public static function sessionCheck()
    {
        session_start();
      
        if(isset($_SESSION['User_id']))
        {
            return $_SESSION['User_id'];
        }
        header("Location: /TestTask/user/auth");
    
    }
    public static function sessionAdminCheck()
    {
       
        if(isset($_SESSION['Is_Admin']))
        {
            return $_SESSION['Is_Admin'];
        }
        header("Location: /TestTask/user/auth");
    
    }
    public static function sessionLogout()
    {
        session_start();
        unset($_SESSION['User_id']);
        unset($_SESSION['Is_Admin']);
      
    }
    public static function register($userName,$userPass)
    {
        $db = DB::getConnection();
        $query = "INSERT INTO `users`(`User_Name`, `Is_Admin`, `user_password`) VALUES (:userName, 0, :userPass)";
        $result = $db->prepare($query);
        $result->bindParam(':userName', $userName, PDO::PARAM_STR);
        $result->bindParam(':userPass', $userPass, PDO::PARAM_STR);
        $result->execute();
    }
    public static function checkLogin($userName)
    {
        if(strlen($userName)>=3)
        {
            if(preg_match("/[0-9a-z_]/i", $userName))
            {
                return true;
            }
            return false;
        }
        return false;
    }
    public static function checkPass($userPass)
    {
        if(strlen($userPass)>=6)
        {
            if(preg_match("/[0-9a-z_]/i", $userPass))
            {
                return true;
            }
            return false;
        }
        return false;
    }
    public static function checkExistsLogin($userName)
    {
        $db = DB::getConnection();
        $query = "SELECT COUNT(*) FROM users WHERE User_Name=:userName";
        $result = $db->prepare($query);
        $result->bindParam(':userName', $userName, PDO::PARAM_STR);
        $result->execute();
        $count=$result->fetchColumn();
        
        if($count==0)
        {
            return true;
        }
        return false;
    }
}