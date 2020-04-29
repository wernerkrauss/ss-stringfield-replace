<?php


namespace Netwerkstatt\DBStringReplacement;


use SilverStripe\Core\Extension;

class ReplaceExtension extends Extension
{
    private static $casting = [
        'Replace' => 'HTMLText'
    ];

    private static $replacements = [
        '(c)' => '&copy;',
        '(r)' => '<sup>&reg;</sup>',
        '(tm)' => '<sup>&trade;</sup>',
        '|' => '<br>'
    ];

    public function Replace() {
        $replacements = $this->owner->config()->replacements;

        $search = array_keys($replacements);
        $replace = array_values($replacements);

        return str_replace($search, $replace, $this->owner->value);
    }

}
