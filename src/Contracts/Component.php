<?php

namespace LSVH\SSRComponents\Contracts;

interface Component {
    public function __construct(Element $element, Style $style = null, Script $script = null);

    public function renderElement(): string;

    public function renderStyle(): string;

    public function renderScript(): string;
}
