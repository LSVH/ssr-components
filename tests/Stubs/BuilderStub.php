<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Builder;

class BuilderStub extends Stub implements Builder {
    public function __construct(array $components) {
        $this->log('__construct', [$components]);
    }

    public function renderElements(): string {
        $this->log('renderElements');
        return 'BuilderStub::renderElements';
    }

    public function renderStyles(): string {
        $this->log('renderStyles');
        return 'BuilderStub::renderStyles';
    }

    public function renderScripts(): string {
        $this->log('renderScripts');
        return 'BuilderStub::renderScripts';
    }
}
