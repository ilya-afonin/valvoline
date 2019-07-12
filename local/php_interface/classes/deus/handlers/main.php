<?php

namespace Deus\EventHandlers;

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\Loader;

Loc::loadMessages(__FILE__);

class Main {

    public static function check404Error()
    {
        if(!defined('ADMIN_SECTION') && defined("ERROR_404") ) {
            global $APPLICATION;
            $APPLICATION->RestartBuffer();
            \CHTTP::SetStatus("404 Not Found");
            include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/header.php");
            include($_SERVER["DOCUMENT_ROOT"].SITE_DIR."404.php");
            include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/footer.php");
        }

    }

}