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
    <div class="welcome__soc" data-aos="fade-up">
        <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="welcome__soc-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <a class="welcome__soc-link" href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>"></a>
                <div class="welcome__soc-img-wrapper">
                    <img class="welcome__soc-img" src="<?=CFile::GetPath($arItem['PROPERTIES']['ICON_MAIN']['VALUE'])?>" alt="<?=$arItem['NAME']?>">
                </div>
                <div class="welcome__soc-name"><?=$arItem['NAME']?></div>
            </div>
        <? endforeach; ?>
    </div>
<? endif; ?>