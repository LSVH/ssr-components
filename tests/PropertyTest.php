<?php

namespace LSVH\SSRComponents\Tests;

use LSVH\SSRComponents\Property;

class PropertyTest extends TestCase {
    /** @test */
    public function to_string() {
        $actual = Property::createInstance([
            'name' => 'hello',
            'value' => 'world'
        ]);

        $expected = 'hello="world"';

        $this->assertEquals($expected, $actual->toString());
    }

    /** @test */
    public function event_attribute_to_string() {
        $actual = Property::createInstance([
            'name' => 'onclick',
            'value' => 'foo()'
        ]);

        $expected = '';

        $this->assertEquals($expected, $actual->toString());
    }

    /** @test */
    public function reserverd_prop_name_to_string() {
        $actual = Property::createInstance([
            'name' => 'children',
            'value' => 'hello world'
        ]);

        $expected = '';

        $this->assertEquals($expected, $actual->toString());
    }

    /** @test */
    public function can_get_name() {
        $expected = 'hello';

        $actual = Property::createInstance([
            'name' => $expected,
            'value' => 'world'
        ]);

        $this->assertEquals($expected, $actual->getName());
    }

    /**
     * @test
     * @dataProvider getValueProvider
     */
    public function can_get_value($expected) {
        $actual = Property::createInstance([
            'name' => 'hello',
            'value' => $expected
        ]);

        $this->assertEquals($expected, $actual->getValue());
    }

    public function getValueProvider(): array {
        return [
            'with_string' => ['world'],
            'with_integer' => [123],
            'with_boolean' => [true],
            'with_function' => [function() { }],
        ];
    }
}
