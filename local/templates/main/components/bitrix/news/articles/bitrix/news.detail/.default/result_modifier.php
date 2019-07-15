<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */

/* Слайдер изображений */
/*$slides = array();

if (!empty($arResult["PROPERTIES"]["IMAGES"]["VALUE"]) && count($arResult["PROPERTIES"]["IMAGES"]["VALUE"]) > 0){
    foreach ($arResult["PROPERTIES"]["IMAGES"]["VALUE"] as $k => $slide){
        $path = CFile::ResizeImageGet($slide, array('width'=>1530, 'height'=>800), BX_RESIZE_IMAGE_EXACT, true);
        if (!empty($path['src'])){
            $description = (!empty($arResult["PROPERTIES"]["IMAGES"]["DESCRIPTION"][$k])) ?
                            $arResult["PROPERTIES"]["IMAGES"]["DESCRIPTION"][$k] :
                            $arResult["NAME"];
            $full = CFile::GetPath($slide);
            $slides[] = array("image" => $path['src'], "full" => $full, "description" => $description);
        }
    }
}
$arResult["SLIDER"] = $slides;*/

/*
    $width = 870;
    $height = 260;

    if (!empty($arResult['PREVIEW_PICTURE']['ID'])){
        $path = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_EXACT, true);
        $arResult['IMAGE'] = $path['src'];
    }*/


/*$arFilter = Array(
    "IBLOCK_ID" => 4,
    "ACTIVE_DATE" => "Y",
    "ACTIVE" => "Y",
);

$res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, false, Array('ID', 'IBLOCK_ID', 'NAME', 'DETAIL_PAGE_URL', 'DETAIL_PICTURE'), false);

while ($ob = $res->GetNext()) {
    $objs[] = array(
        "ID" => $ob["ID"],
        "DETAIL_PAGE_URL" => $ob["DETAIL_PAGE_URL"],
        "NAME" => $ob["NAME"],
        "DETAIL_PICTURE" => $ob["DETAIL_PICTURE"],
    );
}

for ($i = 0; $i < count($objs); $i++) {
    if ($objs[$i]["ID"] == $arResult["ID"]) {
        $next = $i + 1;
        $prev = $i - 1;

        if ($prev < 0) {
            $prev = count($objs) - 1;
        }

        if ($next == count($objs)) {
            $next = 0;
        }
    }
}

$arResult["NEXT"]['URL'] = $objs[$next]["DETAIL_PAGE_URL"];
$arResult["NEXT"]['IMG'] = $objs[$next]["DETAIL_PICTURE"];
$arResult["NEXT"]['NAME'] = $objs[$next]["NAME"];

$arResult["PREV"]['URL'] = $objs[$prev]["DETAIL_PAGE_URL"];
$arResult["PREV"]['IMG'] = $objs[$prev]["DETAIL_PICTURE"];
$arResult["PREV"]['NAME'] = $objs[$prev]["NAME"];*/


