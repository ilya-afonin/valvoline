<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?php if (!empty($arResult["IMAGE"])){ ?>
    <div class="banner">
        <div class="banner-inner">
            <div class="banner-image"><img src="<?=$arResult["IMAGE"]?>" alt="<?=$arResult["NAME"]?>"></div>
        </div>
        <div class="banner-bg"></div>
    </div>
<?php } ?>

<?=$arResult["~DETAIL_TEXT"]?>