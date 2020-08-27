<?php

namespace LSVH\SSRComponents\Factories;

abstract class Factory {
    private function __construct() {
    }

    abstract public static function createInstance($config);

    public static function createInstances(array $configs): array {
        return array_filter(
            array_map(function ($config) {
                if (is_array($config)) {
                    return static::createInstance($config);
                }

                return $config;
            }, $configs),
        );
    }

    protected static function getConfigAttribute(array $config, string $name, $fallback = null) {
        return array_key_exists($name, $config) ? $config[$name] : $fallback;
    }

    protected static function getConcrete(array $config, string $interface, string $fallback) {
        $concrete = static::getConfigAttribute($config, 'concrete');
        $concrete = class_exists($concrete) ? $concrete : null;

        $implements = $concrete ? class_implements($concrete) : false;
        $implements = $implements ? $implements : [];

        return empty($concrete) || !in_array($interface, $implements) ? $fallback : $concrete;
    }
}
