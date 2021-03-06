<?php

class Requests
{
    public static function getAllUserRequests($id)
    {
        
        $db = DB::getConnection();
        $requestList = array();

        $query = "SELECT * FROM user_request Where User_id=:userID ORDER BY user_request_ID DESC";
        $result = $db->prepare($query);
        $result->bindParam(':userID', $id, PDO::PARAM_STR);
        $result->execute();
        $i = 0;
        while($row = $result->fetch()){
            $requestList[$i]['User_id'] = $row['User_id'];
            $requestList[$i]['user_request_ID'] = $row['user_request_ID'];
            $requestList[$i]['User_request_name'] = $row['User_request_name'];
            $requestList[$i]['User_request_phone'] = $row['User_request_phone'];
            $requestList[$i]['user_request_comment'] = $row['user_request_comment'];
            $requestList[$i]['user_request_image'] = $row['user_request_image'];
            $i++;
        }
        return $requestList;
    }
    public static function getAllRequests()
    {
        
        $db = DB::getConnection();
        $requestList = array();

        $result = $db->query("SELECT user_request_ID,User_request_name,User_request_phone,user_request_comment,user_request_image,User_Name FROM user_request, users WHERE users.User_id=user_request.User_id ORDER BY user_request_ID DESC");
        
        $i = 0;
        while($row = $result->fetch()){
            $requestList[$i]['User_Name'] = $row['User_Name'];
            $requestList[$i]['user_request_ID'] = $row['user_request_ID'];
            $requestList[$i]['User_request_name'] = $row['User_request_name'];
            $requestList[$i]['User_request_phone'] = $row['User_request_phone'];
            $requestList[$i]['user_request_comment'] = $row['user_request_comment'];
            $requestList[$i]['user_request_image'] = $row['user_request_image'];
            $i++;
        }
        return $requestList;
    }
    public static function getThisUserRequest($User_id, $user_request_ID,$isAdmin)
    {
        $db = DB::getConnection();
        if(!$isAdmin)
        {
            $query = "SELECT * FROM user_request Where User_id=:userID AND user_request_ID=:userRequestID"; 
            $result = $db->prepare($query);
            $result->bindParam(':userID', $User_id, PDO::PARAM_STR);
            $result->bindParam(':userRequestID', $user_request_ID, PDO::PARAM_STR);
            $result->execute();
        }
        else
        {
            $result = $db->query("SELECT user_request_ID,User_request_name,User_request_phone,user_request_comment,user_request_image,User_Name FROM user_request, users WHERE users.User_id=user_request.User_id AND user_request_ID=$user_request_ID"); 

        }
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $requestItem = $result->fetch();
        return $requestItem;
    }
    public static function checkPhone($phone)
    {
        if(strlen($phone)>10)
        {
            if(preg_match("/[0-9]{11}/", $phone))
            {
                return true;
                
            }
            return false;
        }
            
        return false;
    }
    public static function checkRequestName($requestName)
    {
        if(strlen($requestName)>3)
        {
           
            return true;
           
        }
            
        return false;
    }
    public static function checkRequestComment($requestComment)
    {
        if(strlen($requestComment)>10)
        {
           
                return true;
            
        }
            
        return false;
    }
    public static function createNewRequest($requestName,$userPhone,$requestComment,$requestImg, $userID)
    {
        $db = DB::getConnection();
        $query = "INSERT INTO `user_request`(`User_id`, `User_request_name`, `User_request_phone`, `user_request_comment`, `user_request_image`) VALUES (:userID,:requestName,:userPhone,:requestComment,:requestImg)";
        $result = $db->prepare($query);
        $result->bindParam(':userID', $userID, PDO::PARAM_STR);
        $result->bindParam(':requestName', $requestName, PDO::PARAM_STR);
        $result->bindParam(':userPhone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':requestComment', $requestComment, PDO::PARAM_STR);
        $result->bindParam(':requestImg', $requestImg, PDO::PARAM_STR);

        $result->execute();
        header("Location: /TestTask/user/requests");
    }
  
}