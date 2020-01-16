<?php
namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\Controller;

class Base extends Controller
{

    public function mem()
    {
        $data = ['name'=>'wsq'];
        $this->writeJson('1',$data,'success');
    }
}
