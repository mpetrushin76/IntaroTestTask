<?php
    include ROOT.'/Views/layouts/head.php';
?> 
    <title>Заявки</title>
</head>
<body>
    
    <?php 
        include ROOT.'/Views/layouts/header.php';
    ?>
    <div class="content">
        <?php
            if(isset($result))
            {
                echo "<p class=\"errors\">$result</p>";
            }
            foreach($requestList as $item)
            {  
        ?>
            <div class="contentItem">
                <?php
                     if($isAdmin)
                     { 
                ?>
                    <h2 class="requestID"><?php echo "Заявка №$item[user_request_ID] от пользователя: $item[User_Name]";?></h2>
                <?php
                     }else {
                ?>
                    <h2 class="requestID"><?php echo "Заявка №$item[user_request_ID]"; ?></h2>
                <?php
                     }
                ?>
                <h3 class="requestName"><?php echo "Название :$item[User_request_name]"; ?></h3>
                <p class="requestComment"><?php echo "Комментарий: $item[user_request_comment]"; ?></p>
                <?php
                    if($item['user_request_image']!="")
                    {
                ?>
                    <img class="requestIMG" src="/TestTask/Uploads/<?php echo $item['user_request_image']; ?>" alt="Ошибка">
                <?php
                    }
                ?>
                <a class="checkRequest" style="text-decoration:none;" href="/TestTask/user/requests/<?php echo $item['user_request_ID']; ?>">посмотреть</a>
            </div>
        <?php
            }
        ?>
    </div>
</body>
</html>