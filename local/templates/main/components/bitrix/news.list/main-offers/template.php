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
<? if (count($arResult['ITEMS']) > 0): ?>
<div class="art-slider" data-aos="fade-up">
    <div class="art-slider__scene owl-carousel">
        <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="art-slider__slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>"
                 style="background-image: url(<?=$arItem['RESIZED_PICTURE']['SRC']?>)">
                <div class="art-slider__slide-content">
                    <div class="art-slider__title"><?=$arItem['NAME']?></div>
                    <div class="art-slider__button">
                        <a class="button button--white button--compact" href="<?=$arItem['DETAIL_PAGE_URL']?>">Подробнее</a>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
    <div class="art-slider__counter">
        <div class="w-slider__counter-current">01</div>
        <div class="w-slider__counter-line"><span class="animated"></span></div>
        <div class="w-slider__counter-value">07</div>
    </div>
    <div class="art-slider__arrows"></div>
</div>
<? endif; ?>







