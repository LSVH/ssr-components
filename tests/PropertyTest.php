<?php

namespace LSVH\SSRComponents\Tests;

use LSVH\SSRComponents\Property;

class PropertyTest extends TestCase {
    /** @test */
    public function can_convert_to_string_with_valid_attribute() {
        $actual = new Property('class', 'foo');

        $expected = 'class="foo"';

        $this->assertEquals($expected, $actual->toString());
    }

    /** @test */
    public function can_convert_to_string_with_valid_attribute_but_without_value() {
        $actual = new Property('class');

        $expected = 'class';

        $this->assertEquals($expected, $actual->toString());
    }

    /** @test */
    public function cannot_convert_to_string_with_invalid_attribute() {
        $actual = new Property('foo');

        $expected = '';

        $this->assertEquals($expected, $actual->toString());
    }

    /** @test */
    public function cannot_convert_to_string_when_valid_event_attribute() {
        $actual = new Property('onclick');

        $expected = '';

        $this->assertEquals($expected, $actual->toString());
    }

    /** @test */
    public function cannot_convert_to_string_without_name() {
        $actual = new Property('', 'foo');

        $expected = '';

        $this->assertEquals($expected, $actual->toString());
    }

    /** @test */
    public function can_get_name() {
        $expected = 'foo';

        $actual = new Property($expected);

        $this->assertEquals($expected, $actual->getName());
    }

    /** @test */
    public function can_get_value() {
        $expected = 'foo';

        $actual = new Property('', $expected);

        $this->assertEquals($expected, $actual->getValue());
    }
}
