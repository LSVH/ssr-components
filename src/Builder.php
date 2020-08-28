<?php

namespace LSVH\SSRComponents;

use LSVH\SSRComponents\Contracts\Builder as BuilderInterface;
use LSVH\SSRComponents\Contracts\Component as ComponentInterface;
use LSVH\SSRComponents\Contracts\Element as ElementInterface;
use LSVH\SSRComponents\Factories\Component as ComponentFactory;
use LSVH\SSRComponents\Factories\Element as ElementFactory;

class Builder implements BuilderInterface
{
    protected $components;

    public function __construct(array $components)
    {
        $this->components = static::buildComponents($components);
    }

    public function renderElements(): string
    {
        $handleComponents = function ($component) {
            return $component->renderElement();
        };
        $handleElements = function ($element) {
            return $element->toString();
        };

        return $this->renderComponents($handleComponents, $handleElements);
    }

    public function renderStyles(): string
    {
        $handleComponents = function ($component) {
            return $component->renderStyle();
        };
        $handleElements = function ($element) {
            return $element->getChildren()->renderStyle();
        };

        return $this->renderComponents($handleComponents, $handleElements, '');
    }

    public function renderScripts(): string
    {
        $handleComponents = function ($component) {
            return $component->renderScript();
        };
        $handleElements = function ($element) {
            return $element->getChildren()->renderScript();
        };

        return $this->renderComponents($handleComponents, $handleElements, '');
    }

    protected function renderComponents(
        callable $handleComponents,
        callable $handleElements,
        $defaultHandler = null
    ): string {
        return implode(
            '',
            array_map(
                function ($component) use (
                $handleComponents,
                $handleElements,
                $defaultHandler
            ) {
                if ($component instanceof ComponentInterface) {
                    return $handleComponents($component);
                }

                if ($component instanceof ElementInterface) {
                    return $handleElements($component);
                }

                return is_callable($defaultHandler)
                    ? $defaultHandler($component)
                    : ($defaultHandler == null
                        ? $component
                        : $defaultHandler);
            },
                $this->components
            ),
        );
    }

    protected static function buildComponents(array $components): array
    {
        return array_filter(
            array_map(function ($component) {
                if (is_array($component)) {
                    if (array_key_exists('element', $component)) {
                        return ComponentFactory::createInstance($component);
                    }

                    return ElementFactory::createInstance($component);
                }

                return $component;
            }, $components),
        );
    }
}
