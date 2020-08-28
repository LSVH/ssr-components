<?php

namespace LSVH\SSRComponents\Contracts;

interface Builder
{
    public function __construct(array $components);

    public function renderElements(): string;

    public function renderStyles(): string;

    public function renderScripts(): string;
}
