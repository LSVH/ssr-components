<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Component;
use LSVH\SSRComponents\Contracts\Element;
use LSVH\SSRComponents\Contracts\Style;
use LSVH\SSRComponents\Contracts\Script;

class ComponentStub implements Component {
    public function __construct(Element $element, Style $style = null, Script $script = null) {
    }

    public function renderElement(): string {
        return 'ComponentStub::renderElement';
    }

    public function renderStyle(): string {
        return 'ComponentStub::renderStyle';
    }

    public function renderScript(): string {
        return 'ComponentStub::renderScript';
    }
}
