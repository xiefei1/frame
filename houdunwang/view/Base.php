<?php
namespace houdunwang\view;
class Base{
//    定义属性存储数据用来分配变量
    protected $data=[];
//    定义属性存储模板路径
    private $file;
//    分配变量的方法
    public function with($var){
//    将数组存到属性中
        $this->data=$var;
//        返回对象
        return $this;
    }
//    拼接加载模板路径的方法
    public function make(){
        $this->file="../app/".MODULE."/view/".strtolower(CONTROLLER).'/'.ACTION.c("view.suffix");
        return $this;
    }
//    echo 输出对象是触发
    public function __toString()
    {
//        将数组里的健名传成变量名键值转成变量值
        extract($this->data);
//        加载模板
        include "$this->file";
//        这个方法必须要有return
        return '';
    }
}