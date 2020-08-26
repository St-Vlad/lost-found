<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title?></title>
    <link rel="stylesheet" href="<?php echo "/project/resources/css/forms/auth.css";?>">
    <link rel="stylesheet" href="<?php echo "/project/resources/css/layouts/main.css";?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
<body>
    <div class="wrapper">

        <div id="header">
            <div>
                <img src="/project/resources/img/logo.jpg" alt="logo" width="130px">
            </div>
            <div class="header-menu">
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Зробити пост
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="/post/loss">Заявити про втрату</a>
                        <a class="dropdown-item" href="/post/find">Заявити про знахідку</a>
                    </div>
                </div>

                <div>
                    <form action="#" class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Пошук по сайту" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Шукати!</button>
                    </form>
                </div>
                <?php if(isset($_SESSION['user_id'])):?>
                <div class="menu">
                    <a href="/user/logout" class="auth-button">Вийти з системи</a>
                </div>
                <?php else:?>
                <div class="menu">
                    <a href="/user/login" class="auth-button">Увійти в систему</a>
                </div>
                <?php endif;?>
            </div>
        </div>

        <div class="nav">

        </div>

        <div id="content">

            <?= $content ?>
        </div>

        <div id="footer">
                <div id="footer-menu">
                    <div class="footer-menu-element">
                        <a href="#">Про проект</a>
                    </div>
                    <div class="footer-menu-element">
                        <a href="#">FAQ</a>
                    </div>
                    <div class="footer-menu-element">
                        <a href="#">Форма зворотнього зв'язку</a>
                    </div>
                    <div class="footer-menu-element">
                        <a href="#">Інструкція користувача</a>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script></body>
</html>