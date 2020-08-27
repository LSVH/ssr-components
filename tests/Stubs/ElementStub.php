<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Element;
use LSVH\SSRComponents\Contracts\Property;

class ElementStub extends Stub implements Element {
    protected $children;

    public function __construct(string $tag, array $props = [], $children = '') {
        $this->log('__construct', [$tag, $props, $children]);
        $this->children = $children;
    }

    public function toString(): string {
        $this->log('toString');
        return 'ElementStub::toString';
    }

    public function getPropertyByName(string $name): ?Property {
        $this->log('getPropertyByName', [$name]);
        return new PropertyStub($name, null);
    }

    public function getChildren() {
        $this->log('getChildren');
        if (is_array($this->children)) {
            return new BuilderStub($this->children);
        }

        return 'ElementStub::getChildren';
    }

    public function getComponentId(): ?string {
        $this->log('getComponentId');
        return 'ElementStub::getComponentId';
    }

    public function setComponentId(string $value): void {
        $this->log('setComponentId');
    }
}
