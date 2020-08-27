<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Style;
use LSVH\SSRComponents\Contracts\Element;

class StyleStub extends Stub implements Style {
    public function __construct(Element $element, string $template = null) {
        $this->log('__construct', [$element, $template]);
    }

    public function toString(): string {
        $this->log('toString');
        return 'StyleStub::toString';
    }
}
