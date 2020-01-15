<?php
namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\Controller;
use think\facade\Db;

class Base extends Controller
{
	 /**
     * 访问方式：http://www.xmwme.com:9501/index/index
     * @return {"code":200,"result":[],"msg":"success"}
     * 自己搞一个模板引擎
     * @param $tem 如 Index/a.html
     * @param $data 如 ['name'=>'123']
     */
    public function display($tem,$data)
    {
        $dir = './App/View/'.$tem;
        $file = file_get_contents($dir.'a.html');
        foreach ($data as $k=>$v) {
            $file = str_replace("{{$k}}",$v,$file);
        }
        return $file;
        // $this->response()->write($file);
    }
}
