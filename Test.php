<?php

require_once("Magic.php");

class Test
{
    public static function checkMagic($enter, $expected)
    {
        $result = Magic::reverseFraseAccordingToTask($enter);

        if ($result == $expected) {
            return "Результат совпадает с ожидаемым";
        } else {
            return "Результат не совпадает с ожидаемым";
        }
    }
}