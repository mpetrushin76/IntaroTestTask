<?php
    include ROOT.'/Views/layouts/head.php';
    if(!preg_match("/[0-9a-z_]/i", $userName) or !preg_match("/[0-9a-z_]/i", $userPass))
    {
        $userName="";
        $userPass="";
    }
?>
<body>
<?php 
    include ROOT.'/Views/layouts/header.php';
?>
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