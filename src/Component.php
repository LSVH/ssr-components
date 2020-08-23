<?php

namespace LSVH\SSRComponents;

class Component {
    protected $element;
    protected $style;
    protected $script;

    public static function createInstance(array $rawElement, $style = null, $script = null): self {
        $element = Element::createInstance($rawElement);
        $props = array_filter([
            $element,
            $style ? Style::createInstance($element, $style) : false,
            $script ? Script::createInstance($element, $script) : false
        ]);

        return new static(...$props);
    }

    protected function __construct(Element $element, Style $style = null, Script $script = null) {
        $this->element = $element;
        $this->style = $style;
        $this->script = $script;
    }

    public function renderElement(): string {
        return $this->element->toString();
    }

    public function renderStyle(): string {
        return $this->style ? $this->style->toString() : '';
    }

    public function renderScript(): string {
        return $this->script ? $this->script->toString() : '';
    }

    public function getElement(): Element {
        return $this->element;
    }
}
