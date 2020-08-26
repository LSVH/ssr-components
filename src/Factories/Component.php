<?php

namespace LSVH\SSRComponents\Factories;

use LSVH\SSRComponents\Component as ComponentConcrete;
use LSVH\SSRComponents\Contracts\Component as ComponentInterface;
use LSVH\SSRComponents\Contracts\Element as ElementInterface;

class Component extends Factory {
    public static function createInstance(array $config): ComponentInterface {
        $element = Element::createInstance(static::getConfigAttribute($config, 'element', []));

        $style = static::getConfigAttribute($config, 'style');
        $style = empty($style)
            ? null
            : Style::createInstance(static::addElementToConfig($element, $style));

        $script = static::getConfigAttribute($config, 'script');
        $script = empty($script)
            ? null
            : Script::createInstance(static::addElementToConfig($element, $script));

        $concrete = static::getConcrete(
            $config,
            ComponentInterface::class,
            ComponentConcrete::class,
        );

        return new $concrete($element, $style, $script);
    }

    protected static function addElementToConfig(ElementInterface $element, $template): array {
        return [
            'element' => $element,
            'template' => $template,
        ];
    }
}
