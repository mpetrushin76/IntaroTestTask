<?php



?>
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
        <?php
            if($isAdmin)
            {
                echo "<p class=\"userType\">Администратор</p>";

                echo "<a class=\"exitBtn\" href=\"/TestTask/user/requests/toXML\">Заявки в XML</a>";

                echo "<a class=\"exitBtn\" href=\"/TestTask/user/requests/create\">Создать новую заявку</a>";
            }
            else
            {
                echo "<a class=\"exitBtn\" href=\"/TestTask/user/requests/create\">Создать новую заявку</a>";

                echo "<p class=\"userType\">Пользователь</p>";
            }
        ?>
        
        <a class="exitBtn" href="/TestTask/user/auth">Выход</a>
    </div>
    <div class="content">

        <?php
            if(isset($result))
            {
                echo "<p class=\"errors\">$result</p>";
            }
            foreach($requestList as $item)
            {  
               echo "<div class=\"contentItem\">";
               if($isAdmin)
               {
                echo "<h2 class=\"requestID\">Заявка №$item[user_request_ID] от пользователя: $item[User_Name]</h2>";
               }
               else
               {
                echo "<h2 class=\"requestID\">Заявка №$item[user_request_ID]</h2>";
               }
               echo "<h3 class=\"requestName\">Название :$item[User_request_name]</h3>";
               echo "<p class=\"requestComment\">Комментарий: $item[user_request_comment]</p>";
               if($item['user_request_image']!="")
               {
                    echo "<img class=\"requestIMG\" src=\"/TestTask/Uploads/$item[user_request_image]\" alt=\"Ошибка\">";

               }
               echo "<a class=\"checkRequest\" style=\"text-decoration:none;\" href=\"/TestTask/user/requests/$item[user_request_ID]\">посмотреть</a>";
               echo "</div>";
            }
        ?>
    </div>
</body>
</html>