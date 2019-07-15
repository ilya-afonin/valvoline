<?php

namespace Deus\Helpers;

use Bitrix\Main\IO\File;
use Bitrix\Main\Context;
use Bitrix\Main\Application;

class Main {

    private static $includePath = "/local/templates/main/includes/";

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

    public static function getCurrentPage()
    {
        $page = "text";
        $request = Context::getCurrent()->getRequest();
        $dir =  $request->getRequestedPageDirectory();

        if (defined("ERROR_404")) {
            $page = "404";
        } elseif (!$dir) {
            $page = "main";
        } elseif ($request->get("pageType")) {
            $page = $request->get("pageType");
        } elseif (defined("PAGE_CLASS")) {
            $page = PAGE_CLASS;
        }
        if (mb_strpos($dir, '/catalog/apartment/') !== false) {
            $page = "apartment";
        }

        return $page;
    }

    public static function includeFile($file)
    {
        $path = Application::getDocumentRoot(). self::$includePath . $file . ".php";
        if (File::isFileExists($path)) {
            include($path);
        }
    }

    public static function asset($file)
    {
        return SITE_TEMPLATE_PATH . "/assets/" . $file;
    }
}