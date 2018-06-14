<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14
 * Time: 23:49
 */
namespace app\index\controller;
use think\Controller;

class Diary extends Controller {
    public function index() {
        return $this->fetch();
    }

    public function add() {
        return $this->fetch();
    }
}