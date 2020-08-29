<?php


namespace Project\Controllers;


use Core\Controller;
use Project\Models\AdminFind;

class AdminFindsController extends Controller
{
    private $adminObj;

    public function __construct()
    {
        parent::__construct();
        $this->adminObj = new AdminFind();
    }

    public function index(){
        $this->layout = "admin";
        $adminObj = new AdminFind();
        $finds = $adminObj->getAllFinds();
        return $this->render('admin/finds', ['finds' => $finds]);
    }

    public function delete($params){
        $this->adminObj->delete($params['id']);
    }

}