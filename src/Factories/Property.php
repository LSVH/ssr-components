<?php

namespace LSVH\SSRComponents\Factories;

use LSVH\SSRComponents\Property as PropertyConcrete;
use LSVH\SSRComponents\Contracts\Property as PropertyInterface;

class Property extends Factory {
    public static function createInstance($config): PropertyInterface {
        if ($config instanceof PropertyInterface) {
            return $config;
        }

        $name = static::getConfigAttribute($config, 'name', '');
        $value = static::getConfigAttribute($config, 'value');
        $concrete = static::getConcrete($config, PropertyInterface::class, PropertyConcrete::class);

        return new $concrete($name, $value);
    }

    public static function createInstances(array $configs): array {
        return array_filter(
            array_map(
                function (string $name, $value = null) {
                    if (is_string($value) || $value == null) {
                        return static::createInstance([
                            'name' => $name,
                            'value' => $value,
                        ]);
                    }

                    if (is_array($value) && !array_key_exists('name', $value)) {
                        $value['name'] = $name;
                    }

                    return static::createInstance($value);
                },
                array_keys($configs),
                $configs,
            ),
        );
    }
}
