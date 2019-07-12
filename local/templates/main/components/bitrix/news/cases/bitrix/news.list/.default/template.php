<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc as Loc,
    Bitrix\Main\Context;

Loc::loadMessages(__FILE__);
$request = Context::getCurrent()->getRequest();

$this->setFrameMode(true);
global $APPLICATION;

?>
<? if (count($arResult['ITEMS']) > 0): ?>

        <div class="c-cases">


        <? if ($request->isAjaxRequest()): ?>
            <?$APPLICATION->RestartBuffer();?>
        <? endif ?>
    <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="c-case row wow fadeIn" data-wow-offset="200" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="c-case__left col-lg-3 col-12">
                <div class="c-case__text">
                    <a class="c-case__name" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?= $arItem['NAME'] ?></a>
                    <div class="c-case__description"><?= $arItem['PREVIEW_TEXT'] ?></div>
                </div>
            </div>
            <div class="c-case__right col-lg-9 col-12">
                <div class="c-case__image-wrapper">
                    <div class="c-case__image" style="background-image: url(<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>)"></div>
                    <a class="c-case__link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= Loc::getMessage('SHOW_CASE'); ?></a>
                </div>
            </div>
        </div>
    <? endforeach; ?>
    <?if(!empty($arResult['NAV_STRING'])):?>
        <div class="show-more row">
            <div class="cases__show-more-wrapper col-lg-9 col-12 offset-lg-3">
                <?=$arResult['NAV_STRING']?>
            </div>
        </div>
    <?endif;?>
    <? if ($request->isAjaxRequest()): ?>
        <? die(); ?>
    <? endif ?>

    </div>


<? endif; ?>


