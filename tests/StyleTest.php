<?php

namespace LSVH\SSRComponents\Tests;

use LSVH\SSRComponents\Style;
use LSVH\SSRComponents\Tests\Stubs\BuilderStub;
use LSVH\SSRComponents\Tests\Stubs\ElementStub;

class StyleTest extends TestCase
{
    protected $element;

    public function setUp(): void
    {
        parent::setUp();
        $this->element = new ElementStub('');
    }

    /** @test */
    public function can_render_local_styles()
    {
        $expected = 'Hello World';
        $subject = new Style($this->element, $expected);
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_render_children_styles()
    {
        $expected = 'Hello World';
        $this->element->setMock('getChildren', new BuilderStub([]));
        $subject = new Style($this->element, $expected);

        $actual = $subject->toString();
        $expected = $expected.'BuilderStub::renderStyles';
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_replace_ampersand_with_component_id_as_class_selector()
    {
        $subject = new Style($this->element, '& { color: red; }');
        $expected = ".{$this->element->getComponentId()} { color: red; }";
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }
}
