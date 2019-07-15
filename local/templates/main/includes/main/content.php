<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
global $APPLICATION;
?>
<div class="m-content-wrapper" id="about">
    <div class="m-content">
        <div class="m-content__promo">
            <div class="m-content__promo-card">
                <div class="m-content__promo-title">
                    <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/content/content-150.php", Array(), Array("MODE" => "text")); ?>
                </div>
                <div class="m-content__promo-text">
                    <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/content/content-years.php", Array(), Array("MODE" => "text")); ?>
                </div>
            </div>
        </div>
        <div class="m-content__content">
            <h3>
                <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/content/content-header.php", Array(), Array("MODE" => "text")); ?>
            </h3>
            <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/content/content-text1.php", Array(), Array("MODE" => "html")); ?>
            <div class="v-img">
                <a class="v-img__link" data-fancybox href="<?=\COption::GetOptionString("askaron.settings", "UF_MAIN_VIDEOLINK"); ?>"></a>
                <img src="<?= CFile::GetPath(\COption::GetOptionString("askaron.settings", "UF_MAIN_PICTURE")); ?>" alt="">
            </div>
            <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/content/content-text2.php", Array(), Array("MODE" => "html")); ?>
            <a class="m-content__final" target="_blank" href="//<?=\COption::GetOptionString("askaron.settings", "UF_VALVOLINK_MAIN"); ?>" data-link="<?=\COption::GetOptionString("askaron.settings", "UF_VALVOLINK_MAIN"); ?>"> </a>
        </div>
    </div>
</div>