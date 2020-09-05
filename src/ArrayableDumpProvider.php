<?php

namespace Ika\ArrayableDump;

use Classes\Arrayable;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Contracts\Support\Arrayable as ArrayableType;

class ArrayableDumpProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $prevHandler = VarDumper::setHandler(function ($var) use (&$prevHandler) {
            $prevHandler($var instanceof ArrayableType ? new Arrayable($var) : $var);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
