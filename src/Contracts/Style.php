<?php

namespace LSVH\SSRComponents\Contracts;

interface Style {
    public function __construct(Element $element, string $template = null);

    public function toString(): string;
}
