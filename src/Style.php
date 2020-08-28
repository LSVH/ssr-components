<?php

namespace LSVH\SSRComponents;

use LSVH\SSRComponents\Contracts\Builder as BuilderInterface;
use LSVH\SSRComponents\Contracts\Element as ElementInterface;
use LSVH\SSRComponents\Contracts\Style as StyleInterface;

class Style implements StyleInterface
{
    protected $element;
    protected $template;

    public function __construct(ElementInterface $element, string $template = null)
    {
        $this->element = $element;
        $this->template = $template;
    }

    public function toString(): string
    {
        $children = $this->elementChildrenStylesToString();
        if (!empty($this->template)) {
            return $this->renderTemplate().$children;
        }

        return $children;
    }

    protected function elementChildrenStylesToString(): string
    {
        $children = $this->element->getChildren();
        if ($children instanceof BuilderInterface) {
            return $children->renderStyles();
        }

        return '';
    }

    protected function renderTemplate(): string
    {
        $id = '.'.$this->element->getComponentId();

        return str_replace('&', $id, $this->template);
    }
}
