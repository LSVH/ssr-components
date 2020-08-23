<?php

namespace LSVH\SSRComponents;

class Builder {
    protected $components;

    public function __construct(array $components) {
        $this->components = static::createComponents($components);
    }

    public function renderElements(): string {
        return implode('', array_map(function ($component) {
            if ($component instanceof Component) {
                return $component->renderElement();
            }

            if ($component instanceof Element) {
                return $component->toString();
            }

            return $component;
        }, $this->components));
    }

    public function renderStyles(): string {
        return implode('', array_map(function ($component) {
            if ($component instanceof Component) {
                return $component->renderStyles();
            }

            if ($component instanceof Element) {
                return Style::childrenStylesToString($component);
            }

            return '';
        }, $this->components));
    }

    public function renderScripts(): string {
        return '';
    }
    
    protected static function createComponents(array $components): array {
        return array_filter(array_map(function ($component) {
            if (is_array($component)) {
                $element = array_key_exists('element', $component) ? $component['element'] : [];
                $style = array_key_exists('style', $component) ? $component['style'] : null;
                $script = array_key_exists('script', $component) ? $component['script'] : null;

                if (empty(array_filter([$element, $style, $script]))) {
                    return Element::createInstance($component);
                }

                return Component::createInstance($element, $style, $script);
            }

            return $component;
        }, $components));
    }
}
