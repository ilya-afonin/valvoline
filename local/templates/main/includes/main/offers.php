<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
global $APPLICATION;
?>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "main-offers",
    Array(
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => "4",
        "NEWS_COUNT" => "100",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FIELD_CODE" => array(""),
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
    ),
    false
);
?>