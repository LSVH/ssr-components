<?php

namespace LSVH\SSRComponents;

use LSVH\SSRComponents\Contracts\Element as ElementInterface;
use LSVH\SSRComponents\Contracts\Property as PropertyInterface;
use LSVH\SSRComponents\Contracts\Builder as BuilderInterface;
use LSVH\SSRComponents\Factories\Property as PropertyFactory;
use LSVH\SSRComponents\Factories\Builder as BuilderFactory;

class Element implements ElementInterface {
    protected $tag;
    protected $props;
    protected $children;
    protected $componentId;

    public function __construct(string $tag, array $props = [], $children = '') {
        $this->tag = empty($tag) ? 'div' : $tag;
        $this->props = PropertyFactory::createInstances($props);
        $this->children = is_array($children)
            ? BuilderFactory::createInstance($children)
            : $children;
    }

    public function getPropertyByName(string $name): ?PropertyInterface {
        $props = array_filter($this->props, function ($prop) use ($name) {
            return $prop->getName() === $name;
        });

        return empty($props) ? null : current($props);
    }

    public function getChildren() {
        return $this->children;
    }

    public function toString(): string {
        if ($this->isSelfClosingTag()) {
            return "<{$this->tag}{$this->renderProps()} />";
        }

        $children =
            $this->children instanceof BuilderInterface
                ? $this->children->renderElements()
                : $this->children;

        return "<{$this->tag}{$this->renderProps()}>{$children}</{$this->tag}>";
    }

    public function getComponentId(): ?string {
        return $this->componentId;
    }

    public function setComponentId(string $value): void {
        $this->componentId = $value;
    }

    protected function isSelfClosingTag(): bool {
        $html5 = [
            'area',
            'base',
            'br',
            'col',
            'embed',
            'hr',
            'img',
            'input',
            'link',
            'meta',
            'param',
            'source',
            'track',
            'wbr',
            'command',
            'keygen',
            'menuitem',
        ];

        return in_array($this->tag, $html5);
    }

    protected function renderProps(): string {
        $props = implode(
            ' ',
            array_filter(
                array_map(function ($prop) {
                    return $prop->toString();
                }, $this->props),
            ),
        );

        return empty($props) ? '' : ' ' . $props;
    }
}
