<?php

namespace LSVH\SSRComponents\Tests;

use LSVH\SSRComponents\Component;
use LSVH\SSRComponents\Tests\Stubs\ElementStub;
use LSVH\SSRComponents\Tests\Stubs\StyleStub;
use LSVH\SSRComponents\Tests\Stubs\ScriptStub;

class ComponentTest extends TestCase {
    protected $element;
    protected $style;
    protected $script;

    public function setUp(): void {
        parent::setUp();
        $this->element = new ElementStub('', []);
        $this->style = new StyleStub($this->element);
        $this->script = new ScriptStub($this->element);
    }

    /** @test */
    public function can_render_with_element() {
        $subject = new Component($this->element);

        $expected = 'ElementStub::toString';
        $actual = $subject->renderElement();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_render_with_element_style_and_script() {
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
}
