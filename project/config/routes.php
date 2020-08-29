<?php

use Core\Route;

return [
    new Route('/', 'main', 'index'),
    new Route('/user/login', 'user', 'login'),
    new Route('/user/logout', 'user', 'logout'),
    new Route('/user/register', 'user', 'register'),
    /*new Route('/email/register', 'user', 'register'),*/

    new Route('/post/loss', 'post', 'loss'),
    new Route('/post/find', 'post', 'find'),

    new Route('/admin', 'admin', 'index'),
    new Route('/admin/finds', 'adminFinds', 'index'),
    new Route('/admin/losses', 'adminLosses', 'index'),

    new Route('/admin/finds/update/:id', 'adminFinds', 'update'),
    new Route('/admin/finds/delete/:id', 'adminFinds', 'delete'),
];