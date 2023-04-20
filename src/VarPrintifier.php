<?php

namespace PHPVarPrintifier;

class VarPrintifier
{
    public static function dump($value, $exit = true) {
        echo "<div id='dump-editor' style='height: 300px; width: 100%;'></div>";
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js' integrity='sha512-VVAeqwJF1Q4DPRzZZL9Q2IKgE0WmB3D/A+HITb71PhEDAZjK+BZc8dkRlhzX9M9IMjcE30h7y8RvOj6/v2U5ag==' crossorigin='anonymous'></script>";
        echo "<script>var dumpEditor = ace.edit('dump-editor'); dumpEditor.setTheme('ace/theme/chrome'); dumpEditor.session.setMode('ace/mode/php'); dumpEditor.setReadOnly(true); dumpEditor.setValue(" . json_encode(var_export($value, true)) . ");</script>";
        if ($exit) {
            exit();
        }
    }

    public static function printR($value, $exit = true) {
        echo "<div id='printr-editor' style='height: 300px; width: 100%;'></div>";
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js' integrity='sha512-VVAeqwJF1Q4DPRzZZL9Q2IKgE0WmB3D/A+HITb71PhEDAZjK+BZc8dkRlhzX9M9IMjcE30h7y8RvOj6/v2U5ag==' crossorigin='anonymous'></script>";
        echo "<script>var printrEditor = ace.edit('printr-editor'); printrEditor.setTheme('ace/theme/chrome'); printrEditor.session.setMode('ace/mode/php'); printrEditor.setReadOnly(true); printrEditor.setValue(" . json_encode(print_r($value, true)) . ");</script>";
        if ($exit) {
            exit();
        }
    }
}