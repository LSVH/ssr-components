<?php

namespace LSVH\SSRComponents\Factories;

use LSVH\SSRComponents\Property as PropertyConcrete;
use LSVH\SSRComponents\Contracts\Property as PropertyInterface;

class Property extends Factory {
    public static function createInstance(array $config): PropertyInterface {
        $name = static::getConfigAttribute($config, 'name', '');
        $value = static::getConfigAttribute($config, 'value');
        $concrete = static::getConcrete($config, PropertyInterface::class, PropertyConcrete::class);

        return new $concrete($name, $value);
    }

    public static function createInstances(array $configs): array {
        return array_filter(
            array_map(
                function ($name, $value) {
                    if (!is_array($value)) {
                        return static::createInstance([
                            'name' => $name,
                            'value' => $value,
                        ]);
                    }

                    return static::createInstance($value);
                },
                array_keys($configs),
                $configs,
            ),
        );
    }
}
