<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?global $APPLICATION;?>
<?php
$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "main-catalog",
    [
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "3",
        "SECTION_ID" => "",
        "SECTION_CODE" => "",
        "SECTION_URL" => "",
        "COUNT_ELEMENTS" => "N",
        "TOP_DEPTH" => "1",
        "SECTION_FIELDS" => ["PICTURE", "DETAIL_PICTURE"],
        "SECTION_USER_FIELDS" => "",
        "ADD_SECTIONS_CHAIN" => "Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_NOTES" => "",
        "CACHE_GROUPS" => "Y"
    ],
    false
);
?>