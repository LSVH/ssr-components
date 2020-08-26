<?php

namespace LSVH\SSRComponents\Tests;

use LSVH\SSRComponents\Builder;
use LSVH\SSRComponents\Tests\Stubs\ComponentStub;
use LSVH\SSRComponents\Tests\Stubs\ElementStub;

class BuilderTest extends TestCase {
    /** @test */
    public function can_render_component_array_with_element() {
        $subject = new Builder([
            [
                'concrete' => ComponentStub::class,
                'element' => [true],
            ],
        ]);

        $expected = 'ComponentStub::renderElement';
        $actual = $subject->renderElements();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_render_component_array_with_element_style_and_script() {
        $subject = new Builder([
            [
                'concrete' => ComponentStub::class,
                'element' => [true],
                'style' => '',
                'script' => '',
            ],
        ]);

        $expected = 'ComponentStub::renderElement';
        $actual = $subject->renderElements();

        $this->assertEquals($expected, $actual);

        $expected = 'ComponentStub::renderStyle';
        $actual = $subject->renderStyles();

        $this->assertEquals($expected, $actual);

        $expected = 'ComponentStub::renderScript';
        $actual = $subject->renderScripts();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_render_element_array() {
        $subject = new Builder([
            [
                'concrete' => ElementStub::class,
                'props' => [true],
            ],
        ]);

        $expected = 'ElementStub::toString';
        $actual = $subject->renderElements();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_render_string_array() {
        $expected = 'Hello World';

        $subject = new Builder([$expected]);

        $actual = $subject->renderElements();

        $this->assertEquals($expected, $actual);
    }
}
