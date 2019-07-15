<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
global $APPLICATION;
?>
<div class="promo">
    <div class="promo__row" data-aos="fade-up">
        <div class="promo__col promo__col--light">
            <div class="promo__title"><? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/promo/promo-left.php", Array(), Array("MODE" => "text")); ?></div>
            <div class="promo__button">
                <a class="button button--white" href="<?=\COption::GetOptionString( "askaron.settings", "UF_PROMO_LINK" );?>" target="_blank">
                    <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/promo/promo-left-t.php", Array(), Array("MODE" => "text")); ?>
                </a>
            </div>
        </div>
        <div class="promo__col promo__col--blue">
            <div class="promo__title"><? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/promo/promo-app.php", Array(), Array("MODE" => "text")); ?></div>
            <div class="promo__apps">
                <div class="promo__app">
                    <a class="promo__app-link" href="<?=\COption::GetOptionString( "askaron.settings", "UF_LINK_IOS" );?>" target="_blank"></a>
                    <div class="promo__app-image">
                        <svg width="29" height="36" viewBox="0 0 29 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.0633 0.722656C14.7493 1.63266 14.0843 6.82316 14.2243 8.81816C17.5038 9.14716 21.8438 4.80716 21.0633 0.722656ZM8.64357 9.17691C8.26964 9.17771 7.89654 9.21226 7.52882 9.28016C-6.54643 11.9612 2.38557 35.7997 8.96557 35.7227C11.3246 35.7227 12.3903 34.2789 14.9173 34.2789C17.4443 34.2789 18.3036 35.7227 20.6608 35.7227C23.4223 35.7542 26.6336 31.5384 28.3521 26.4599C25.6308 25.2769 23.8546 22.4699 23.8528 19.3549C23.8563 16.5742 25.2773 14.0139 27.5698 12.6577C26.2871 10.9777 24.3323 9.75266 21.5236 9.28016C18.2738 8.69741 16.9806 10.7869 14.5008 10.7869C12.0386 10.7869 11.0323 9.18741 8.64357 9.17691Z" fill="white"/>
                        </svg>
                    </div>
                    <div class="promo__app-text">
                        <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/promo/promo-app-ios.php", Array(), Array("MODE" => "html")); ?>
                    </div>
                </div>
                <div class="promo__app">
                    <a class="promo__app-link" href="<?=\COption::GetOptionString( "askaron.settings", "UF_LINK_ANDROID" );?>" target="_blank"></a>
                    <div class="promo__app-image"><svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.2369 9.20756L16.3596 14.0848L2.73936 0.464554C3.51811 0.181053 4.41936 0.202053 5.25061 0.648303L21.2369 9.2058V9.20756ZM27.1991 12.3978C29.3779 13.5651 29.3779 16.6888 27.1991 17.8543L22.5931 20.3201L17.4009 15.1261L22.5931 9.9338L27.1991 12.3978ZM1.49161 1.30105L15.3166 15.1261L1.49161 28.9511C0.975276 28.3843 0.691037 27.644 0.695361 26.8773V3.3748C0.695361 2.55405 1.00336 1.8383 1.49161 1.30105ZM2.73936 29.7876L16.3596 16.1673L21.2369 21.0463L5.25061 29.6038C4.86934 29.8117 4.448 29.9357 4.01487 29.9674C3.58174 29.9991 3.14684 29.9378 2.73936 29.7876Z" fill="white"/>
                        </svg>
                    </div>
                    <div class="promo__app-text">
                        <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/promo/promo-app-android.php", Array(), Array("MODE" => "html")); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>