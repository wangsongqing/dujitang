<?php

namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\Controller;
use App\Model\Soul;
use App\Common\NoSql\PRedis;

class Index extends Controller
{
    /**
     * 访问方式：http://www.xmwme.com:9501/index/index
     * @return {"code":200,"result":[],"msg":"success"}
     * 自己搞一个模板引擎
     */
    public function index()
    {
        $dir = ROOT . '/App/View/Index/';
        $file = file_get_contents($dir . 'a.html');
        $this->response()->write($file);
    }

    public function tel()
    {
        try {
            $list = Soul::create()->all();
            $id =  array_rand(array_column($list, 'id'), 1);
            $key = 'EasySwoole_Soul' . $id;
            $data = PRedis::get($key);
            if (empty($data)) {
                $data = Soul::create()->get(['id' => $id]);
                PRedis::setex($key, 1800, json_encode($data));
            } else {
                $data = json_decode($data, true);
            }
            Soul::create()->update(['hits' => $data['hits'] + 1], ['id' => $id]);
            $this->writeJson('1', $data, 'success');
        } catch (\Throwable $e) {
            $this->writeJson('-1', [], 'fail');
        }
    }
}
