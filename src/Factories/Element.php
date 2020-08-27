<?php

namespace LSVH\SSRComponents\Factories;

use LSVH\SSRComponents\Element as ElementConcrete;
use LSVH\SSRComponents\Contracts\Element as ElementInterface;

class Element extends Factory {
    public static function createInstance($config): ElementInterface {
        if ($config instanceof ElementInterface) {
            return $config;
        }

        $tag = static::getConfigAttribute($config, 'tag', '');
        $props = static::getConfigAttribute($config, 'props', []);
        $children = static::getConfigAttribute($config, 'children', '');
        $concrete = static::getConcrete($config, ElementInterface::class, ElementConcrete::class);

        return new $concrete($tag, $props, $children);
    }
}
