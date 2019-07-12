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


        <div class="error__page">
          <div class="e-page__left">
            <div class="e-page__left-image-wrapper"><img class="e-page__left-image" src="/local/templates/main/tpl/dist/assets/images/content/light.png" alt="Страница не найдена"></div>
          </div>
          <div class="e-page__right">
            <div class="e-page__text">
              <div class="e-page__title">404</div>
              <div class="e-page__description">Страница не найдена :(</div><a class="e-page__link btn" href="/">
                Вернуться на главную<svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.5 14L8 7.5L1.5 0.999999" stroke="#EA1E30" stroke-width="2"/>
</svg></a>
            </div>
          </div>
        </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>