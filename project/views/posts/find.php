<form enctype="multipart/form-data" method="post" action="<?php echo "/post/find";?>">
    <div class="container">
        <h1>Заява про знахідку</h1>
        <?php
        if (!empty($errors)){
            foreach ($errors as $error){
                echo $error."<br />";
            }
        }
        ?>
        <input type="hidden" name="CSRFtoken" value="<?php echo $_SESSION['CSRFtoken'];?>" />

        <label for="title"><b>Назва знахідки</b></label>
        <input type="text" placeholder="Введіть назву знахідки" name="title" required>

        <label for="additional-info"><b>Додаткова інформація</b></label>
        <input type="text" placeholder="Введіть інформацію про знахідку" name="additional-info" required>

        <label for="place-of-find"><b>Місце знахідки</b></label>
        <input type="text" placeholder="Введіть місце знахідки" name="place-of-find" required>

        <label for="image"><b>Фото знахідки</b></label>
        <input type="file" name="image">

        <button name="submit" type="submit" class="registerbtn">Зробити оголошення</button>
    </div>
</form>
