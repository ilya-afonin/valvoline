<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

// получаем разделы
$dbResSect = CIBlockSection::GetList(
    Array("SORT"=>"ASC"),
    Array("IBLOCK_ID"=>$arParams['IBLOCK_ID']),
    false,
    Array('ID', 'IBLOCK_ID', 'NAME', 'DESCRIPTION', 'UF_*')
);
//Получаем разделы и собираем в массив
while($sectRes = $dbResSect->GetNext())
{
    $arSections[] = $sectRes;
}
$arResult['SECTIONS'] = $arSections;
Debug::dtc($arResult, '$arSection');
//Собираем  массив из Разделов и элементов
/*foreach($arSections as $arSection){
    foreach($arResult["ITEMS"] as $key=>$arItem){
        if($arItem['IBLOCK_SECTION_ID'] == $arSection['ID']){
            $arSection['ELEMENTS'][] =  $arItem;
        }
    }
    $arElementGroups[] = $arSection;
}
$arResult["ITEMS"] = $arElementGroups;*/