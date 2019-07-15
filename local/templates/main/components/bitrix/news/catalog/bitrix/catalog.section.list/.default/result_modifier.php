<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['SECTIONS'] as $k => $arSection){

    $img = CFile::ResizeImageGet(
        $arSection['PICTURE']['ID'],
        array("width" => 470, "height" => 663),
        BX_RESIZE_IMAGE_PROPORTIONAL,
        true,
        false
    );

    $arResult['SECTIONS'][$k]['PICTURE']['SRC'] = $img['src'];
}
