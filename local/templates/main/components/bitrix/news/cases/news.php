<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Context;

$request = Context::getCurrent()->getRequest();
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
<? if (!$request->isAjaxRequest()): ?>


    <div class="clients">
    <div class="container">
    <div id="clients__map">
        <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/clients-map.php", Array(), Array("MODE" => "html")); ?>
    </div>

    <? include($_SERVER['DOCUMENT_ROOT'] . '/local/tools/ajax/clients-list.php'); ?>

    <div class="s-content row">
        <h3 class="s-title col-lg-3 col-12">
            <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/clients_case-title.php", Array(), Array("MODE" => "text")); ?>
        </h3>
        <div class="s-text col-lg-9 col-12">
            <div class="s-description">
                <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/clients_case-description.php", Array(), Array("MODE" => "text")); ?>
            </div>
        </div>
    </div>
<? endif ?>
<? include($_SERVER['DOCUMENT_ROOT'] . '/local/tools/ajax/cases-list.php') ?>
<? if (!$request->isAjaxRequest()): ?>
    </div>
    </div>
<? endif ?>