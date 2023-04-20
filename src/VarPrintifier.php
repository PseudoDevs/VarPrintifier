<?php

namespace PHPVarPrintifier;

class VarPrintifier
{
    public static function dump($value, $exit = true) {
        $editorId = 'dump-editor';
        $editorHeight = '300px';
        $editorWidth = '100%';

        echo sprintf('<div id="%s" style="height: %s; width: %s;"></div>', $editorId, $editorHeight, $editorWidth);
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" integrity="sha512-VVAeqwJF1Q4DPRzZZL9Q2IKgE0WmB3D/A+HITb71PhEDAZjK+BZc8dkRlhzX9M9IMjcE30h7y8RvOj6/v2U5ag==" crossorigin="anonymous"></script>';
        echo sprintf('<script>var %s = ace.edit("%s"); %s.setTheme("ace/theme/chrome"); %s.session.setMode("ace/mode/php"); %s.setReadOnly(true); %s.setValue(%s);</script>', $editorId, $editorId, $editorId, $editorId, $editorId, $editorId, json_encode(var_export($value, true)));
        if ($exit) {
            exit();
        }
    }

    public static function printR($value, $exit = true) {
        $editorId = 'printr-editor';
        $editorHeight = '300px';
        $editorWidth = '100%';

        echo sprintf('<div id="%s" style="height: %s; width: %s;"></div>', $editorId, $editorHeight, $editorWidth);
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" integrity="sha512-VVAeqwJF1Q4DPRzZZL9Q2IKgE0WmB3D/A+HITb71PhEDAZjK+BZc8dkRlhzX9M9IMjcE30h7y8RvOj6/v2U5ag==" crossorigin="anonymous"></script>';
        echo sprintf('<script>var %s = ace.edit("%s"); %s.setTheme("ace/theme/chrome"); %s.session.setMode("ace/mode/php"); %s.setReadOnly(true); %s.setValue(%s);</script>', $editorId, $editorId, $editorId, $editorId, $editorId, $editorId, json_encode(print_r($value, true)));
        if ($exit) {
            exit();
        }
    }
}
