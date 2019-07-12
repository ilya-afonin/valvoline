<?php

    $img = CFile::ResizeImageGet(
        $arResult['DETAIL_PICTURE']['ID'],
        array("width" => 350, "height" => 345),
        BX_RESIZE_IMAGE_EXACT,
        true,
        false
    );
    $arResult['DETAIL_PICTURE']['SRC'] = $img['src'];


    if (!empty($arResult["PROPERTIES"]["MORE_PHOTOS"]["VALUE"])){
        foreach ($arResult["PROPERTIES"]["MORE_PHOTOS"]["VALUE"] as $photo){
            $s = CFile::ResizeImageGet(
                $photo,
                array("width" => 1920, "height" => 1080),
                BX_RESIZE_IMAGE_EXACT,
                true,
                false
            );
            if ($s){
                $pics[] = $s['src'];
            }
        }
    }

$arResult['PROPERTIES']["MORE_PHOTOS"]['VALUE'] = $pics;

global $arrFilterSpecialization;
$arrFilterSpecialization['ID'] = $arResult['PROPERTIES']['SPECIALIZATION']['VALUE'];

