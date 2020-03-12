<?php
namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\Controller;
use think\facade\Db;
use EasySwoole\Template\Render;
use EasySwoole\EasySwoole\ServerManager;

class Test extends Controller
{
	 /**
     * 访问方式：http://www.xmwme.com:9501/index/index
     * @return {"code":200,"result":[],"msg":"success"}
     */
    public function index()
    {
        $dir = ROOT.'/App/View/Index/';
        $file = file_get_contents($dir.'a.html');
        $list = Db::table('xm_soul')->column('id');
        $rand_list = array_rand($list,1);
        $data = Db::table('xm_soul')->where('id',$rand_list)->find();
        $file = str_replace('{{title}}',$data['title'],$file);
        $this->response()->write($file);
    }


    /**
     * 访问方式：http://www.xmwme.com:9501/index/test
     * @return {"code":"1","result":{"name":"wsq"},"msg":"success"}
     */
     public function test()
    {
        // TODO: Implement index() method.
        // $this->response()->write('hello world');
        $dir = ROOT;
        $this->writeJson('1',['name'=>$dir],'success');
    }

     /**
     *传参方式
     * http://www.xmwme.com:9501/index/getdata/?name=22    
     * @return {"code":"1","result":{"name":"22"},"msg":"success"}
     */
    public function getdata()
    {
    	$request = $this->request();
    	$data = $request->getRequestParam();//获取post/get数据,get覆盖post
    	$this->writeJson('1',$data['name'],'success');
    }

    /**
     * ThinkORM 操作数据库
     * ThinkORM 存在长时间运行内存溢出，暂时抛弃
     */
    public function sql()
    {
    	$data = Db::table('xm_soul')->where('id', 3)->find();
    	$this->writeJson('1',$data,'success');
    }

    /**
     * 自己搞一个模板引擎
     */
    public function tel()
    {	
        $list = Db::table('xm_soul')->column('id');
        $rand_list = array_rand($list,1);
		$data = Db::table('xm_soul')->where('id',$rand_list)->find();
    	$this->writeJson('1',$data,'success');
    }


    public function testm()
    {
        $content = $this->display('Index/b.html',['name'=>'123','age'=>'12']);
        $this->response()->write($content);
    }

     public function display($tem,$data)
    {
        $dir = './App/View/'.$tem;
        $file = file_get_contents($dir);
        foreach ($data as $k=>$v) {
            $file = str_replace("@@$k@@",$v,$file);
        }
        return $file;
        // $this->response()->write($file);
    }

    //redis set
    public function redisset()
    {
        $redis = \EasySwoole\RedisPool\Redis::defer('redis');
        // $redis->set('a', 'wangsongqing');
        $redis->setex('a', 10,'wangsongqing123');//有过期时间
        $this->writeJson('1','ok','success');
    }

    //redis get
    public function redisget()
    {
        $redis = \EasySwoole\RedisPool\Redis::defer('redis');
        $data = $redis->get('a');
        $this->writeJson('1',$data,'success');
    }
}
