<?php
    include ROOT.'/Views/layouts/head.php';
    include ROOT.'/Views/layouts/header.php';
?>
<body>
   
    <div class="content">
        <div class="contentItem">
            <?php
               if($isAdmin)
               {
            ?>
                <h2 class="requestID"><?= "Заявка №$request[user_request_ID] от пользователя: $request[User_Name]"; ?></h2>
            <?php 
                } else
                {
            ?>
                <h2 class="requestID"><?= "Заявка №$request[user_request_ID]"; ?></h2>
            <?php  
                }
            ?>
               <h3 class="requestName"><?= "Название :$request[User_request_name]"; ?></h3>
               <h3 class="requestName"><?= "Телефон :$request[User_request_phone]"; ?></h3>
               <p class="requestComment"><= "Комментарий: $request[user_request_comment]"; ?></p>
            <?php
               if($request['user_request_image']!="")
               {
            ?>
                <img class="FullRequestIMG" src="/TestTask/Uploads/<?= $request['user_request_image']; ?>" alt="Ошибка">

            <?php  }?>
               <a class="checkRequest" style="text-decoration:none;" href="/TestTask/user/requests/">вернуться</a>
              
            
        
        </div>
    </div>
</body>
</html>