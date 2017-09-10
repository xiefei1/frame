<?php
namespace houdunwang\model;

class Model{
//   当方法不存在的时候执行
    public function __call($name, $arguments)
    {
//        调用下面的静态方法
        return  self::parseAction($name,$arguments);
    }
//    当调用静态不存在的时候触发他
    public static function __callStatic($name,$arguments){

        return self::parseAction($name,$arguments);
    }
//    定义一个静态的实例化类的方法

    public static function parseAction($name,$arguments){
//        获得类名
        $class=get_called_class ();
//        实例化一个类将类名，方法名，和调用时传入的参数
        return call_user_func_array([new Base($class),$name],$arguments);
    }
}