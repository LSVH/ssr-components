<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Element;
use LSVH\SSRComponents\Contracts\Style;

class StyleStub extends Stub implements Style
{
    public function __construct(Element $element, string $template = null)
    {
        $this->stub('__construct', null, [$element, $template]);
    }

    public function toString(): string
    {
        return $this->stub('toString', 'StyleStub::toString');
    }
}
