<?php

use Core\Route;

return [
    new Route('/', 'main', 'index'),
    new Route('/user/login', 'user', 'login'),
    new Route('/user/logout', 'user', 'logout'),
    new Route('/user/register', 'user', 'register'),
    /*new Route('/email/register', 'user', 'register'),*/
];