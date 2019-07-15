<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
global $APPLICATION;
?>

<div class="m-cont" data-aos="fade-up">
    <div class="m-cont__inner">
        <div class="m-cont__title">
            <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/points/points-header.php", Array(), Array("MODE" => "html")); ?>
            <div class="m-cont__title-checked">
                <div class="m-cont__title-checked-name">Москве</div>
                <div class="m-cont__drop"><a class="m-cont__drop-link" href="#">Москва</a>
                    <a class="m-cont__drop-link" href="#">Санкт-Петербург</a>
                    <a class="m-cont__drop-link" href="#">Новосибирск</a>
                    <a class="m-cont__drop-link" href="#">Екатеринбург</a>
                    <a class="m-cont__drop-link" href="#">Нижний Новгород</a>
                    <a class="m-cont__drop-link" href="#">Казань</a>
                    <a class="m-cont__drop-link" href="#">Москва</a>
                    <a class="m-cont__drop-link" href="#">Санкт-Петербург</a>
                    <a class="m-cont__drop-link" href="#">Новосибирск</a>
                    <a class="m-cont__drop-link" href="#">Екатеринбург</a>
                    <a class="m-cont__drop-link" href="#">Нижний Новгород</a>
                    <a class="m-cont__drop-link" href="#">Казань</a>
                </div>
            </div>
        </div>
        <div class="m-cont__button">
            <a class="button button--red button--compact" href="#">Показать на карте</a></div>
        <div class="m-cont__stats">
            <div class="m-cont__stat">
                <div class="m-cont__stat-value">
                    <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/points/points-sales.php", Array(), Array("MODE" => "text")); ?>
                </div>
                <div class="m-cont__stat-name">точек<br> продаж</div>
            </div>
            <div class="m-cont__stat">
                <div class="m-cont__stat-value">
                    <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/points/points-distrib.php", Array(), Array("MODE" => "text")); ?>
                </div>
                <div class="m-cont__stat-name">городов</div>
            </div>
        </div>
    </div>
</div>