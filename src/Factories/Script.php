<?php

namespace LSVH\SSRComponents\Factories;

use LSVH\SSRComponents\Script as ScriptConcrete;
use LSVH\SSRComponents\Contracts\Script as ScriptInterface;

class Script extends Factory {
    public static function createInstance(array $config): ScriptInterface {
        $element = static::getConfigAttribute($config, 'element');
        $template = static::getConfigAttribute($config, 'template');
        $concrete = static::getConcrete($config, ScriptInterface::class, ScriptConcrete::class);

        return new $concrete($element, $template);
    }
}
