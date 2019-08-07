<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc as Loc,
    Bitrix\Main\Context;

Loc::loadMessages(__FILE__);
$request = Context::getCurrent()->getRequest();

$this->setFrameMode(true);
global $APPLICATION;

?>

<? if (count($arResult['ITEMS']) > 0): ?>


  <div class="product-cards" data-aos="fade-up">
    <div class="product-cards__row">

      <? if ($request->isAjaxRequest() && !empty($_REQUEST['PAGEN_1'])): ?>
        <? $APPLICATION->RestartBuffer(); ?>
      <? endif ?>

      <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="product-card" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
          <div class="product-card__top">

            <img class="product-card__img" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?=$arItem['NAME']?>">

            <?
            $arrFass = array();
            $property_enums = CIBlockPropertyEnum::GetList(Array("SORT" => "ASC"), Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "CODE" => "ATT_FASOVKA"));
            while ($enum_fields = $property_enums->GetNext()) {
              $arrFass[$enum_fields["ID"]] = $enum_fields["VALUE"];
            }
            ?>

            <div class="product-card__title">Фасовка (Л)</div>
            <div class="product-card__options">
              <? $active = false; ?>
              <? foreach ($arrFass as $fas_id => $fas_value): ?>

                <? if (!empty($arItem['PROPERTIES']['ATT_FASOVKA']['VALUE'])): ?>

                  <? foreach ($arItem['PROPERTIES']['ATT_FASOVKA']['VALUE'] as $fasovka): ?>
                    <? if ($fasovka == $fas_value): ?>
                      <? $active = true; ?>
                      <? break; ?>
                    <? else: ?>
                      <? $active = false; ?>
                      <? continue; ?>
                    <? endif ?>
                  <? endforeach; ?>

                <? endif; ?>

                <div class="product-card__option<?= ($active) ? ' active' : '' ?>"><?= $fas_value ?></div>

              <? endforeach; ?>
            </div>

          </div>
          <div class="product-card__content">
            <div class="product-card__name"><?= $arItem['NAME'] ?></div>
            <div class="product-card__text <?=(in_array($arItem['IBLOCK_SECTION_ID'], array(2, 4)))?'product-card__text--grey':'product-card__text--green'?>"><?= $arItem['PREVIEW_TEXT'] ?></div>
            <div class="product-card__text product-card__text--grey"><?= $arItem['DETAIL_TEXT'] ?></div>
          </div>
        </div>
      <? endforeach; ?>


      <? if ($request->isAjaxRequest() && !empty($_REQUEST['PAGEN_1'])): ?>
        <? die(); ?>
      <? endif ?>
    </div>
    <? if (!empty($arResult['NAV_STRING'])): ?>
      <div class="product-cards__more">
        <?= $arResult['NAV_STRING'] ?>
      </div>
    <? endif; ?>

  </div>

<? endif; ?>

<? if ($request->isAjaxRequest()): ?>
  <? die(); ?>
<? endif ?>
