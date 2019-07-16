<?
define('PAGE', 'map');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Точки продаж");
$APPLICATION->SetPageProperty("title", "Точки продаж");
$APPLICATION->SetTitle("Точки продаж");
?>

<?
$arrFilterPoints = array();

if($_REQUEST['city_id'])
	$city_id = $_REQUEST['city_id'];
else
	$city_id = 15;  //Москва

$arrFilterPoints[] = array(
		"LOGIC" => "OR",
		array("LOGIC" => "AND" , array("PROPERTY_ATT_CITIES" => $city_id, 'IBLOCK_ID' => 6)),
		array("LOGIC" => "AND" , array("SECTION_ID" => $city_id, 'IBLOCK_ID' => 8))
);
?>

<? $APPLICATION->IncludeComponent(
		"deus:news.line",
		"points",
		array(
				"ACTIVE_DATE_FORMAT" => "j F Y",
				"CACHE_GROUPS" => "N",
				"CACHE_TIME" => "300",
				"CACHE_TYPE" => "A",
				"DETAIL_URL" => "",
				"FIELD_CODE" => array(
						0 => "NAME",
						1 => "PREVIEW_TEXT",
						2 => "PREVIEW_PICTURE",
						3 => "DETAIL_TEXT",
						4 => "DETAIL_PICTURE",
						5 => "IBLOCK_CODE",
						6 => "IBLOCK_NAME",
						7 => "PROPERTY_ATT_ADDRESS",
						8 => "PROPERTY_ATT_PHONE",
						9 => "PROPERTY_ATT_EMAIL",
						10 => "PROPERTY_ATT_SITE",
						11 => "PROPERTY_ATT_SITE",
						12 => "PROPERTY_ATT_CITIES",
						13 => "PROPERTY_ATT_POINTS",
						14 => "PROPERTY_ATT_LNG",
						15 => "PROPERTY_ATT_LAT",
						16 => "PROPERTY_ATT_CITY",
				),
				"IBLOCKS" => array(
						0 => "6",
						1 => "8",
				),
				"IBLOCK_TYPE" => "points",
				"NEWS_COUNT" => "1000",
				"SORT_BY1" => "ACTIVE_FROM",
				"SORT_BY2" => "SORT",
				"SORT_ORDER1" => "DESC",
				"SORT_ORDER2" => "ASC",
				"COMPONENT_TEMPLATE" => "points",
				"FILTER_NAME" => "arrFilterPoints",
		),
		false
); ?>
<?/*
	<div class="map">
		<div class="map__map" id="map"></div>
		<div class="map__content">
			<div class="m-cont__title m-cont__title--compact" data-aos="fade-up">Выбрать другую точку
				<div class="m-cont__title-checked">
					<div class="m-cont__title-checked-name">Москва</div>
					<div class="m-cont__drop"><a class="m-cont__drop-link" href="#">Москва</a><a class="m-cont__drop-link" href="#">Санкт-Петербург</a><a class="m-cont__drop-link" href="#">Новосибирск</a><a class="m-cont__drop-link" href="#">Екатеринбург</a><a class="m-cont__drop-link" href="#">Нижний Новгород</a><a class="m-cont__drop-link" href="#">Казань</a><a class="m-cont__drop-link" href="#">Москва</a><a class="m-cont__drop-link" href="#">Санкт-Петербург</a><a class="m-cont__drop-link" href="#">Новосибирск</a><a class="m-cont__drop-link" href="#">Екатеринбург</a><a class="m-cont__drop-link" href="#">Нижний Новгород</a><a class="m-cont__drop-link" href="#">Казань</a></div>
				</div>
			</div>
			<div class="m-cont__tabs">
				<div class="m-cont__tabs-top">
					<div class="m-cont__tabs-button is-active" data-tab="type_1">Точки продаж</div>
					<div class="m-cont__tabs-button" data-tab="type_2">Дистрибьюторы</div>
					<div class="m-cont__tabs-opener">
						<div class="m-cont__tabs-opener-bar"></div>
						<div class="m-cont__tabs-opener-bar"></div>
						<div class="m-cont__tabs-opener-bar"></div>
					</div>
				</div>
				<div class="m-cont__tabs-content">
					<div class="m-cont__tabs-content-item" id="type_1" style="display: block">
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
					</div>
					<div class="m-cont__tabs-content-item" id="type_2">
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
						<div class="m-cont__tabs-item"><a class="m-cont__tabs-item-title" href="#">ООО МаслаТорг</a>
							<div class="m-cont__tabs-item-addr">Москва, ул. Пушкинская, 23</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
*/?>


<?/*$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"",
	array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "N",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FILE_404" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "ajax_more",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/map/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "map",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);*/?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>