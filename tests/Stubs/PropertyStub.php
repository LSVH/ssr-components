<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Property;

class PropertyStub implements Property {
    public function __construct(string $name, string $value = null) {
    }

    public function toString(): string {
        return 'PropertyStub::toString';
    }

    public function getName(): string {
        return 'PropertyStub::getName';
    }

    public function getValue(): string {
        return 'PropertyStub::getValue';
    }
}
