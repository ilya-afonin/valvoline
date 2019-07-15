<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;
use Bitrix\Main\IO\File;
use Bitrix\Main\Application;
use Deus\Helpers\Main;

$dir = $APPLICATION->GetCurDir();
$page = Main::getCurrentPage();
$assets = Asset::getInstance();

Loc::loadMessages(__FILE__);

?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID; ?>">
<head>
    <title><? $APPLICATION->ShowTitle(false); ?></title>
    <meta charset="<?= LANG_CHARSET; ?>">
    <?php $APPLICATION->ShowMeta("keywords"); ?>
    <?php $APPLICATION->ShowMeta("description"); ?>
    <?php $APPLICATION->ShowMeta("robots"); ?>
    <meta http-equiv="X-UA-Compatible&quot;,content=&quot;IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <?
    $assets->addCss(SITE_TEMPLATE_PATH . "/tpl/dist/assets/css/styles.css");
    $assets->addCss('https://api.tiles.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.css');
    $APPLICATION->ShowCSS();
    $APPLICATION->ShowHeadStrings();
    ?>
</head>

<body>

<div class="page">
  <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
    <div class="header" data-aos="fade-down">
        <div class="container">
            <div class="header__row">
                <div class="header__logo">
                    <a class="header__logo-link" href="<?= ($APPLICATION->GetCurDir() !== '/') ? "/" : '' ?>"></a>
                    <img class="header__logo-white" src="<?= CFile::GetPath(\COption::GetOptionString("askaron.settings", "UF_LOGO_WHITE")); ?>" alt="Logo">
                    <img class="header__logo-color" src="<?= CFile::GetPath(\COption::GetOptionString("askaron.settings", "UF_LOGO")); ?>" alt="Logo">
                </div>
                <div class="header__burger">
                    <div class="header__burger-bar"></div>
                    <div class="header__burger-bar"></div>
                    <div class="header__burger-bar"></div>
                </div>
            </div>
            <div class="header__menu">
                <div class="container">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "top",
                        array(
                            "ROOT_MENU_TYPE" => "top",
                            "MENU_CACHE_TYPE" => "Y",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "N",
                            "MENU_CACHE_GET_VARS" => array(),
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "left",
                            "USE_EXT" => "N",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N",
                            "COMPONENT_TEMPLATE" => "top"
                        ),
                        false
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="content">