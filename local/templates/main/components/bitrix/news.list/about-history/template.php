<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<? if (count($arResult['ITEMS']) > 0): ?>
    <div class="a-history__slider">
        <div class="a-history__scene owl-carousel">
            <? foreach ($arResult['ITEMS'] as $key => $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="a-history__item wow fadeInUp" data-wow-delay="<?=80*$key?>ms" data-dot="&lt;span&gt;<?= $arItem['NAME'] ?>&lt;/span&gt;" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="a-history__image" style="background-image: url(<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>)"></div>
                    <div class="a-history__text">
                        <div class="a-history__name"><?= $arItem['NAME'] ?></div>
                        <div class="a-history__description"><?= $arItem['PREVIEW_TEXT'] ?></div>
                    </div>
                </div>

            <? endforeach; ?>
        </div>
        <div class="a-history__dots-wrapper">
            <div class="a-history__dots-slide"></div>
            <div class="a-history__dots"></div>
        </div>
    </div>



<? endif; ?>