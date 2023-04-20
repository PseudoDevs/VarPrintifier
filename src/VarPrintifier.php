<?php

namespace PHPVarPrintifier;

class VarPrintifier
{
    public static function print($value, $func = 'var_export', $exit = true) {
        $code = htmlspecialchars($func($value ?? '', true));

        // Custom syntax highlighting styles
        $css = '
            <style>
            pre {
                background-color: #2f3640;
                color: #fff;
                padding: 1rem;
                font-family: monospace;
                font-size: 14px;
                line-height: 1.5;
            }
                .vp-keyword { color: #6DC6FF; }
                .vp-string { color: #A8FF60; }
                .vp-number { color: #FFB977; }
                .vp-comment { color: #7F848E; font-style: italic; }
            </style>
        ';

        // Custom syntax highlighting patterns and their corresponding callback functions
        $patterns = [
            '/(?<!\\\\)(["\'])(?:\\\\.|(?!\1).)*\1/' => function ($match) {
                return '<span class="vp-string">' . $match[0] . '</span>';
            }, // Strings
            '/(?<!\w|-)([0-9][0-9\.e+-]*)/' => function ($match) {
                return '<span class="vp-number">' . $match[0] . '</span>';
            }, // Numbers
            '/(=>|\bArray\b|\bbool\b|\bboolean\b|\bnull\b|\bNULL\b|\bint\b|\binteger\b|\bfloat\b|\bdouble\b|\bstring\b|\bresource\b|\bobject\b|\bthis\b|\bself::\b)/' => function ($match) {
                return '<span class="vp-keyword">' . $match[0] . '</span>';
            }, // Keywords
            '/#.*$/m' => function ($match) {
                return '<span class="vp-comment">' . $match[0] . '</span>';
            }, // Comments
        ];

        // Apply syntax highlighting
        $code = preg_replace_callback_array($patterns, $code);

        // Output the styles and HTML
        echo $css . '<pre>' . $code . '</pre>';

        if ($exit) {
            exit();
        }
    }

    public static function var_dump($value, $exit = true) {
        self::print($value, 'var_dump', $exit);
    }

    public static function print_r($value, $exit = true) {
        self::print($value, 'print_r', $exit);
    }
}
