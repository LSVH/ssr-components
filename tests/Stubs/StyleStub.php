<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Style;
use LSVH\SSRComponents\Contracts\Element;

class StyleStub implements Style {
    public function __construct(Element $element, string $template = null) {
    }

    public function toString(): string {
        return 'StyleStub::toString';
    }
}
