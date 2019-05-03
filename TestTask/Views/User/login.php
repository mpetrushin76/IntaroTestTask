<?php
    include ROOT.'/Views/layouts/head.php';
    include ROOT.'/Views/layouts/header.php';
?>    
<body>
<?php if(isset($_SESSION['Is_Admin']))
{?> 
    <h1 style ="margin: 100px auto; width: 700px; font-size:100px; " class="errors">Добрый день <?= $_SESSION['User_Name'] ?></h1>
<?php } else 
{?>    
    <form action="" method="post">
        <?php 
            if(isset($errors)){
                foreach ($errors as $item)
                { ?>
                   <p class="errors"><?= $item ?></p>
               <?php }  
            }
        ?>
        <div class="formItem">
            <input class="textInputs" type="text" name="userName" placeholder="Логин" value=<?= $userName ?>><br>
            
            <input class="textInputs" type="password" name="userPass" placeholder="Пароль" value=<?= $userPass ?>><br>
        </div>
       
        <input class="submit" type="submit" name="submit" value="Войти">
      
    </form>
<?php 
} 
?>        
        

</body>
</html>