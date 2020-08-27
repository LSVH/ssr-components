<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Component;
use LSVH\SSRComponents\Contracts\Element;
use LSVH\SSRComponents\Contracts\Style;
use LSVH\SSRComponents\Contracts\Script;

class ComponentStub extends Stub implements Component {
    public function __construct(Element $element, Style $style = null, Script $script = null) {
        $this->log('__construct', [$element, $style, $script]);
    }

    public function renderElement(): string {
        $this->log('renderElement');
        return 'ComponentStub::renderElement';
    }

    public function renderStyle(): string {
        $this->log('renderStyle');
        return 'ComponentStub::renderStyle';
    }

    public function renderScript(): string {
        $this->log('renderScript');
        return 'ComponentStub::renderScript';
    }
}
