<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<? if (count($arResult['ITEMS']) > 0): ?>

    <div class="welcome__w-slider" data-aos="fade-up" data-aos-delay="300">
        <div class="w-slider">
            <div class="w-slider__scene owl-carousel owl-theme">
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="w-slider__slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <div class="w-slider__slide-img">
                            <img class="w-slider__slide-img-file" src="<?=CFile::GetPath($arItem['PROPERTIES']['ICON']['VALUE'])?>" alt="<?=$arItem['NAME']?>">
                        </div>
                        <div class="w-slider__slide-content">
                            <div class="w-slider__slide-title"><?=$arItem['NAME']?></div>
                            <div class="w-slider__slide-text"><?=$arItem['PREVIEW_TEXT']?></div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
            <div class="w-slider__controls">
                <div class="w-slider__counter">
                    <div class="w-slider__counter-current"></div>
                    <div class="w-slider__counter-line"><span class="animated"></span></div>
                    <div class="w-slider__counter-value"></div>
                </div>
                <div class="w-slider__arrows"></div>
            </div>
        </div>
    </div>

<? endif; ?>

