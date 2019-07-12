<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc as Loc,
    Bitrix\Main\Context;

Loc::loadMessages(__FILE__);
$request = Context::getCurrent()->getRequest();

$this->setFrameMode(true);

?>
<? if (count($arResult['ITEMS']) > 0): ?>

<? if (!$request->isAjaxRequest()): ?>

<div class="dropdown__list link link--drop link--drop-red wow fadeIn">
    <div class="dropdown__current">
        <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/clients_filter-title.php", Array(), Array("MODE" => "text")); ?>
        <span class="dropdown__current-name">Все</span>
        <input type="hidden" name="dropdown_current" value="0">
    </div>
    <div class="dropdown__drop">
        <a class="dropdown__drop-link js-industry-btn" href="#" data-industry-id="0">Все</a>
        <? foreach ($arResult['INDUSTRIES'] as $s => $arIndustry): ?>
            <a class="dropdown__drop-link js-industry-btn" href="#" data-industry-id="<?= $arIndustry['ID'] ?>"><?= $arIndustry['NAME'] ?></a>
        <? endforeach; ?>
    </div>
</div>


<div class="clients__filter">
    <div class="i-clients__slider">
        <div class="i-clients__scene owl-carousel">
            <? endif ?>

            <div class="i-clients">
                <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <? if ($k % 12 == 0 && $k != 0): ?></div>
            <div class="i-clients"><? endif; ?>
                <div class="i-client wow fadeIn" data-wow-delay="<?=$k*60?>ms" id="<?= $this->GetEditAreaId($arItem['ID']); ?>"> 
                    <div class="i-client__img">
                        <img class="i-client__img" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>">
                    </div>
                </div>
                <? endforeach; ?>
            </div>

            <? if (!$request->isAjaxRequest()): ?>

        </div>
        <div class="s__dots"></div>
    </div>
    <? endif; ?>
<? endif; ?>

