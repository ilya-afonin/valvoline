<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<? if (count($arResult['ITEMS']) > 0): ?>
    <ul class="a-openinfo__list">
        <? foreach ($arResult['ITEMS'] as $key => $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <li class="a-openinfo__item">
                <a class="a-openinfo__link" href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['FILE_VALUE']['SRC']?>" download target="_blank"><?= $arItem['NAME'] ?></a>
            </li>
        <?endforeach;?>
    </ul>
<? endif; ?>