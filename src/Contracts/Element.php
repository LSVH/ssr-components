<?php

namespace LSVH\SSRComponents\Contracts;

interface Element {
    public function __construct(string $tag, array $props = [], $children = '');

    public function toString(): string;

    public function getPropertyByName(string $name): ?Property;

    public function getChildren();

    public function getComponentId(): ?string;

    public function setComponentId(string $value): void;
}
