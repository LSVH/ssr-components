<?php

namespace LSVH\SSRComponents;

use LSVH\SSRComponents\Contracts\Style as StyleInterface;
use LSVH\SSRComponents\Contracts\Element as ElementInterface;
use LSVH\SSRComponents\Contracts\Builder as BuilderInterface;

class Style implements StyleInterface {
    protected $element;
    protected $template;

    public function __construct(ElementInterface $element, string $template = null) {
        $this->element = $element;
        $this->template = $template;
    }

    public function toString(): string {
        $children = $this->elementChildrenStylesToString();
        if (!empty($this->template) && strpos($children, $this->template) === false) {
            return $this->template . $children;
        }

        return $children;
    }

    protected function elementChildrenStylesToString(): string {
        $children = $this->element->getChildren();
        if ($children instanceof BuilderInterface) {
            return $children->renderStyles();
        }

        return '';
    }
}
