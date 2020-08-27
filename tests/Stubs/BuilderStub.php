<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Builder;

class BuilderStub extends Stub implements Builder {
    public function __construct(array $components) {
        $this->stub('__construct', null, [$components]);
    }

    public function renderElements(): string {
        return $this->stub('renderElements', 'BuilderStub::renderElements');
    }

    public function renderStyles(): string {
        return $this->stub('renderStyles', 'BuilderStub::renderStyles');
    }

    public function renderScripts(): string {
        return $this->stub('renderScripts', 'BuilderStub::renderScripts');
    }
}
