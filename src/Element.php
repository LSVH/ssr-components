<?php

namespace LSVH\SSRComponents;

class Element {
    protected $tag;
    protected $props;

    public static function createInstance(array $fields): self {
        $tag = array_key_exists('tag', $fields) ? $fields['tag'] : 'div';
        $rawProps = array_key_exists('props', $fields) && is_array($fields['props']) ? $fields['props'] : [];
        $props = array_map(function ($name, $value) {
            return Property::createInstance([
                'name' => $name,
                'value' => $value
            ]);
        }, array_keys($rawProps), $rawProps);

        return new static($tag, $props);
    }

    protected function __construct(string $tag, array $props) {
        $this->tag = $tag;
        $this->props = $props;
    }

    public function toString(): string {
        if ($this->isSelfClosingTag()) {
            return "<{$this->tag} {$this->renderProps()} />";
        }
        return "<{$this->tag}{$this->renderProps()}>{$this->renderChildren()}</{$this->tag}>";
    }

    public function getChildren() {
        if ($this->isSelfClosingTag()) {
            return [];
        }

        $props = array_filter($this->props, function(Property $prop) {
            return $prop->getName() === 'children';
        });

        $prop = empty($props) ? false : current($props);

        return $prop ? $prop->getValue() : '';
    }

    public function hasChildren(): bool {
        return !empty($this->getChildren());
    }

    protected function isSelfClosingTag(): bool {
        $html5 = [
            'area','base','br',
            'col','embed','hr',
            'img','input','link',
            'meta','param','source',
            'track','wbr','command',
            'keygen','menuitem'
        ];

        return in_array($this->tag, $html5);
    }

    protected function renderProps(): string {
        $props = implode(" ", array_filter(array_map(function (Property $prop) {
            return $prop->toString();
        }, $this->props)));

        return empty($props) ? '' : ' '.$props;
    }

    protected function renderChildren(): string {
        if (!$this->hasChildren()) {
            return '';
        }

        $children = $this->getChildren();

        if (is_string($children)) {
            return $children;
        }

        if ($children instanceof Component) {
            return $children->toString();
        }

        if (is_array($children)) {
            $builder = new Builder($children);

            return $builder->renderElements();
        }

        return  '';
    }
}
