<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/TestTask/Styles/main.css">

    <title>Заявки</title>
</head>
<body>
    <div class="header">
        
        
        <a class="exitBtn" href="/TestTask/user/auth">Выход</a>
    </div>
    <div class="content">
        <?php
           
           
               echo "<div class=\"contentItem\">";
               if($isAdmin)
               {
                echo "<h2 class=\"requestID\">Заявка №$request[user_request_ID] от пользователя: $request[User_Name]</h2>";
               }
               else
               {
                echo "<h2 class=\"requestID\">Заявка №$request[user_request_ID]</h2>";
               }
               echo "<h3 class=\"requestName\">Название :$request[User_request_name]</h3>";
               echo "<h3 class=\"requestName\">Телефон :$request[User_request_phone]</h3>";
               echo "<p class=\"requestComment\">Комментарий: $request[user_request_comment]</p>";
               if($request['user_request_image']!="")
               {
                    echo "<img class=\"FullRequestIMG\" src=\"/TestTask/Uploads/$request[user_request_image]\" alt=\"Ошибка\">";

               }
               echo "<a class=\"checkRequest\" style=\"text-decoration:none;\" href=\"/TestTask/user/requests/\">вернуться</a>";
               echo "</div>";
            
        ?>
    </div>
</body>
</html>