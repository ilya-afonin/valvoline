<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
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

<section class="js-anchor" id="about">
  <div class="person__container">
    <div class="person__left">
      <?if(!empty($arResult['DETAIL_PICTURE']['SRC'])){?>
        <img class="person__image-img" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
      <?}?>
    </div>
    <div class="person__right person__right--main">
      <div class="person__right-inner">
        <div class="person__name"><?=$arResult['NAME']?></div>
        <div class="person__position"><?=$arResult['PROPERTIES']['POSITION']['VALUE']?></div>
        <a class="btn" role="button" data-popup="pop-zapis" data-person="<?=$arResult['NAME']?>" data-person-id="<?=$arResult['ID']?>"><?=Loc::getMessage('ZAPIS');?></a>
      </div>
    </div>
  </div>
</section>

<section class="js-anchor t-container" id="edu">
  <div class="person__container">
    <div class="person__left">
      <h3><?php $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/edu-header.php", Array(), Array("MODE" => "text")); ?></h3>
      <div class="s-title"><?php $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/edu-title.php", Array(), Array("MODE" => "text")); ?></div>
      <div class="person__edu s-content__text">
          <?=html_entity_decode($arResult['PROPERTIES']['EDUCATION']['VALUE']['TEXT'])?>
      </div>
    </div>
    <div class="person__right">
      <div class="person__right-inner">
        <h3><?php $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/edu-more-header.php", Array(), Array("MODE" => "text")); ?></h3>
        <div class="s-title"><?php $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/edu-more-title.php", Array(), Array("MODE" => "text")); ?></div>
        <div class="person__edu">
            <?=html_entity_decode($arResult['PROPERTIES']['COURSES']['VALUE']['TEXT'])?>
        </div>
      </div>
    </div>
  </div>
</section>


