<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

use Bitrix\Main\Localization\Loc as Loc,
    Bitrix\Main\Context;

Loc::loadMessages(__FILE__);
$request = Context::getCurrent()->getRequest();

?>
<div class="map">
    <div class="map__map" id="map"></div>
    <div class="map__content">
        <div class="m-cont__title m-cont__title--compact" data-aos="fade-up">Выбрать другую точку
            <div class="m-cont__title-checked">
                <div class="m-cont__title-checked-name"><?=($_REQUEST['city_name'])?$_REQUEST['city_name']:'Москва'?></div>
                <div class="m-cont__drop">
                    <? foreach ($arResult["SECTIONS"] as $city): ?>
                        <a class="m-cont__drop-link m-cont__drop-link--map" data-id="<?= $city['ID'] ?>"><?= $city['NAME'] ?></a>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
        <div class="m-cont__tabs">
            <div class="m-cont__tabs-top">
                <div class="m-cont__tabs-button is-active" data-tab="type_1" style="display: block">Точки продаж</div>
                <div class="m-cont__tabs-button" data-tab="type_2">Дистрибьюторы</div>
                <div class="m-cont__tabs-opener">
                    <div class="m-cont__tabs-opener-bar"></div>
                    <div class="m-cont__tabs-opener-bar"></div>
                    <div class="m-cont__tabs-opener-bar"></div>
                </div>
            </div>
            <div class="m-cont__tabs-content" style="display: block;">
                <? if ($request->isAjaxRequest()): ?>
                    <? $APPLICATION->RestartBuffer(); ?>
                <? endif ?>

                <div class="m-cont__tabs-content-item" id="type_1" style="display:block;">
                    <? foreach ($arResult["SECTIONS"] as $arSec): ?>
                        <? foreach ($arSec["ELEMENTS"] as $key => $arItem): ?>

                            <? if ($arItem["IBLOCK_ID"] == 8 && $arItem['IBLOCK_SECTION_ID'] == $arSec['ID']): ?>
                                <div class="m-cont__tabs-item">
                                    <a class="m-cont__tabs-item-title" data-points="<?= implode(',', array($arItem['PROPERTY_ATT_LAT_VALUE'], $arItem['PROPERTY_ATT_LNG_VALUE'])) ?>"><?= $arItem['NAME'] ?></a>
                                    <div class="m-cont__tabs-item-addr"><?= $arItem['PROPERTY_ATT_ADDRESS_VALUE'] ?></div>
                                </div>
                            <? endif; ?>

                        <? endforeach; ?>
                    <? endforeach; ?>
                </div>
                <div class="m-cont__tabs-content-item" id="type_2">
                    <? foreach ($arResult["SECTIONS"] as $arSec): ?>
                        <? foreach ($arSec["ELEMENTS"] as $key => $arItem): ?>
                            <? if ($arItem["IBLOCK_ID"] == 6 && $arItem['PROPERTY_ATT_CITIES_VALUE'] == $arSec['ID']): ?>
                                <div class="m-cont__tabs-item">
                                    <a class="m-cont__tabs-item-title" data-points="<?= implode(',', array($arItem['PROPERTY_ATT_LAT_VALUE'], $arItem['PROPERTY_ATT_LNG_VALUE'])) ?>"><?= $arItem['NAME'] ?></a>
                                    <div class="m-cont__tabs-item-addr"><?= $arItem['PROPERTY_ATT_ADDRESS_VALUE'] ?></div>
                                </div>
                            <? endif ?>
                        <? endforeach; ?>
                    <? endforeach; ?>

                </div>

                <script class="ajax-script">
                    arPoints = {
                        marker: '/local/templates/main/tpl/dist/assets/images/static/marker-2.svg',
                        initial: '<?= ($_GET['city_name']) ? $_GET['city_name'] : 'Москва' ?>',
                        groups: <?= CUtil::PhpToJSObject($arResult['POINTS']) ?>
                    };
                </script>

                <? if ($request->isAjaxRequest()): ?>
                    <? die(); ?>
                <? endif ?>

            </div>
        </div>
    </div>
</div>

