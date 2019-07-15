<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['SECTIONS'] as $k => $arItem){

    $img = CFile::ResizeImageGet(
        $arItem['PICTURE']['ID'],
        array("width" => 433, "height" => 608),
        BX_RESIZE_IMAGE_PROPORTIONAL,
        true,
        false
    );

    $arResult['SECTIONS'][$k]['PICTURE']['SRC'] = $img['src'];
}
