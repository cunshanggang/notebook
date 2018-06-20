<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14
 * Time: 23:49
 */
namespace app\index\controller;
use think\Controller;
use think\Request;

class Diary extends Controller {
    public function index() {
        return $this->fetch();
    }

    public function add() {
    if (request()->isPost()){

    }
        return $this->fetch();
    }

    public function upload() {
//        echo "<pre>";
//        print_r($_FILES);
//        echo "</pre>";
//        $data = json_encode($_FILES['img_data']);
//        echo $data;
//        echo $_FILES['img_data']['name'];
//        return json_encode($_FILES);
        if(request()->isPost()) {
            echo "<pre>";
            print_r($_POST);
            print_r($_FILES);
            echo "</pre>";
        }
    }
}