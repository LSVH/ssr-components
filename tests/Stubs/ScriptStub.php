<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Script;
use LSVH\SSRComponents\Contracts\Element;

class ScriptStub extends Stub implements Script {
    public function __construct(Element $element, string $template = null) {
        $this->log('__construct', [$element, $template]);
    }

    public function toString(): string {
        $this->log('toString');
        return 'ScriptStub::toString';
    }
}
