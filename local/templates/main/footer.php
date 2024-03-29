<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc,
    Deus\Helpers\Main;

$assets = \Bitrix\Main\Page\Asset::getInstance();
Loc::loadMessages(__FILE__);

?>

</div>

<footer class="footer">
    <div class="container">
        <div class="footer__row">
            <div class="footer__col footer__col--copy">
                <div class="footer__text">
                    <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/footer/copyright.php", Array(), Array("MODE" => "text")); ?>
                </div>
            </div>
            <div class="footer__col footer__col--soc">
                <div class="footer__item">
                    <div class="footer__text">
                        <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/footer/social.php", Array(), Array("MODE" => "text")); ?>
                    </div>
                    <?$APPLICATION->IncludeComponent("bitrix:news.list", "socials-footer", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"DISPLAY_DATE" => "N",	// Выводить дату элемента
		"DISPLAY_NAME" => "N",	// Выводить название элемента
		"DISPLAY_PICTURE" => "N",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "2",	// Код информационного блока
		"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "20",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(	// Свойства
			0 => "ICON",
			1 => "LINK",
		),
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
	),
                        false
                    );?>

                </div>
            </div>
            <div class="footer__col footer__col--apps">
                <div class="footer__item">
                    <div class="footer__text">
                        <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/footer/download.php", Array(), Array("MODE" => "text")); ?>
                    </div>
                    <div class="footer__icons">
                        <a class="footer__icon" href="#" style="background-image:url(<?=SITE_TEMPLATE_PATH?>/tpl/dist/assets/images/static/footer-appstore.svg)"></a>
                        <a class="footer__icon" href="#" style="background-image:url(<?=SITE_TEMPLATE_PATH?>/tpl/dist/assets/images/static/footer-google.svg)"></a>
                    </div>
                </div>
            </div>
            <div class="footer__col footer__col--creators">
                <div class="footer__text"><?=Loc::getMessage('CREATING')?>&nbsp;<a href="https://de-us.ru" target="_blank">DEUS</a></div>
            </div>
        </div>
    </div>
</footer>
</div>
<? //$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/popups.php", Array(), Array("MODE" => "html")); ?>

<? if ((!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false) || !$USER->IsAdmin()):
    //$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include/yandex_metrika.php", Array(), Array("MODE" => "html"));
endif; ?>
<?
$assets->addJs(SITE_TEMPLATE_PATH . '/tpl/dist/assets/js/scripts.min.js');
if ($APPLICATION->GetCurDir() === '/map/'){
    //$assets->addJs("https://api.tiles.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.js", true);
    $assets->addJs("https://api-maps.yandex.ru/2.1/?apikey=84a92d20-09e9-4790-b052-4fc458cb7f38&lang=ru_RU", true);
}
?>

</body>
</html>
