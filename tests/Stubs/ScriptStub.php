<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Script;
use LSVH\SSRComponents\Contracts\Element;

class ScriptStub extends Stub implements Script {
    public function __construct(Element $element, string $template = null) {
        $this->stub('__construct', null, [$element, $template]);
    }

    public function toString(): string {
        return $this->stub('toString', 'ScriptStub::toString');
    }
}
