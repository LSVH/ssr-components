<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Element;
use LSVH\SSRComponents\Contracts\Property;

class ElementStub extends Stub implements Element {
    protected $children;

    public function __construct(string $tag, array $props = [], $children = '') {
        $this->stub('__construct', null, [$tag, $props, $children]);
    }

    public function toString(): string {
        return $this->stub('toString', 'ElementStub::toString');
    }

    public function getChildren() {
        return $this->stub('getChildren', 'ElementStub::getChildren');
    }

    public function getPropertyValue(string $name): ?string {
        return $this->stub('getPropertyByName', new PropertyStub($name), [$name]);
    }
    
    public function setPropertyValue(string $name, $value = null): void {
        $this->stub('setPropertyByName', null, [$name, $value]);
    }

    public function getComponentId(): ?string {
        return $this->stub('getComponentId', 'ElementStub::getComponentId');
    }

    public function setComponentId(string $value): void {
        $this->stub('setComponentId', null, [$value]);
    }
}
