<?php

//include_once ROOT.'/Models/User.php';

class UserController
{
    public function actionRegister()
    {
        $userName='';
        $userPass='';
        $result = false;
        if(isset($_POST['submit']))
        {
           $errors = false;
           $userName = $_POST['userName'];
           $userPass = $_POST['userPass'];
           if(!User::checkLogin($userName))
           {
                $errors[] = "логин должен содержать 3 и более символа, и содержать символы A-z,0-9";
           }
           if(!User::checkPass($userPass))
           {
                $errors[] = "пароль должен содержать 6 и более символов, и содержать символы A-z,0-9";
           }
           if (!User::checkExistsLogin($userName))
           {
                $errors[] = "такой логин уже существует";
           }
           if(!$errors)
           {
                 User::register($userName,$userPass);
                 $result = true;
                 $errors[] = "вы успешно зарегестрированы";
           }
        }
        require_once(ROOT.'/Views/User/register.php');
    }
    public function actionNotFound()
    {
   
          require_once(ROOT.'/Views/UserRequests/error404.php');
    }
    public function actionLogin()
    {
          User::sessionLogout();
          $userName='';
          $userPass='';
          if(isset($_POST['submit']))
          {
               $errors = false;
               $userName = $_POST['userName'];
               $userPass = $_POST['userPass'];
               $user = User::authorization($userName,$userPass);
               if($user == false)
               {
                    $errors[]="неправильные данные или пользователя не существует";
               }
               else
               {
                    User::sessionAuth($user, $userName);
                    header("Location: /TestTask/user/requests");
               }
          }
          require_once(ROOT.'/Views/User/login.php');
    }
}