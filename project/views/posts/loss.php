<form enctype="multipart/form-data" method="post" action="<?php echo "/post/loss";?>">
    <div class="container">
        <h1>Заява про втрату</h1>
        <?php
        if (!empty($errors)){
            foreach ($errors as $error){
                echo $error."<br />";
            }
        }
        ?>
        <input type="hidden" name="CSRFtoken" value="<?php echo $_SESSION['CSRFtoken'];?>" />

        <label for="title"><b>Назва втрати</b></label>
        <input type="text" placeholder="Введіть назву втрати" name="title" required>

        <label for="additional-info"><b>Додаткова інформація</b></label>
        <input type="text" placeholder="Введіть інформацію про втрату" name="additional-info" required>

        <label for="place-of-loss"><b>Місце втрати</b></label>
        <input type="text" placeholder="Введіть приблизне місце втрати" name="place-of-loss" required>

        <label for="reward"><b>Винагорода</b></label>
        <input type="number" placeholder="Введіть винагороду" name="reward" value="0" required>

        <label for="image"><b>Фото пропажі</b></label>
        <input type="file" name="image">

        <button name="submit" type="submit" class="registerbtn">Зробити оголошення</button>
    </div>
</form>