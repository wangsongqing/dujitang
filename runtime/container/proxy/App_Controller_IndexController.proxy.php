<?php

declare (strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use App\Helpers\CacheKey;
use App\Helpers\Cache;
use Hyperf\Database\Query\Builder;
use Hyperf\DbConnection\Db;
use Psr\SimpleCache\InvalidArgumentException;
/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends AbstractController
{
    use \Hyperf\Di\Aop\ProxyTrait;
    use \Hyperf\Di\Aop\PropertyHandlerTrait;
    function __construct()
    {
        if (method_exists(parent::class, '__construct')) {
            parent::__construct(...func_get_args());
        }
        $this->__handlePropertyHandler(__CLASS__);
    }
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();
        return ['method' => $method, 'message' => "Hello {$user}."];
    }
    /**
     * @return array
     * @throws InvalidArgumentException
     */
    public function getData()
    {
        $cacheKey = CacheKey::setSoul();
        $cacheData = Cache::getIns()->get($cacheKey);
        if (!empty($cacheData)) {
            $cacheData = json_decode($cacheData, true);
            $data = $this->getIdData($cacheData);
            return $this->success($data, 'Cache');
        }
        $data = Db::table('soul')->get()->toArray();
        $id = array_column($data, 'id');
        Cache::getIns()->set($cacheKey, json_encode($id));
        $data = $this->getIdData($id);
        return $this->success($data);
    }
    /**
     * @param $data
     * @return Builder
     * @throws InvalidArgumentException
     */
    private function getIdData($data)
    {
        $randId = rand(0, count($data));
        $id = $data[$randId];
        $cacheIdKey = CacheKey::getSoulById($id);
        $data = Cache::getIns()->get($cacheIdKey);
        if (!empty($data)) {
            return $data;
        }
        $data = Db::table('soul')->find($id);
        Cache::getIns()->set($cacheIdKey, $data);
        return $data;
    }
}