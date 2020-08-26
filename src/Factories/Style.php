<?php

namespace LSVH\SSRComponents\Factories;

use LSVH\SSRComponents\Style as StyleConcrete;
use LSVH\SSRComponents\Contracts\Style as StyleInterface;

class Style extends Factory {
    public static function createInstance(array $config): StyleInterface {
        $element = static::getConfigAttribute($config, 'element');
        $template = static::getConfigAttribute($config, 'template');
        $concrete = static::getConcrete($config, StyleInterface::class, StyleConcrete::class);

        return new $concrete($element, $template);
    }
}
