<?php
namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\Controller;
use App\Model\Soul;
use EasySwoole\Mysqli\QueryBuilder;

class Index extends Controller
{
	 /**
     * 访问方式：http://www.xmwme.com:9501/index/index
     * @return {"code":200,"result":[],"msg":"success"}
     * 自己搞一个模板引擎
     */
    public function index()
    {
        $dir = ROOT.'/App/View/Index/';
        $file = file_get_contents($dir.'a.html');
        $this->response()->write($file);
    }

    public function tel()
    {	
        $list = Soul::create()->select();
        $id =  array_rand(array_column($list, 'id'),1);
		$data = Soul::create()->get(['id'=>$id]);
        Soul::create()->update(['hits' => $data['hits'] + 1], ['id' => $id]);
    	$this->writeJson('1',$data,'success');
    }

}
