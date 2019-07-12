<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arSelect = Array("ID", "NAME");
$arFilter = Array("IBLOCK_ID"=> 10, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array('SORT' => 'ASC'), $arFilter, false, false, $arSelect);
while($ob = $res->GetNext())
{
 $arIndustries[] = $ob;
}
$arResult['INDUSTRIES'] = $arIndustries;

foreach ($arResult['ITEMS'] as $k => $arItem){

    $img = CFile::ResizeImageGet(
        $arItem['PREVIEW_PICTURE']['ID'],
        array("width" => 150, "height" => 150),
        BX_RESIZE_IMAGE_PROPORTIONAL,
        true,
        false
    );

    $arResult['ITEMS'][$k]['PREVIEW_PICTURE']['SRC'] = $img['src'];
}
