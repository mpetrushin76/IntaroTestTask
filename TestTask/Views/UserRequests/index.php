<?php
    include ROOT.'/Views/layouts/head.php';
    include ROOT.'/Views/layouts/header.php';
?>
<body>
    
    
    <div class="content">
        <?php
            if(isset($result))
            {
        ?>
        
               <p class="errors"><?= $result ?></p>
        <?php
            }
        ?>
        <?php
            foreach($requestList as $item)
            {  
        ?>
            <div class="contentItem">
                <?php
                     if($isAdmin)
                     { 
                ?>
                    <h2 class="requestID"><?= "Заявка №$item[user_request_ID] от пользователя: $item[User_Name]";?></h2>
                <?php
                     } else 
                     {
                ?>
                    <h2 class="requestID"><?= "Заявка №$item[user_request_ID]"; ?></h2>
                <?php
                     }
                ?>
                <h3 class="requestName"><?= "Название :$item[User_request_name]"; ?></h3>
                <p class="requestComment"><?= "Комментарий: $item[user_request_comment]"; ?></p>
                <?php
                    if($item['user_request_image']!="")
                    {
                ?>
                    <img class="requestIMG" src="/TestTask/Uploads/<?= $item['user_request_image']; ?>" alt="Ошибка">
                <?php
                    }
                ?>
                <a class="checkRequest" style="text-decoration:none;" href="/TestTask/user/requests/<?= $item['user_request_ID']; ?>">посмотреть</a>
            </div>
        <?php
            }
        ?>
    </div>
</body>
</html>