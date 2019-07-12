<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\EventManager as EventManager,
    Bitrix\Main\Loader;


Loader::registerAutoLoadClasses(null, [
    'Deus\EventHandlers\Search' => '/local/php_interface/classes/deus/handlers/search.php',
    'Deus\EventHandlers\Main' => '/local/php_interface/classes/deus/handlers/main.php',
    'Deus\EventHandlers\Optimize' => '/local/php_interface/classes/deus/handlers/optimize.php',
]);

EventManager::getInstance()->addEventHandler(
    "main",
    "OnEpilog",
    [
        "Deus\\EventHandlers\\Main",
        "check404Error"
    ]
);

EventManager::getInstance()->addEventHandler(
    "search",
    "BeforeIndex",
    [
        "Deus\\EventHandlers\\Search",
        "beforeIndexHandler"
    ]
);

EventManager::getInstance()->addEventHandler(
    "main",
    "OnEndBufferContent",
    [
        "Deus\\EventHandlers\\Optimize",
        "optimizeHTML",
    ],
    false,
    100
);

EventManager::getInstance()->addEventHandler(
    "main",
    "OnEndBufferContent",
    [
        "Deus\\EventHandlers\\Optimize",
        "deleteKernelCss",
    ],
    false,
    100
);