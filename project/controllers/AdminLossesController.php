<?php


namespace Project\Controllers;


use Core\Controller;

class AdminLossesController extends Controller
{
    public function index(){
        $this->layout = "admin";
        return $this->render('admin/losses');
    }
}