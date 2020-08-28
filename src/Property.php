<?php

namespace LSVH\SSRComponents;

use LSVH\SSRComponents\Contracts\Property as PropertyInterface;

class Property implements PropertyInterface
{
    protected $name;
    protected $value;

    public function __construct(string $name, string $value = null)
    {
        $this->name = strtolower($name);
        $this->value = $value;
    }

    public function toString(): string
    {
        if ($this->isEventAttribute() || !$this->isAttribute() || empty($this->name)) {
            return '';
        }

        if (empty($this->value)) {
            return $this->name;
        }

        return $this->name.'="'.$this->value.'"';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value = null): void
    {
        $this->value = $value;
    }

    protected function isEventAttribute(): bool
    {
        $html5 = [
            'onafterprint',
            'onbeforeprint',
            'onbeforeunload',
            'onerror',
            'onhashchange',
            'onload',
            'onmessage',
            'onoffline',
            'ononline',
            'onpagehide',
            'onpageshow',
            'onpopstate',
            'onresize',
            'onstorage',
            'onunload',
            'onblur',
            'onchange',
            'onfocus',
            'oninput',
            'oninvalid',
            'onreset',
            'onsearch',
            'onselect',
            'onsubmit',
            'onkeydown',
            'onkeypress',
            'onkeyup',
            'onclick',
            'ondblclick',
            'onmousedown',
            'onmousemove',
            'onmouseout',
            'onmouseover',
            'onmouseup',
            'onmousewheel',
            'onwheel',
            'oncopy',
            'oncut',
            'onpaste',
            'onabort',
            'oncanplay',
            'oncanplaythrough',
            'oncuechange',
            'ondurationchange',
            'onemptied',
            'onended',
            'onerror',
            'onloadeddata',
            'onloadedmetadata',
            'onloadstart',
            'onpause',
            'onplay',
            'onplaying',
            'onprogress',
            'onratechange',
            'onseeked',
            'onseeking',
            'onstalled',
            'onsuspend',
            'ontimeupdate',
            'onvolumechange',
            'onwaiting',
        ];

        return in_array($this->name, $html5);
    }

    protected function isAttribute(): bool
    {
        $html5 = [
            'accept',
            'accept-charset',
            'accesskey',
            'action',
            'align',
            'alink',
            'allow',
            'alt',
            'archive',
            'async',
            'autocapitalize',
            'autocomplete',
            'autofocus',
            'autoplay',
            'background',
            'bgcolor',
            'border',
            'buffered',
            'capture',
            'challenge',
            'char',
            'charoff',
            'charset',
            'checked',
            'cite',
            'class',
            'clear',
            'code',
            'codebase',
            'color',
            'cols',
            'colspan',
            'compact',
            'content',
            'contenteditable',
            'contextmenu',
            'controls',
            'coords',
            'crossorigin',
            'csp ',
            'datetime',
            'decoding',
            'default',
            'defer',
            'dir',
            'dirname',
            'disabled',
            'download',
            'draggable',
            'dropzone',
            'enctype',
            'enterkeyhint',
            'enterkeyhint ',
            'face',
            'for',
            'form',
            'formaction',
            'formenctype',
            'formmethod',
            'formnovalidate',
            'formtarget',
            'frameborder',
            'headers',
            'height',
            'hidden',
            'high',
            'href',
            'hreflang',
            'hspace',
            'http-equiv',
            'icon',
            'id',
            'importance ',
            'inputmode',
            'integrity',
            'intrinsicsize ',
            'is',
            'ismap',
            'itemid',
            'itemprop',
            'itemref',
            'itemscope',
            'itemtype',
            'keytype',
            'kind',
            'label',
            'lang',
            'language',
            'link',
            'list',
            'loading ',
            'longdesc',
            'loop',
            'low',
            'manifest',
            'marginheight',
            'marginwidth',
            'max',
            'maxlength',
            'media',
            'method',
            'min',
            'minlength',
            'multiple',
            'muted',
            'name',
            'nohref',
            'nonce',
            'noresize',
            'novalidate',
            'object',
            'open',
            'optimum',
            'pattern',
            'ping',
            'placeholder',
            'poster',
            'preload',
            'radiogroup',
            'readonly',
            'referrerpolicy',
            'rel',
            'required',
            'rev',
            'reversed',
            'rows',
            'rowspan',
            'sandbox',
            'scope',
            'scoped',
            'scrolling',
            'selected',
            'shape',
            'size',
            'sizes',
            'slot',
            'span',
            'spellcheck',
            'src',
            'srcdoc',
            'srclang',
            'srcset',
            'start',
            'step',
            'style',
            'summary',
            'tabindex',
            'target',
            'text',
            'title',
            'translate',
            'type',
            'usemap',
            'valign',
            'value',
            'vlink',
            'vspace',
            'width',
            'wrap',
        ];

        return substr($this->name, 0, 5) === 'data-' || in_array($this->name, $html5);
    }
}
