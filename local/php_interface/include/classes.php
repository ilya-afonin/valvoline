<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\EventManager,
    Bitrix\Main\Loader,
    Deus\Helpers;


Loader::registerAutoLoadClasses(null, [
    'Deus\Helpers\Main' => '/local/php_interface/classes/deus/helper.php'
]);
