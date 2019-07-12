<?php
foreach ($arResult['ITEMS'] as $k => $arItem){

    $img = CFile::ResizeImageGet(
        $arItem['PREVIEW_PICTURE']['ID'],
        array("width" => 270, "height" => 350),
        BX_RESIZE_IMAGE_EXACT,
        true,
        false
    );

    $arResult['ITEMS'][$k]['PREVIEW_PICTURE']['SRC'] = $img['src'];

}
