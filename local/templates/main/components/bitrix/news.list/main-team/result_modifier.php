<?php
foreach ($arResult['ITEMS'] as $k => $arItem){

    $img = CFile::ResizeImageGet(
        $arItem['PREVIEW_PICTURE']['ID'],
        array("width" => 530, "height" => 560),
        BX_RESIZE_IMAGE_PROPORTIONAL,
        true,
        false
    );

    $arResult['ITEMS'][$k]['PREVIEW_PICTURE']['SRC'] = $img['src'];


    /*if (!empty($arItem["PROPERTIES"]["MORE_PHOTOS"]["VALUE"])){
        foreach ($arItem["PROPERTIES"]["MORE_PHOTOS"]["VALUE"] as $photo){
            $s = CFile::ResizeImageGet(
                $photo,
                array("width" => 1920, "height" => 1080),
                BX_RESIZE_IMAGE_PROPORTIONAL,
                true,
                false
            );
            if ($s){
                $pics[] = $s['src'];
            }
        }
    }*/

//$arResult['ITEMS'][$k]['PROPERTIES']["MORE_PHOTOS"]['VALUE'] = $pics;
}
