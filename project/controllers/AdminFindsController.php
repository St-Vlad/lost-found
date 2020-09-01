<?php

namespace Project\Controllers;

use Core\Controller;
use Project\Models\LogicFind;

class AdminFindsController extends Controller
{
    private $logicFind;

    public function __construct()
    {
        parent::__construct();
        $this->logicFind = new LogicFind();
    }

    public function index(){
        $this->layout = "admin";
        $finds = $this->logicFind->getAllFinds();
        return $this->render('admin/finds', ['finds' => $finds]);
    }

    public function update($params){
        $this->layout = "admin";
        $item = $this->logicFind->getFindById($params['id']);
        return $this->render('admin/updateFindForm', ['item' => $item]);
    }

    public function delete($params){
        $this->logicFind->deleteFindById($params['id']);
    }

}