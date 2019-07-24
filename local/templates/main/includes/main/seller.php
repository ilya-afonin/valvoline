<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
use Deus\Helpers\Main;
global $APPLICATION;
?>

<div class="seller" data-aos="fade-up" id="distr">
    <div class="seller__row">
        <div class="seller__card">
            <div class="seller__card-name">Каталог</div>
            <div class="seller__card-image">
                <img class="seller__card-image-file" src="<?=CFile::GetPath(COption::GetOptionString( "askaron.settings", "UF_IMG_CATALOG"));?>" alt="Каталог">
                <a class="seller__card-image-link" href="<?=CFile::GetPath(COption::GetOptionString( "askaron.settings", "UF_FILE_CATALOG"));?>" target="_blank"></a>
                <div class="seller__card-image-icon">Скачать</div>
            </div>
        </div>
        <div class="seller__content">
            <div class="seller__title">
                <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/seller/seller-title.php", Array(), Array("MODE" => "text")); ?>
            </div>
            <div class="seller__text">
                <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/seller/seller-text.php", Array(), Array("MODE" => "html")); ?>
            </div>
            <a class="seller__mail" href="mailto:<?=COption::GetOptionString( "askaron.settings", "UF_EMAIL_DISTRIB");?>"><?=COption::GetOptionString( "askaron.settings", "UF_EMAIL_DISTRIB");?></a>
            <a class="seller__list" href="<?=CFile::GetPath(COption::GetOptionString( "askaron.settings", "UF_FILE_DISTRIB"));?>" target="_blank">
                <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/seller/seller-list.php", Array(), Array("MODE" => "text")); ?>
            </a>
        </div>
    </div>
</div>
