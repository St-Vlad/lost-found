<?php
    if (isset($_SESSION['user_id'])):
?>
<p>Ви вже авторизовані на сайті</p>
<?php
    header("Location: /");
    else:
?>
<form method="post" action="<?php echo "/user/login";?>">
    <div class="container">
        <h1>Увійти</h1>
        <?php
        if (is_array($errors)){
            foreach ($errors as $error){
                echo $error."<br />";
            }
        }
        ?>
        <input type="hidden" name="CSRFtoken" value="<?php echo $_SESSION['CSRFtoken'];?>" />

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Введіть Email" name="email" required>

        <label for="password"><b>Пароль</b></label>
        <input type="password" placeholder="Введіть пароль" name="password" required>

        <button name="submit" type="submit" class="registerbtn">Увійти</button>
    </div>
    <div class="container signin">
        <p>Немає аккаунту? <a href="<?php echo "/user/register";?>">Зареєструватися</a>.</p>
    </div>
</form>
<?php endif;?>