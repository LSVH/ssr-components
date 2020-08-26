<?php

namespace LSVH\SSRComponents\Tests;

use LSVH\SSRComponents\Element;
use LSVH\SSRComponents\Tests\Stubs\PropertyStub;
use LSVH\SSRComponents\Tests\Stubs\BuilderStub;

class ElementTest extends TestCase {
    protected $property;
    protected $builder;

    public function setUp(): void {
        parent::setUp();
        $this->property = new PropertyStub('', null);
        $this->builder = new BuilderStub([]);
    }

    /** @test */
    public function can_convert_to_string_with_default_value() {
        $subject = new Element('', []);

        $expected = '<div></div>';
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_convert_to_string_with_custom_tag() {
        $subject = new Element('p', []);

        $expected = '<p></p>';
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_convert_to_string_with_self_closing_tag() {
        $subject = new Element('input', []);

        $expected = '<input />';
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_convert_to_string_with_custom_props() {
        $subject = new Element('', [['concrete' => get_class($this->property)]]);

        $expected = "<div {$this->property->toString()}></div>";
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_convert_to_string_with_self_closing_tag_and_custom_props() {
        $subject = new Element('input', [
            'foo' => ['concrete' => get_class($this->property)],
        ]);

        $expected = "<input {$this->property->toString()} />";
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_convert_to_string_with_children() {
        $subject = new Element('', [], 'Hello World');

        $expected = '<div>Hello World</div>';
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_convert_to_string_with_children_and_custom_props() {
        $subject = new Element(
            '',
            [
                'foo' => ['concrete' => get_class($this->property)],
            ],
            'Hello World',
        );

        $expected = "<div {$this->property->toString()}>Hello World</div>";
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_convert_to_string_with_children_with_builder() {
        $subject = new Element('', [], ['concrete' => get_class($this->builder)]);

        $expected = "<div>{$this->builder->renderElements()}</div>";
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function ignores_children_when_converting_to_string_with_self_closing_tag() {
        $subject = new Element('input', [], 'Hello World');

        $expected = '<input />';
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_get_property_by_name() {
        $subject = new Element('input', [['concrete' => get_class($this->property)]]);

        $expected = $this->property;
        $actual = $subject->getPropertyByName($expected->getName());
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_get_children() {
        $expected = 'Hello World';

        $subject = new Element('input', [], $expected);

        $actual = $subject->getChildren();

        $this->assertEquals($expected, $actual);
    }
}
