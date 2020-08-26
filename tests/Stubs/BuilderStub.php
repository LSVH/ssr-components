<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Builder;

class BuilderStub implements Builder {
    public function __construct(array $components) {
    }

    public function renderElements(): string {
        return 'BuilderStub::renderElements';
    }

    public function renderStyles(): string {
        return 'BuilderStub::renderStyles';
    }

    public function renderScripts(): string {
        return 'BuilderStub::renderScripts';
    }
}
