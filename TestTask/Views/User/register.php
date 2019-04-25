<?php
    include ROOT.'/Config/head.php';
?>
    <title>Регистрация</title>
</head>
<body>
<div class="header">
        <?php
                echo "<a class=\"exitBtn\" href=\"/TestTask/user/auth\">Вход</a>";
        ?>
</div>
    <form action="" method="post">
        <?php 
            if(isset($errors)){
                foreach ($errors as $item)
                {
                    echo "<p class=\"errors\">$item</p>";
                }  
            }
        ?>
        <div class="formItem">
            <input class="textInputs" type="text" name="userName" placeholder="Логин" value=<?php echo $userName ?>><br>
            <input class="textInputs" type="password" name="userPass" placeholder="Пароль" value=<?php echo $userPass ?>><br>
            <input class="submit" type="submit" name="submit" value="зарегистрироваться">
            
    </div>
    </form>
   
</body>
</html>