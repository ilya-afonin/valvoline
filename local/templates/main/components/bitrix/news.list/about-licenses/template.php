<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<? if (count($arResult['ITEMS']) > 0): ?>

    <div class="licenses col-lg-9 offset-lg-3 col-12">
    <? foreach ($arResult["ITEMS"] as $arSection): ?>
        <div class="license__item">
            <div class="license">
                <div class="license__top"><?= $arSection['NAME'] ?></div>
                <div class="license__list">
                <? foreach ($arSection["ELEMENTS"] as $key => $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="license__list-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <div class="license__name">
                            <?=$arItem['PREVIEW_TEXT']?>
                        </div>
                    </div>
                <? endforeach;?>
                </div>
            </div>
        </div>
    <? endforeach ?>
    </div>

<? endif; ?>