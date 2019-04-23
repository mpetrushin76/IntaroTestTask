<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/TestTask/Styles/main.css">
    
    <title>Создать новую заявку</title>
</head>
<body>
    <div class="header">
        <a class="exitBtn" href="/TestTask/user/auth">Выход</a>
    </div>
    <form action="" method="post"  enctype="multipart/form-data">
    <?php 
                 if(isset($errors))
                     foreach ($errors as $item)
                         echo "<p class=\"errors\">$item</p>";
           
       
    ?>
        <div class="formItem">
            <input class="textInputs" type="text" name="requestName" placeholder="Название заявки"><br>
            <input class="textInputs" type="tel" name="userPhone" placeholder="Контактный телефон"><br>
            <textarea class="textAreaInput" name="requestComment" id="" cols="300" rows="10"></textarea>
            <input  type="file" name="requestImg">
            <input class="submit" type="submit" name="submit" value="Отправить">
        </div>
    </form>

   
</body>
</html>