<?php

//include_once ROOT.'/Models/Requests.php';
//include_once ROOT.'/Models/User.php';
//include_once ROOT.'/Models/toXML.php';


class RequestsController
{
    public function actionList()
    {
        $userId = User::sessionCheck();
        $isAdmin = User::sessionAdminCheck();
       
        $requestList = array();
        if($isAdmin == true)
        {
            $requestList = Requests::getAllRequests();
        }
        else
        {
            $requestList = Requests::getAllUserRequests($userId);
        }
        

        require_once(ROOT.'/Views/UserRequests/index.php');
        return true;
    }
    public function actionCheckRequest($requsetID)
    {
        $userId = User::sessionCheck();
        $isAdmin = User::sessionAdminCheck();
        $request = Requests::getThisUserRequest($userId,$requsetID[0],$isAdmin);
        if($request)
        {
            require_once(ROOT.'/Views/UserRequests/CheckRequest.php');
        }
        else{
            require_once(ROOT.'/Views/UserRequests/error404.php');
        }
        
        
        return true;

    }
    public function actionCreate()
    {
        $userId = User::sessionCheck();
        $isAdmin = User::sessionAdminCheck();
        if(isset($_POST['submit']))
        {
            $requestName = $_POST['requestName'];
            $userPhone = $_POST['userPhone'];
            $requestComment = $_POST['requestComment'];
            $requestImg = $_FILES['requestImg']['name'];
            $errors = false;
            if(!Requests::checkPhone($userPhone))
            {
                $errors[] = "Неправильный формат телефона";
            }
            if(!Requests::checkRequestName($requestName))
            {
                $errors[] = "имя заявки должно содержать минимум 3 символа";
            }
            if(!Requests::checkRequestComment($requestComment))
            {
                $errors[] = "комментарий не может быть пустым и должен содержать более 10 символов";
            }
            if(!$errors)
            {
                Requests::createNewRequest($requestName,$userPhone,$requestComment,$requestImg, $userId);
                if(isset($_FILES) && $_FILES['requestImg']['error'] == 0)
                { // Проверяем, загрузил ли пользователь файл
                    
                    $destiation_dir = ROOT.'\Uploads' .'/'.$_FILES['requestImg']['name']; // Директория для размещения файла
            
                    move_uploaded_file($_FILES['requestImg']['tmp_name'], $destiation_dir ); // Перемещаем файл в желаемую директорию
                   
                }
               
            }          
            
        }
        require_once(ROOT.'/Views/UserRequests/CreateRequest.php');
        return true;

    }
    public function actionCreateToXML()
    {
        $userId = User::sessionCheck();
        $isAdmin = User::sessionAdminCheck();
        if($isAdmin)
        {
            $requestList = Requests::getAllRequests();
           
            $dom_xml= new DomDocument();
            $dom_xml->loadXML(ArrayToXML::toXml($requestList)); 
            $path="auto.xml";
            $dom_xml->save($path);
            
            $result = "успешно сформирован XML";
            require_once(ROOT.'/Views/UserRequests/index.php');
        }
        else 
        {
            header("Location: /TestTask/user/auth");
        }
    }

}