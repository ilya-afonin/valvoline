<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<? if (count($arResult['ITEMS']) > 0): ?>

    <div class="i-team__scene">
        <div class="i-team__slide">
            <div class="i-team__left">
                <div class="i-team__wrapper">
                    <div class="i-team__image">
                        <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
                            <img class="i-team__image-img<?=($k == 0)?' active':''?>" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>">
                        <?endforeach;?>
                    </div>
                </div>
            </div>
            <div class="i-team__right">
                <div class="i-team__text">
                    <h3 class="i-team__title">Наша команда</h3>
                    <div class="i-team__counter"></div>
                    <div class="i-team__sliders owl-carousel wow fadeIn">
                        <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
                            <?
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <div class="i-team__slider-item" data-dot="&lt;span&gt;<?= ($k < 10) ? '0' . ($k + 1) : $k + 1 ?>&lt;/span&gt;" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                <div class="i-team__description splittext">
                                    <?= $arItem['PREVIEW_TEXT'] ?>
                                </div>
                                <div class="i-team__author">—&nbsp;&nbsp;<?= $arItem['NAME'] ?></div>
                                <div class="i-team__author-post"><?= $arItem['PROPERTIES']['POSITION']['VALUE'] ?></div>
                            </div>
                        <? endforeach; ?>
                    </div>
                    <div class="s-navigation"></div>
                </div>
            </div>
        </div>
    </div>
<? endif; ?>

