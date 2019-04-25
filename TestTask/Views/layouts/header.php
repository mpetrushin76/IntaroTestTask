<?php 
    $Welcome="";
    if(!isset($isAdmin)) {
        $Welcome = "Гость";
    } elseif ($isAdmin){
        $Welcome = "Администратор: " . $_SESSION['User_Name'];
    } else {
        $Welcome = "Пользователь: " . $_SESSION['User_Name'];
    }
?> 

<div class="header">
            <p class="userType">Вы авторизованы как <?php echo $Welcome;?></p>
        <?php if(!isset($isAdmin)) { ?>
            <a class="exitBtn" href="/TestTask/user/register">Регистрация</a>     
        <?php } else{ 
            if ($isAdmin){ ?>
            <a class="exitBtn" href="/TestTask/user/requests/toXML">Заявки в XML</a>
            <a class="exitBtn" href="/TestTask/user/requests/create">Создать новую заявку</a>
            <a class="exitBtn" href="/TestTask/user/requests">Мои заявки</a>
            <a class="exitBtn" href="/TestTask/user/auth">Выход</a>
            <?php } else {
            ?>
            <a class="exitBtn" href="/TestTask/user/requests/create">Создать новую заявку</a>
            <a class="exitBtn" href="/TestTask/user/requests">Мои заявки</a>
            <a class="exitBtn" href="/TestTask/user/auth">Выход</a>
            <?php }}
            ?>
         
        
        
        
</div>

