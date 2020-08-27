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
    public function can_get_property() {
        $subject = new Element('', [['concrete' => get_class($this->property)]]);

        $expected = $this->property->getValue();
        $actual = $subject->getPropertyValue($this->property->getName());
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_set_value_for_existing_property() {
        $this->property->setMock('getName', 'class');
        $this->property->setMock('getValue', 'foo');
        $subject = new Element('', [$this->property]);

        $expected = 'bar';
        $subject->setPropertyValue($this->property->getName(), $expected);

        $actual = $this->property->getLogs('setValue')[0][0];

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_set_value_for_non_existing_property() {
        $subject = new Element('');
        $subject->setPropertyValue('class', 'foo');

        $expected = '<div class="foo"></div>';
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_set_value_for_non_existing_property_with_custom_concrete() {
        $subject = new Element('');
        $subject->setPropertyValue('class', ['concrete' => get_class($this->property)]);

        $expected = "<div {$this->property->toString()}></div>";
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_get_children() {
        $expected = 'Hello World';

        $subject = new Element('input', [], $expected);

        $actual = $subject->getChildren();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_get_component_id() {
        $subject = new Element('');

        $expected = null;
        $actual = $subject->getComponentId();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_set_and_get_component_id() {
        $subject = new Element('');

        $expected = 'foo';
        $subject->setComponentId($expected);

        $actual = $subject->getComponentId();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_inject_component_id_in_class_attribute() {
        $subject = new Element('');

        $expected = 'foo';
        $subject->setComponentId($expected);

        $expected = "<div class=\"{$expected}\"></div>";
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_merge_component_id_with_existing_class_attribute_value() {
        $this->property->setMock('getName', 'class');
        $this->property->setMock('getValue', 'foo');
        $subject = new Element('', [$this->property]);
        $subject->setComponentId('bar');

        $expected = 'foo bar';
        $actual = $this->property->getLogs('setValue')[0][0];
        $this->assertEquals($expected, $actual);
    }
}
