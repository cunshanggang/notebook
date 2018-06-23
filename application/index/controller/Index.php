<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\IndexModel;
use think\Model;
use think\Request;
use think\Paginator;

class Index extends Controller
{
    public function index()
    {
        $m = new IndexModel();
        $list = $m->order('id desc')->paginate(10);
//        echo "<pre>";
//        print_r($list);
//        echo "</pre>";
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function hello() {
        echo "Hello";
    }

    //添加
    public function add(Request $request) {
        //判断是否是ajax提交过来的数据，引入use think\Request
        if($request->isAjax()) {
            //将时间格式化为时间戳
            $data['add_time']   = time();
            $data['start_time'] = strtotime($_REQUEST['start']);
            $data['end_time']   = strtotime($_REQUEST['end']);
            $data['date']       = date("Y-m-d",$data['add_time']-3600*24);
            $data['sleep_time'] = number_format(($data['end_time']-$data['start_time'])%86400/3600,1);
            $data['status']     = $_REQUEST['status'];
            $data['times']      = $_REQUEST['times'];
            $data['is_wake']    = $_REQUEST['is_wake'];
            $data['note']       = $_REQUEST['note'];
            $m = new IndexModel();
            $r = $m->insert($data);
//            echo $m->getLastSql();//打印SQL语句
//            $this->success("添加成功!","{:url('Index/index')}");
            if($r){
                return 1;
            }
        } else {
            return $this->fetch();
        }

    }

    //或者
//    public function add() {
//        if(request()->isAjax()) {
//            echo "";
//        }else{
//            return $this->fetch();
//        }
//    }

    //测试
    public function test() {
//        $m = new IndexModel();
//        $r = $m->select();
//        echo "<pre>";
//        print_r($r[0]['id']);
//        echo "</pre>";

//        $m = model('IndexModel');
//        echo "<pre>";
//        print_r($m->id);
//        echo "</pre>";

        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";
    }
}
