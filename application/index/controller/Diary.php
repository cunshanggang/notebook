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
        $list = model("diary")->order('id desc')->select();
        foreach($list as $key=>$value) {
            if(!empty($value['pic_url'])) {
                $list[$key]['pic_url'] = explode(";",$value['pic_url']);
            }
        }
        $this->assign("list",$list);
        return $this->fetch();
    }

    public function add() {
        if (request()->isPost()){
            $files = request()->file('img_data');
            if($files) {
                $url = $this->upload($files);
                $pic_url = '';
                foreach($url as $k=>$v) {
                    $pic_url .= $v.";";
                }
                $pic_url = substr($pic_url,0,-1);
            }
        //添加到数据库
        $m = model("Diary");
        $data['weather'] = $_POST['weather'];
        $data['title']   = $_POST['title'];
        $data['content'] = $_POST['content'];
        $data['pic_url'] = !empty($pic_url) ? $pic_url : '';
        $data['add_time'] = time();

        $r = $m->insert($data);
        if($r){
           $this->success("添加成功!");
        }

    }
        return $this->fetch();
    }

    public function upload($files) {
        $url = array();
        foreach($files as $file){
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                //成功上传后 获取上传信息
                //输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $u = $info->getSaveName();
                array_push($url,$u);
            }else{
                // 上传失败获取错误信息
                echo $files->getError();
            }
        }

        return $url;
    }
}