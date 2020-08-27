<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Property;

class PropertyStub extends Stub implements Property {
    public function __construct(string $name, string $value = null) {
        $this->log('__construct', [$name, $value]);
    }

    public function toString(): string {
        $this->log('toString');
        return 'PropertyStub::toString';
    }

    public function getName(): string {
        $this->log('getName');
        return 'PropertyStub::getName';
    }

    public function getValue(): string {
        $this->log('getValue');
        return 'PropertyStub::getValue';
    }
}
