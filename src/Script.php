<?php

namespace LSVH\SSRComponents;

use LSVH\SSRComponents\Contracts\Builder as BuilderInterface;
use LSVH\SSRComponents\Contracts\Element as ElementInterface;
use LSVH\SSRComponents\Contracts\Script as ScriptInterface;

class Script implements ScriptInterface
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
        $children = $this->elementChildrenScriptsToString();
        if (strpos($children, $this->template) !== false) {
            return $this->template.$children;
        }

        return $children;
    }

    protected function elementChildrenScriptsToString(): string
    {
        $children = $this->element->getChildren();
        if ($children instanceof BuilderInterface) {
            return $children->renderScripts();
        }

        return '';
    }
}
