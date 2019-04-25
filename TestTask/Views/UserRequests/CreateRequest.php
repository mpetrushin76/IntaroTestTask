<?php
    include ROOT.'/Views/layouts/head.php';
?>
<body>
    <?php 
        include ROOT.'/Views/layouts/header.php';
    ?>
    <form action="" method="post"  enctype="multipart/form-data">
        <?php 
            if(isset($errors)){
                foreach ($errors as $item)
                {
                    echo "<p class=\"errors\">$item</p>";
                }  
            }
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