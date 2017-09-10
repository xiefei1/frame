<?php
namespace houdunwang\view;
class View{

//    当方法不存在的时候执行
    public function __call($name, $arguments)
    {
//        调用下面的静态方法
      return  self::parseAction($name,$arguments);
    }
//    当调用静态不存在的时候触发他
    public static function __callStatic($name,$arguments){

        return self::parseAction($name,$arguments);
    }

    public static function parseAction($name,$arguments){

        return call_user_func_array([new Base(),$name],$arguments);
    }
}