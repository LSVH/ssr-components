<?php

namespace LSVH\SSRComponents\Tests;

use LSVH\SSRComponents\Style;
use LSVH\SSRComponents\Tests\Stubs\ElementStub;

class StyleTest extends TestCase {
    /** @test */
    public function can_render_local_styles() {
        $expected = 'Hello World';
        $subject = new Style(new ElementStub(''), $expected);
        $actual = $subject->toString();
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_render_children_styles() {
        $expected = 'Hello World';
        $subject = new Style(new ElementStub('', [], []), $expected);

        $actual = $subject->toString();
        $expected = $expected . 'BuilderStub::renderStyles';
        $this->assertEquals($expected, $actual);
    }
}
