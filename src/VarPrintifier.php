<?php

namespace PHPVarPrintifier;

class VarPrintifier
{
    public static function print($value, $func = 'var_export', $height = '300px', $width = '100%', $theme = 'dracula', $exit = true) {
        $editorId = $func . '_editor';

        // Create the initial HTML for the Ace editor
        echo sprintf('<div id="%s" style="height: %s; width: %s;"></div>', $editorId, $height, $width);
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.min.js"></script>';

        // Get the current editor instance (or create a new one if it doesn't exist)
        echo sprintf('<script>var %s = ace.edit("%s");</script>', $editorId, $editorId);
        echo sprintf('<script>%s.setTheme("ace/theme/%s");</script>', $editorId, $theme);
        echo sprintf('<script>%s.session.setMode("ace/mode/javascript");</script>', $editorId);
        echo sprintf('<script>%s.setReadOnly(true);</script>', $editorId);
        echo sprintf('<script>%s.setValue(%s);</script>', $editorId, json_encode($func($value, true)));

        if ($exit) {
            exit();
        }
    }

    public static function var_dump($value, $height = '300px', $width = '100%', $theme = 'dracula', $exit = true) {
        self::print($value, 'var_dump', $height, $width, $theme, $exit);
    }

    public static function print_r($value, $height = '300px', $width = '100%', $theme = 'dracula', $exit = true) {
        self::print($value, 'print_r', $height, $width, $theme, $exit);
    }
}
