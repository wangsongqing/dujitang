<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\View\RenderInterface;

/**
 * @AutoController
 */
class ViewController
{
    public function index(RenderInterface $render)
    {
        return $render->render('index.index', ['name' => 'Hyperf']);
    }
}
