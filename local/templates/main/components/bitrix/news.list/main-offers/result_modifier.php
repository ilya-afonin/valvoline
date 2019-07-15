<?php
foreach ($arResult['ITEMS'] as $k => $arItem){

    $img = CFile::ResizeImageGet(
        $arItem['PREVIEW_PICTURE']['ID'],
        array("width" => 1440, "height" => 600),
        BX_RESIZE_IMAGE_EXACT,
        true,
        false
    );

    $arResult['ITEMS'][$k]['RESIZED_PICTURE']['SRC'] = $img['src'];

}
