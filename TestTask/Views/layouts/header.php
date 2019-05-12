<?php 
    session_start();
    
    $Welcome="";
    if(!isset($_SESSION['Is_Admin'])) {
        $Welcome = "Гость";
    } elseif ($_SESSION['Is_Admin']){
        $Welcome = "Администратор: " . $_SESSION['User_Name'];
    } else {
        $Welcome = "Пользователь: " . $_SESSION['User_Name'];
    }
?> 

<div class="header">
        <p class="userType">Вы авторизованы как <?php echo $Welcome;?></p>
        <?php if(!isset($_SESSION['Is_Admin'])) 
        { 
                if(preg_match("~register~", trim($_SERVER["REQUEST_URI"], '/'))) 
                { ?>
                    <a class="exitBtn" href="/TestTask/user/auth">Авторизация</a>   
                <?php 
                } else 
                {?>
                    <a class="exitBtn" href="/TestTask/user/register">Регистрация</a>     
                <?php 
                } 
        } else
        { 
            if ($_SESSION['Is_Admin'])
            { ?>
            <a class="exitBtn" href="/TestTask/user/requests/toXML">Заявки в XML</a>
            <a class="exitBtn" href="/TestTask/user/requests/create">Создать новую заявку</a>
            <a class="exitBtn" href="/TestTask/user/requests">Мои заявки</a>
            <a class="exitBtn" href="/TestTask/user/logout">Выход</a>
            <?php 
            } else 
            {
            ?>
            <a class="exitBtn" href="/TestTask/user/requests/create">Создать новую заявку</a>
            <a class="exitBtn" href="/TestTask/user/requests">Мои заявки</a>
            <a class="exitBtn" href="/TestTask/user/logout">Выход</a>
        <?php 
            }
        }
        ?>
         
        
        
        
</div>

