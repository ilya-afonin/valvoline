<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

    <div class="news-banner" style="background-image: url(<?=$arResult['DETAIL_PICTURE']['SRC']?>)">
        <div class="container">
            <div class="news-banner__scene owl-carousel" data-aos="fade-up" data-aos-delay="100">
                <?if(count($arResult['PROPERTIES']['SLIDER_TITLES']['VALUE']) > 0 && !empty($arResult['PROPERTIES']['SLIDER_TITLES']['VALUE'])):?>
                    <?foreach ($arResult['PROPERTIES']['SLIDER_TITLES']['VALUE'] as $slider_text):?>
                        <div class="news-banner__slide">
                            <div class="news-banner__content">
                                <div class="news-banner__title"><?=$slider_text?></div>
                            </div>
                        </div>
                    <?endforeach;?>
                <?else :?>
                    <div class="news-banner__slide">
                        <div class="news-banner__content">
                            <div class="news-banner__title"><?=$arResult['NAME']?></div>
                        </div>
                    </div>
                <?endif;?>
            </div>
        </div>
    </div>
    <div class="news-content" data-aos="fade-up">
        <div class="container">

            <?=$arResult["~DETAIL_TEXT"]?>

            <div class="soc">
                <div class="soc__item" style="background-color: #3B5998">
                    <a class="soc__item-link" onclick="Share.facebook('<?=$_SERVER['SERVER_NAME'].$arResult['DETAIL_PAGE_URL']?>','<?=$arResult['NAME']?>','<?=$_SERVER['SERVER_NAME'].$arResult['DETAIL_PICTURE']['SRC']?>','')" rel="nofollow noopener" title="Facebook"></a>
                    <img class="soc__item-img" src="<?=SITE_TEMPLATE_PATH?>/tpl/dist/assets/images/static/icon-soc-fb.svg" alt="">
                    <div class="soc__item-text">Поделиться</div>
                </div>
                <div class="soc__item" style="background-color: #4C75A3">
                    <a class="soc__item-link" onclick="Share.vkontakte('<?=$_SERVER['SERVER_NAME'].$arResult['DETAIL_PAGE_URL']?>','<?=$arResult['NAME']?>','<?=$_SERVER['SERVER_NAME'].$arResult['DETAIL_PICTURE']['SRC']?>','')" rel="nofollow noopener" title="ВКонтакте"></a>
                    <img class="soc__item-img" src="<?=SITE_TEMPLATE_PATH?>/tpl/dist/assets/images/static/icon-soc-vk.svg" alt="">
                    <div class="soc__item-text">Поделиться</div>
                </div>
            </div>

        </div>
    </div>

