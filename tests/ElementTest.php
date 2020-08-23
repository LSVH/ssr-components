<?php

namespace LSVH\SSRComponents\Tests;

use LSVH\SSRComponents\Element;

class ElementTest extends TestCase {
    /** @test */
    public function to_string_default() {
        $actual = Element::createInstance([]);

        $expected = '<div></div>';

        $this->assertEquals($expected, $actual->toString());
    }

    public function to_string_with_props() {
        $actual = Element::createInstance(['props' => [
            'hello' => 'world',
            'foo' => 'bar',
        ]]);

        $expected = '<div hello="world" foo="bar"></div>';

        $this->assertEquals($expected, $actual->toString());
    }
    /**
     * @test
     * @dataProvider toStringWithChildrenProvider
     */
    public function to_string_with_children($children, $expected) {
        $actual = Element::createInstance([
            'props' => [
                'children' => $children
            ]
        ]);

        $expected = '<div>'.$expected.'</div>';

        $this->assertEquals($expected, $actual->toString());
    }

    public function toStringWithChildrenProvider(): array {
        return [
            'with_string' => ['hello world', 'hello world'],
            'with_element' => [['props' => ['children' => 'hello world']], '<div>hello world</div>'],
            'with_component' => [['element' => []], '<div></div>'],
        ];
    }
}
