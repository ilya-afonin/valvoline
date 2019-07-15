<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
global $APPLICATION;
?>

<div class="welcome" style="background-image:url(<?= CFile::GetPath(\COption::GetOptionString("askaron.settings", "UF_VIDEO_PREV_MAIN")); ?>)">
    <video class="welcome__video" autoplay loop muted>
        <source src="<?= CFile::GetPath(\COption::GetOptionString("askaron.settings", "UF_VIDEO_MAIN")); ?>?t=3">
    </video>
    <div class="welcome__inner" data-aos="fade-up" data-aos-delay="100">
        <div class="welcome__content">
            <div class="welcome__content-title">
                <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/slider/slider-title.php", Array(), Array("MODE" => "text")); ?>
            </div>
            <div class="welcome__content-text">
                <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/slider/slider-text.php", Array(), Array("MODE" => "text")); ?>
            </div>
        </div>
        <div class="welcome__note">
            <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/slider/slider-next.php", Array(), Array("MODE" => "text")); ?>
        </div>
        <?php
        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "main-socials",
            Array(
                "IBLOCK_TYPE" => "content",
                "IBLOCK_ID" => "2",
                "NEWS_COUNT" => "100",
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FIELD_CODE" => array(""),
                "PROPERTY_CODE" => array("LINK", "ICON_MAIN"),
                "CHECK_DATES" => "N",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
            ),
            false
        );
        ?>

        <?php
        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "main-slider",
            Array(
                "IBLOCK_TYPE" => "content",
                "IBLOCK_ID" => "1",
                "NEWS_COUNT" => "100",
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FIELD_CODE" => array(""),
                "PROPERTY_CODE" => array("LINK", "ICON"),
                "CHECK_DATES" => "N",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
            ),
            false
        );
        ?>
    </div>
</div>