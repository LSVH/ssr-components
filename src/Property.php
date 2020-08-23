<?php

namespace LSVH\SSRComponents;

class Property {
    protected $name;
    protected $value;

    public static function createInstance(array $fields): self {
        $name = array_key_exists('name', $fields) ? $fields['name'] : 'data-undefined';
        $value = array_key_exists('value', $fields) ? $fields['value'] : '';

        return new static($name, $value);
    }

    protected function __construct(string $name, $value) {
        $this->name = $name;
        $this->value = $value;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getValue() {
        return $this->value;
    }

    public function toString(): string {
        if ($this->isReservedProp() || $this->isEventAttribute()) {
            return '';
        }

        return $this->name.'="'.$this->value.'"';
    }

    protected function isReservedProp(): bool {
        $reserved = ['children'];

        return in_array($this->name, $reserved);
    }

    protected function isEventAttribute(): bool {
        $html5 = [
            'onafterprint','onbeforeprint','onbeforeunload',
            'onerror','onhashchange','onload',
            'onmessage','onoffline','ononline',
            'onpagehide','onpageshow','onpopstate',
            'onresize','onstorage','onunload',
            'onblur','onchange','onfocus',
            'oninput','oninvalid','onreset',
            'onsearch','onselect','onsubmit',
            'onkeydown','onkeypress','onkeyup',
            'onclick','ondblclick','onmousedown',
            'onmousemove','onmouseout','onmouseover',
            'onmouseup','onmousewheel','onwheel',
            'oncopy','oncut','onpaste',
            'onabort','oncanplay','oncanplaythrough',
            'oncuechange','ondurationchange','onemptied',
            'onended','onerror','onloadeddata',
            'onloadedmetadata','onloadstart','onpause',
            'onplay','onplaying','onprogress',
            'onratechange','onseeked','onseeking',
            'onstalled','onsuspend','ontimeupdate',
            'onvolumechange','onwaiting'
        ];

        return in_array($this->name, $html5);
    }
}
