<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<? if (count($arResult['ITEMS']) > 0): ?>
  <div class="welcome__scene owl-carousel">

    <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
      <?
      $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
      $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
      ?>

        <div class="welcome__inner" data-dot="&lt;span&gt;<?= ($k < 10) ? '0' . ($k + 1) : $k + 1 ?>&lt;/span&gt;"
             id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
          <div class="welcome__text">
            <div class="welcome__title"><?= $arItem['NAME'] ?></div>
            <div class="welcome__description"><?= $arItem['PREVIEW_TEXT'] ?></div>
            <a class="welcome__btn" href="<?=$arItem['PROPERTIES']['LINK']['VALUE'] ?>">
              <?= $arItem['PROPERTIES']['BUTTON_TEXT']['VALUE'] ?>
              <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.5 14L8 7.5L1.5 0.999999" stroke="white" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"/>
              </svg>
            </a>
          </div>
        </div>

    <? endforeach; ?>
  </div>
  <div class="welcome__navigation"></div>
  <div class="welcome__dots-wrapper">
    <div class="welcome__dots"></div>
  </div>
<? endif; ?>


