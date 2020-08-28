<?php

namespace LSVH\SSRComponents\Tests;

use LSVH\SSRComponents\Component;
use LSVH\SSRComponents\Tests\Stubs\ElementStub;
use LSVH\SSRComponents\Tests\Stubs\ScriptStub;
use LSVH\SSRComponents\Tests\Stubs\StyleStub;

class ComponentTest extends TestCase
{
    protected $element;
    protected $style;
    protected $script;

    public function setUp(): void
    {
        parent::setUp();
        $this->element = new ElementStub('', []);
        $this->style = new StyleStub($this->element);
        $this->script = new ScriptStub($this->element);
    }

    /** @test */
    public function can_render_with_element()
    {
        $subject = new Component($this->element);

        $expected = 'ElementStub::toString';
        $actual = $subject->renderElement();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_render_with_element_style_and_script()
    {
        $subject = new Component($this->element, $this->style, $this->script);

        $expected = 'ElementStub::toString';
        $actual = $subject->renderElement();
        $this->assertEquals($expected, $actual);

        $expected = 'StyleStub::toString';
        $actual = $subject->renderStyle();
        $this->assertEquals($expected, $actual);

        $expected = 'ScriptStub::toString';
        $actual = $subject->renderScript();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_set_component_id()
    {
        new Component($this->element);

        $expected = 1;
        $actual = $this->element->getLogs('setComponentId');
        $this->assertCount($expected, $actual);
    }

    /** @test */
    public function can_generate_random_component_id_each_time()
    {
        new Component($this->element);
        new Component($this->element);

        $first = $this->element->getLogs('setComponentId')[0][0];
        $second = $this->element->getLogs('setComponentId')[1][0];
        $this->assertNotEquals($first, $second);
    }
}
