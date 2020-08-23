<?php

namespace LSVH\SSRComponents;

class Style {
    protected $element;
    protected $style;

    public static function createInstance(Element $element, string $style): self {
        return new static($element, $style);
    }

    protected function __construct(Element $element, string $style) {
        $this->element = $element;
        $this->style = $style;
    }

    public function toString(): string {
        return $this->style . static::childrenStylesToString($this->element);
    }

    public static function childrenStylesToString(Element $element) {
        if (!$element->hasChildren() || is_string($children = $element->getChildren())) {
            return '';
        }

        return implode('', array_filter(array_map(function ($child) {
            if ($child instanceof Component) {
                $style = $child->renderStyle();
                return $style . static::childrenStylesToString($child->getElement());
            }

            if ($child instanceof Element) {
                return static::childrenStylesToString($child);
            }

            return '';
        }, $children)));
    }
}
