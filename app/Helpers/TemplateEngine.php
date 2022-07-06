<?php

declare(strict_types=1);

namespace App\Helpers;

use Hyperf\View\Engine\BladeEngine;
use Hyperf\View\Engine\EngineInterface;
// use duncan3dc\Laravel\BladeInstance;

class TemplateEngine implements EngineInterface
{
    public function render($template, $data, $config): string
    {
        // 实例化对应的模板引擎的实例
        $engine = new BladeEngine();
        // 并调用对应的渲染方法
        return $engine->render($template, $data, $config);
    }
}
