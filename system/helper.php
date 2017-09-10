<?php
//设置session来用session必须先开启
session_start();
//设置头部防止中文乱码
header( 'Content-type:text/html;charset=utf8');
//设置时区
date_default_timezone_set('PRC');
//检测函数是否存在
//打印函数
if(!function_exists('p')){
    function p($p){
        echo '<pre style="background: #449D44;padding: 10px 30px;border-radius: 10px;color: #FFFFDD;font-size: 18px;">';
        print_r($p);
        echo '</pre>';
    }
}
//将内容写入文件
function dataToFile($url,$data){
    file_put_contents($url,"<?php\r\n return" .var_export($data,true).';');
}
//判断是否是post请求
define('IS_POST',$_SERVER['REQUEST_METHOD']=='POST'?true:false);

//自动加载类
function __autoload($name){

    if(substr($name,-10)=='Controller'){

     include "./controller/{$name}.class.php";

    }else{

    }
}
//判断是否是ajax请求
if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])&&$_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){

    define('IS_AJAX',true);
}else{
    define('IS_AJAX',false);
}
//判断函数是否存在如果存在就调用不了
if(!function_exists('c')){
//    定义一个函数用来控制数据库的链接，和文件的后缀
    function c($var){
//        将字符串转成数组用点拆封
        $info=explode('.',$var);
//        通过传值来改变加载的文件，加载数据库文件和模板文件路径的文件
//        传数据库的文件名加载存储数据的文件得到数据反出去，这样的好处我直接在文件中修改就可以
        $data=include "../system\config/".$info[0].".php";
        return isset($data[$info[1]])?$data[$info[1]]:null;
    }
}