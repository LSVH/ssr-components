<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Component;
use LSVH\SSRComponents\Contracts\Element;
use LSVH\SSRComponents\Contracts\Script;
use LSVH\SSRComponents\Contracts\Style;

class ComponentStub extends Stub implements Component
{
    public function __construct(Element $element, Style $style = null, Script $script = null)
    {
        $this->stub('__construct', null, [$element, $style, $script]);
    }

    public function renderElement(): string
    {
        return $this->stub('renderElement', 'ComponentStub::renderElement');
    }

    public function renderStyle(): string
    {
        return $this->stub('renderStyle', 'ComponentStub::renderStyle');
    }

    public function renderScript(): string
    {
        return $this->stub('renderScript', 'ComponentStub::renderScript');
    }
}
