<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\IndexModel;
use think\Model;
use think\Request;

class Index extends Controller
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }

    public function hello() {
        echo "Hello";
    }

    //添加
    public function add(Request $request) {
        //判断是否是ajax提交过来的数据，引入use think\Request
        if($request->isAjax()) {
            //将时间格式化为时间戳
            $data['start_time'] = strtotime($_REQUEST['start']);
            $data['end_time']   = strtotime($_REQUEST['end']);
            $data['date']       = date("Y-m-d",$data['start_time']);
            $data['sleep_time'] = number_format((($data['end_time']-$data['start_time'])/3600),1);
            $data['status']     = $_REQUEST['status'];
            $data['times']      = $_REQUEST['times'];
            $data['is_wake']    = $_REQUEST['is_wake'];
            $data['note']       = $_REQUEST['note'];
            $data['add_time']   = time();
            $m = new IndexModel();
            $m->insert($data);
            echo $m->getLastSql();
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
