<?php

namespace LSVH\SSRComponents\Tests\Stubs;

use LSVH\SSRComponents\Contracts\Element;
use LSVH\SSRComponents\Contracts\Property;

class ElementStub implements Element {
    protected $children;

    public function __construct(string $tag, array $props = [], $children = '') {
        $this->children = $children;
    }

    public function toString(): string {
        return 'ElementStub::toString';
    }

    public function getPropertyByName(string $name): ?Property {
        return new PropertyStub($name, null);
    }

    public function getChildren() {
        if (is_array($this->children)) {
            return new BuilderStub($this->children);
        }

        return 'ElementStub::getChildren';
    }
}
