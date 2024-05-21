<?php

class Magic {
    
    public static function reverseFraseAccordingToTask($phrase)
    {

        $phrase_array = explode(" ", $phrase);

        $result = [];
        foreach ($phrase_array as $word) {
            $result[] = self::reverse_word($word);
        }

        return implode(" ", $result);
    }


    private static function reverse_word($word)
    {
        $start = self::getStart($word);
        $end = self::getEnd($word);
        $content = self::trim_edges($word, $start, $end);

        if (preg_match("/'/", $content)) {
            $array_content = explode("'", $content);
        
            $result = '';
            for ($i = 0; $i < count($array_content); $i++) {
                $result .= self::reverse_subword($array_content[$i]);
                $result .= $i < count($array_content) - 1 ? "'" : "";
            }
        
            return $start . $result . $end;
        } else {

            return $start . self::reverse_subword($content) . $end;
        }
    }

    private static function reverse_subword($sub_word)
    {
        $sub_word_array = mb_str_split($sub_word);

        $uppercase_indexes = [];

        for ($i = 0; $i < count($sub_word_array); $i++) {

            if (preg_match("/[A-ZА-Я]/u", $sub_word_array[$i])) {
                $uppercase_indexes[] = $i;
            }
        }

        $reversed = array_reverse($sub_word_array);

        $result = "";
        for ($i = 0; $i < count($reversed); $i++) {
            if (in_array($i, $uppercase_indexes)) {
                $result .= mb_strtoupper($reversed[$i]);

            } else {
                $result .= mb_strtolower($reversed[$i]);
            }
        }

        return $result;
    }

    private static function trim_edges($str, $start, $end)
    {
        $content = self::remove_prefix($str, $start);
        $content = self::remove_suffix($content, $end);
        return $content;
    }

    private static function remove_suffix($text, $suffix)
    {
        $reversed_text = self::my_mb_strrev($text);
        $reversed_suffix = self::my_mb_strrev($suffix);
        if (mb_strpos($reversed_text, $reversed_suffix) === 0) {
            return self::my_mb_strrev(mb_substr($reversed_text, mb_strlen($reversed_suffix)));
        }
        return self::my_mb_strrev($reversed_text);
    }

    private static function remove_prefix($text, $prefix)
    {
        if (mb_strpos($text, $prefix) === 0) {
            return mb_substr($text, mb_strlen($prefix));
        }
        return $text;
    }

    private static function getStart($str)
    {
        $array = mb_str_split($str);

        $start = "";
        for ($i = 0; $i < count($array); $i++) {
            if (preg_match("/[^a-zA-Zа-яА-Я0-9]/u", $array[$i])) {
                $start .= $array[$i];
            } else {
                break;
            }
        }

        return $start;
    }

    private static function getEnd($str)
    {
        $array = mb_str_split($str);

        $end = "";
        for ($i = count($array) - 1; $i >= 0; $i--) {

            if (preg_match("/[^a-zA-Zа-яА-Я0-9]/u", $array[$i])) {

                $end .= $array[$i];
            } else {
                break;
            }
        }

        return self::my_mb_strrev($end);
    }

    private static function my_mb_strrev($str){
        $r = '';
        for ($i = mb_strlen($str); $i>=0; $i--) {
            $r .= mb_substr($str, $i, 1);
        }
        return $r;
    }


}
