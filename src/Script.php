<?php

namespace LSVH\SSRComponents;

class Script {
    protected $element;
    protected $script;

    public static function createInstance(Element $element, string $script): self {
        return new static($element, $script);
    }

    protected function __construct(Element $element, string $script) {
        $this->element = $element;
        $this->script = $script;
    }

    public function toString(): string {
        return $this->script;
    }
}
