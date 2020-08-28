<?php

namespace LSVH\SSRComponents\Factories;

use LSVH\SSRComponents\Contracts\Script as ScriptInterface;
use LSVH\SSRComponents\Script as ScriptConcrete;

class Script extends Factory
{
    public static function createInstance($config): ScriptInterface
    {
        if ($config instanceof ScriptInterface) {
            return $config;
        }

        $element = static::getConfigAttribute($config, 'element');
        $template = static::getConfigAttribute($config, 'template');
        $concrete = static::getConcrete($config, ScriptInterface::class, ScriptConcrete::class);

        return new $concrete($element, $template);
    }
}
