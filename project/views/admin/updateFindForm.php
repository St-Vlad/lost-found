<form enctype="multipart/form-data" method="post" action="#">
    <div class="container">
        <h1>Редагування інформації про знахідку: <?= $item['title'];?></h1>
        <?php
/*        if (!empty($errors)){
            foreach ($errors as $error){
                echo $error."<br />";
            }
        }
        */?>
        <input type="hidden" name="CSRFtoken" value="<?php echo $_SESSION['CSRFtoken'];?>" />

        <label for="user_id"><b>id користувача</b></label>
        <input type="text" name="user_id" value="<?= $item['user_id'];?>" readonly>

        <label for="title"><b>Назва знахідки</b></label>
        <input type="text" placeholder="Введіть назву знахідки" name="title" value="<?= $item['title'];?>" required>

        <label for="additional-info"><b>Додаткова інформація</b></label>
        <input type="text" placeholder="Введіть інформацію про знахідку" name="additional-info" value="<?= $item['additional_info'];?>" required>

        <label for="place-of-find"><b>Місце знахідки</b></label>
        <input type="text" placeholder="Введіть місце знахідки" name="place-of-find" value="<?= $item['place_of_find'];?>" required>

        <label for="approved"><b>Ухвалено</b></label>
        <input name="approved" type="checkbox" <?php if ($item['approved']){
            echo "checked=\"checked\"";
        };?>>

        <label for="image"><b>Фото знахідки</b></label>
        <img width=100px src="data:image/jpeg;base64, <?= base64_encode($item['image']);?>" alt="немає фото">
        <input type="file" name="image">

        <button name="submit" type="submit" class="registerbtn">Редагувати</button>
    </div>
</form>
