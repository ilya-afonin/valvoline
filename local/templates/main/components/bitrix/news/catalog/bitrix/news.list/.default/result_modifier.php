<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['ITEMS'] as $k => $arItem){

    $img = CFile::ResizeImageGet(
        $arItem['PREVIEW_PICTURE']['ID'],
        array("width" => 190, "height" => 360),
        BX_RESIZE_IMAGE_PROPORTIONAL,
        true,
        false
    );

    $arResult['ITEMS'][$k]['PREVIEW_PICTURE']['SRC'] = $img['src'];
}