<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
  die();
}

// получаем разделы
$dbResSect = CIBlockSection::GetList(
    Array("NAME" => "ASC"),
    Array("IBLOCK_ID" => 8, 'DEPTH_LEVEL' => '1', "ACTIVE" => "Y")
);
//Получаем разделы и собираем в массив
while ($sectRes = $dbResSect->GetNext()) {
  $arSections[] = $sectRes;
}

//Собираем  массив из Разделов и элементов
foreach($arSections as $arSection){
  foreach($arResult["ITEMS"] as $key=>$arItem){
    if($arItem['PROPERTY_ATT_CITIES_VALUE'] == $arSection['ID'] || $arItem['IBLOCK_SECTION_ID'] == $arSection['ID']){
      $arSection['ELEMENTS'][] =  $arItem;
    }
  }
  $arElementGroups[] = $arSection;
}
$arResult["SECTIONS"] = $arElementGroups;

//Собираем метки
$arResult['POINTS'] = array();

foreach ($arResult["SECTIONS"] as $arSec) {

  $points = array();

  foreach ($arSec['ELEMENTS'] as $arItem) {

    $points[] = array(
        'id' => $arItem['ID'],
        'name' => $arItem['NAME'],
        'url' => $arItem['PROPERTY_ATT_SITE_VALUE'],
        'address' => (($arItem["PROPERTY_ATT_CITY_VALUE"])?$arItem["PROPERTY_ATT_CITY_VALUE"].', ':'').$arItem["PROPERTY_ATT_ADDRESS_VALUE"],
        'phone' => $arItem["PROPERTY_ATT_PHONE_VALUE"],
        'email' => $arItem["PROPERTY_ATT_EMAIL_VALUE"],
        'coords' =>  [$arItem["PROPERTY_ATT_LAT_VALUE"], $arItem["PROPERTY_ATT_LNG_VALUE"]]
    );

  }

  $cities = array(
      'group' => $arSec['NAME'],
      'points' => $points
  );

  $arResult['POINTS'][] = $cities;

}