<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
define('PAGE', 'error');

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

/*$APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
	"LEVEL"	=>	"3",
	"COL_NUM"	=>	"2",
	"SHOW_DESCRIPTION"	=>	"Y",
	"SET_TITLE"	=>	"Y",
	"CACHE_TIME"	=>	"36000000"
	)
);*/?>


    <div class="not-found">
        <div class="container">
            <div class="not-found__row">
                <div class="not-found__value" data-aos="fade-up" data-aos-delay="0">404</div>
                <div class="not-found__content" data-aos="fade-up" data-aos-delay="100">
                    <div class="not-found__title">Страница не найдена</div>
                    <div class="not-found__text">Неправильно набран адрес, или такой страницы на сайте больше не существует.</div>
                    <div class="not-found__btn"><a class="button button--red-transp button-compact" href="/">Вернуться на главную</a></div>
                </div>
            </div>
        </div>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>