<?php

namespace LSVH\SSRComponents\Contracts;

interface Script
{
    public function __construct(Element $element, string $template = null);

    public function toString(): string;
}
