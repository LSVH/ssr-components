<?php

namespace LSVH\SSRComponents;

use LSVH\SSRComponents\Contracts\Component as ComponentInterface;
use LSVH\SSRComponents\Contracts\Element as ElementInterface;
use LSVH\SSRComponents\Contracts\Style as StyleInterface;
use LSVH\SSRComponents\Contracts\Script as ScriptInterface;

class Component implements ComponentInterface {
    protected $element;
    protected $style;
    protected $script;

    public function __construct(
        ElementInterface $element,
        StyleInterface $style = null,
        ScriptInterface $script = null
    ) {
        $element->setComponentId(static::generateId());
        $this->element = $element;
        $this->style = $style;
        $this->script = $script;
    }

    public function renderElement(): string {
        return $this->element->toString();
    }

    public function renderStyle(): string {
        return $this->style ? $this->style->toString() : '';
    }

    public function renderScript(): string {
        return $this->script ? $this->script->toString() : '';
    }

    protected static function generateId(): string {
        $id = static::generateRandomString();
        if (static::isComponentIdUnique($id)) {
            return static::generateId();
        }

        return $id;
    }

    protected static function generateRandomString(int $length = 6): string {
        $str = static::randomAlphaNum();
        while (strlen($str) <= $length) {
            $str .= static::randomAlphaNum();
        }

        return $str;
    }

    protected static function randomAlphaNum(): string {
        $randUpperChar = chr(random_int(65,90));
        $randLowerChar = chr(random_int(97,122));
        $randDigit = random_int(0, 9);

        $a = [$randUpperChar, $randLowerChar, $randDigit];

        return $a[random_int(0, count($a) - 1)];;
    }

    protected static function isComponentIdUnique(string $name): bool {
        $base = static::getStaticDirectory() . DIRECTORY_SEPARATOR . $name;
        $extensions = ['.php', '.css', '.js'];

        return count(array_filter($extensions, function ($extension) use ($base) {
            return file_exists($base . $extension);
        }));
    }

    protected static function getStaticDirectory(): string {
        if (defined('SSRC_STATIC') && file_exists($dir = constant('SSRC_STATIC'))) {
            return $dir;
        }

        if (!file_exists($dir = 'static') && !mkdir($dir, 0777, true)) {
            die('Unable to create a directory for static files');
        }

        return $dir;
    }
}
