<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
global $APPLICATION;
?>
<div class="m-articles" data-aos="fade-up">
    <div class="m-articles__top">
        <div class="m-articles__title">
            <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/articles/articles-header.php", Array(), Array("MODE" => "text")); ?>
        </div>
        <a class="m-articles__link" href="/articles/">
            <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/articles/articles-link.php", Array(), Array("MODE" => "text")); ?>
        </a>
    </div>
    <div class="m-articles__content">
        <?php
        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "articles-list",
            Array(
                "IBLOCK_TYPE" => "content",
                "IBLOCK_ID" => "5",
                "NEWS_COUNT" => "4",
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FIELD_CODE" => array("TAGS", "DETAIL_PICTURE"),
                "PROPERTY_CODE" => array("", ""),
                "CHECK_DATES" => "N",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "DISPLAY_BOTTOM_PAGER" => "N"
            ),
            false
        );
        ?>
    </div>
</div>

