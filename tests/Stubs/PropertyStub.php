<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Property;

class PropertyStub extends Stub implements Property
{
    public function __construct(string $name, string $value = null)
    {
        $this->stub('__construct', null, [$name, $value]);
    }

    public function toString(): string
    {
        return $this->stub('toString', 'PropertyStub::toString');
    }

    public function getName(): string
    {
        return $this->stub('getName', 'PropertyStub::getName');
    }

    public function getValue(): string
    {
        return $this->stub('getValue', 'PropertyStub::getValue');
    }

    public function setValue(string $value = null): void
    {
        $this->stub('setValue', null, [$value]);
    }
}
