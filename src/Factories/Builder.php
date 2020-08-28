<?php

namespace LSVH\SSRComponents\Factories;

use LSVH\SSRComponents\Builder as BuilderConcrete;
use LSVH\SSRComponents\Contracts\Builder as BuilderInterface;

class Builder extends Factory
{
    public static function createInstance($config): BuilderInterface
    {
        if ($config instanceof BuilderInterface) {
            return $config;
        }

        $components = static::getConfigAttribute($config, 'components', []);
        $concrete = static::getConcrete($config, BuilderInterface::class, BuilderConcrete::class);

        return new $concrete($components);
    }
}
