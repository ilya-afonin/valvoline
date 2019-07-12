<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */

///* Слайдер изображений */
//$slides = array();
//
//if (!empty($arResult["PROPERTIES"]["IMAGES"]["VALUE"]) && count($arResult["PROPERTIES"]["IMAGES"]["VALUE"]) > 0){
//    foreach ($arResult["PROPERTIES"]["IMAGES"]["VALUE"] as $k => $slide){
//        $path = CFile::ResizeImageGet($slide, array('width'=>1530, 'height'=>800), BX_RESIZE_IMAGE_EXACT, true);
//        if (!empty($path['src'])){
//            $description = (!empty($arResult["PROPERTIES"]["IMAGES"]["DESCRIPTION"][$k])) ?
//                            $arResult["PROPERTIES"]["IMAGES"]["DESCRIPTION"][$k] :
//                            $arResult["NAME"];
//            $full = CFile::GetPath($slide);
//            $slides[] = array("image" => $path['src'], "full" => $full, "description" => $description);
//        }
//    }
//}
//$arResult["SLIDER"] = $slides;

\Bitrix\Main\Loader::includeModule('dev2fun.opengraph');
\Dev2fun\Module\OpenGraph::Show($arResult['ID'],'element');

   /* $width = 870;
    $height = 260;

    if (!empty($arResult['PREVIEW_PICTURE']['ID'])){
        $path = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_EXACT, true);
        $arResult['IMAGE'] = $path['src'];
    }
*/
