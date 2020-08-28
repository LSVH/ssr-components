<?php

namespace LSVH\SSRComponents\Contracts;

interface Property
{
    public function __construct(string $name, string $value = null);

    public function toString(): string;

    public function getName(): string;

    public function getValue(): string;

    public function setValue(string $value = null): void;
}
