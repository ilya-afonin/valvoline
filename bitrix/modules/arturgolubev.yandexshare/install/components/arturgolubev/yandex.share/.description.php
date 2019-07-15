<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("ARTURGOLUBEV_YANDEXSHARE_PANELQ_RASSARIVANIA"),
	"DESCRIPTION" => GetMessage("ARTURGOLUBEV_YANDEXSHARE_PANELQ_RASSARIVANIA"),
	"ICON" => "/images/icon.gif",
	"SORT" => 10,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "SOC_SERVICE",
		"NAME" => GetMessage("ARTURGOLUBEV_YANDEXSHARE_GROUP_NAME"),
		"SORT" => 1930,
		/* "CHILD" => array(
			"ID" => "asd",
			"NAME" => GetMessage("asdasd"),
			"SORT" => 30
		) */
	),
	"COMPLEX" => "N",
);

?>