<?php
namespace houdunwang\core;
class Controller{
//    定义属性给个初始值
    private $url="window.history.back()";
//    1.加载模板，提示信息
//    2.用户完成一些操作以后展示的页面，可以传一写操作完成后的提示用户的信息
    public function message($message=''){
//        加载摸版
        include './view/message.php';
        exit;
    }
//    1.跳转页面的方法，参数默认为空字符串
//    2.调用方法不传值默认返回上一个页面
//    3.调用方法传值会跳到你指定的页面
    public function setRedirect($url=''){
//        判断是否传值
        if (empty($url)){
//            如果没有传值默认跳到上一页面
            $this->url="window.history.back()";

        }else{
//            传值以后跳到指定的页面
            $this->url="location.href='$url'";

        }
        return $this;
    }
}