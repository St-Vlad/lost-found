<?php
if (isset($_SESSION['user_id'])):
    ?>
    <p>Ви вже авторизовані на сайті</p>
<?php
    header("Location: /");
else:
?>
<form method="post" action="<?php echo "/user/register";?>">
    <div class="container">
        <h1>Зареєструватися</h1>

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

        <label for="psw"><b>Пароль</b></label>
        <input type="password" placeholder="Введіть пароль" name="password" required>

        <label for="psw-repeat"><b>Повторіть пароль</b></label>
        <input type="password" placeholder="Введіть пароль" name="password-repeat" required>

        <label for="terms-agree">Реєструючись, ви автоматично погоджуєтеся з умовами <a href="#">політики конфіденційності</a>
                даного ресурсу.
        </label>

        <input name="terms-agree" type="checkbox" required>
        <button name="submit" type="submit" class="registerbtn">Зареєстуватися</button>
    </div>

    <div class="container signin">
        <p>Вже є аккаунт? <a href="<?php echo "/user/login";?>">Увійти</a>.</p>
    </div>
</form>
<?php endif; ?>