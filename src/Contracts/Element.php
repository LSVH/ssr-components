<?php

namespace LSVH\SSRComponents\Contracts;

interface Element {
    public function __construct(string $tag, array $props = [], $children = '');

    public function toString(): string;

    public function getPropertyValue(string $name): ?string;

    public function setPropertyValue(string $name, $value = null): void;

    public function getChildren();

    public function getComponentId(): ?string;

    public function setComponentId(string $value): void;
}
