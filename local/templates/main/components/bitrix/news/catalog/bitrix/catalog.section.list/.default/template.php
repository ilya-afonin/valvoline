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
use Bitrix\Main\Localization\Loc as Loc,
    Bitrix\Main\Context;

Loc::loadMessages(__FILE__);
$request = Context::getCurrent()->getRequest();


$this->setFrameMode(true);

?>

<?php if (0 < count($arResult["SECTIONS"])): ?>

<?global $sectionActive;

$sectionActive = $arResult['SECTIONS'][0];

?>

<div class="p-slider">
    <div class="p-slider__scene owl-carousel">
        <?php foreach ($arResult['SECTIONS'] as $index => $arSection): ?>
            <?$act = '';?>
            <?if(!empty($_REQUEST['id']) && ($_REQUEST['id'] == $arSection['ID'])):?>
            <?
                $sectionActive = $arSection;
                $act = ' active';
            ?>
            <?endif;?>
        <div class="p-slider__slide<?=$act?>" data-aos="fade-up" data-aos-delay="0" data-id="<?=$arSection['ID']?>" data-index="<?=$index?>">
            <div class="p-slider__title"><?=$arSection['NAME']?></div>
            <div class="p-slider__image">
                <img class="p-slider__image-file" src="<?=$arSection['PICTURE']['SRC']?>" alt="<?=$arSection['NAME']?>">
            </div>
        </div>
        <?endforeach;?>
    </div>
    <div class="p-silder__arrows"></div>
</div>
<div class="container" id="product-container">
    <? if ($request->isAjaxRequest()): ?>
        <? $APPLICATION->RestartBuffer(); ?>
    <? endif ?>
    <div class="p-feature" data-aos="fade-up">
        <div class="p-features__row">
            <div class="p-features__card p-features__card--light">
                <div class="p-features__inner scrollbar">
                    <div class="p-features__title"><?=$sectionActive['~UF_CAT_LEFT_TITLE']?></div>
                    <div class="p-features__text">
                        <?=$sectionActive['~UF_CAT_LEFT_TEXT']?>
                    </div>
                </div>
            </div>
            <div class="p-features__card p-features__card--blue">
                <div class="p-features__inner scrollbar">
                    <div class="p-features__title"><?=$sectionActive['~UF_CAT_RIGHT_TITLE']?></div>
                    <div class="p-features__text">
                        <?=$sectionActive['~UF_CAT_RIGHT_TEXT']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

