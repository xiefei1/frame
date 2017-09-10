<?php
//<!--命名空间-->
namespace houdunwang\core;
class Boot{
//    定义一个静态方法
    public static function run(){
        self::dp();
//        初始化框架方法
       self::init();
//       执行应用方法
       self::apprun();
    }
    public static function dp(){
        $whoops  =  new  \Whoops\Run ;
        $whoops -> pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops -> register();

    }
//        1.定义一个静态方法
//        2.判断gat参数的变化
//        3.通过get参数的变化来实例化不同的对象和对象里的方法
    public static function apprun(){
//        1.判断get参数的是否存在
//        2.通过参数的变化我也可调用不同的类和方法
        if (isset($_GET['s'])){
//            将接收到的get参数拆分成数组
//                用’/‘拆分
          $info= explode('/',$_GET['s']);
//          拼接要实例化的类，
          $class="\app\\{$info[0]}\controller\\".ucfirst($info[1]);
            p($class);
//          接收gat传过来的参数调用方法
          $action=$info['2'];
//          定义常量
//            存储文件名
            define ('MODULE',$info[0]);
//            存储类名
            define ('CONTROLLER',$info[1]);
//            存储方法名
            define ('ACTION',$info[2] );

        }else{
//            如果地址栏没有参数需要给一个默认的方法
            $class="\app\home\controller\Entry";
//            默认方法
            $action="index";
            //          定义常量
//            存储文件名
            define ('MODULE','home');
//            存储类名
            define ('CONTROLLER','entry');
//            存储方法名
            define ('ACTION','index');
        }
//        实例化一个对象调用里边的方法
       echo call_user_func_array([new $class ,$action],[]);
    }
    public static function init(){

//        1.声明头部
//        2.如果不声明头部浏览器会乱码
        header('Content-type:text/html;charset=utf8');
//        1.设置时区
//        2.如果不设置时间有可能不准确
        date_default_timezone_set('PRC');
//       1. 开启session
//        2.如果sesion已经开启就无需重新开启
       session_id()||session_start();
    }

}
