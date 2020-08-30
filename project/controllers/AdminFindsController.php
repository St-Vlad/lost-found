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
        $finds = $this->adminObj->getAllFinds();
        return $this->render('admin/finds', ['finds' => $finds]);
    }

    public function update($params){
        $this->layout = "admin";
        $item = $this->adminObj->getFindById($params['id']);
        return $this->render('admin/updateForm', ['item' => $item]);
    }

    public function delete($params){
        $this->adminObj->deleteFindById($params['id']);
    }

}