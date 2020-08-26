<?php

namespace LSVH\SSRComponents;

use LSVH\SSRComponents\Contracts\Component as ComponentInterface;
use LSVH\SSRComponents\Contracts\Element as ElementInterface;
use LSVH\SSRComponents\Contracts\Style as StyleInterface;
use LSVH\SSRComponents\Contracts\Script as ScriptInterface;

class Component implements ComponentInterface {
    protected $element;
    protected $style;
    protected $script;

    public function __construct(
        ElementInterface $element,
        StyleInterface $style = null,
        ScriptInterface $script = null
    ) {
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
}
