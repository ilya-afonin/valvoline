<?php

namespace Deus\EventHandlers;

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\Loader;

Loc::loadMessages(__FILE__);

class Search {

    public static function beforeIndexHandler($arFields)
    {
        if (Loader::includeModule("iblock")){
            
            if($arFields["MODULE_ID"] == "iblock" && $arFields["PARAM2"] == 1){

                $db_props = \CIBlockElement::GetProperty(                        // Запросим свойства индексируемого элемента
                    $arFields["PARAM2"],         // BLOCK_ID индексируемого свойства
                    $arFields["ITEM_ID"],          // ID индексируемого свойства
                    array("sort" => "asc"),       // Сортировка (можно упустить)
                    Array("CODE"=>"COLLECTION")); // CODE свойства (в данном случае артикул)
                if($ar_props = $db_props->Fetch())
                    $arFields["TITLE"] .= ". Коллекция - ".$ar_props["VALUE"];   // Добавим свойство в конец заголовка индексируемого элемента
            }

            return $arFields; // вернём изменения
        }
    }

}