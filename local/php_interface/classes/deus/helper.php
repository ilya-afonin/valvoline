<?php

namespace Deus\Helpers;

class Main {

    public static function getEnding($number, $words){
        $number = $number % 100;
        if ($number >= 11 && $number <= 19) {
            $ending=$words[2];
        }
        else {
            $i = $number % 10;
            switch ($i)
            {
                case (1):
                    $ending = $words[0];
                    break;
                case (2):
                case (3):
                case (4):
                    $ending = $words[1];
                    break;
                default:
                    $ending=$words[2];
            }
        }
        return $ending;
    }

    public static function getPhoneLink($phone){
        $phone = preg_replace('/\D/', '', $phone);
        return (!empty($phone)) ? "tel:+".$phone : "#";
    }

    public static function replaceStringTemplate($string, $template, $replacement){
        return ($string && $template && $replacement)
            ? str_replace($template, $replacement, $string)
            : $string;
    }

    public static function getShortFio($fio){
        $arrayFio = explode(' ', $fio);
        $name  = substr($arrayFio[1], 0, 1);
        $second  = substr($arrayFio[2], 0, 1);
        return $arrayFio[0].' '.$name.'. '.$second.'.';
    }

    
}