<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Script;
use LSVH\SSRComponents\Contracts\Element;

class ScriptStub implements Script {
    public function __construct(Element $element, string $template = null) {
    }

    public function toString(): string {
        return 'ScriptStub::toString';
    }
}
