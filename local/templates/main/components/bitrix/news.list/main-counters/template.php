<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<? if (count($arResult['ITEMS']) > 0): ?>
  <div class="i-counters">
    <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
      <?
      $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
      $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
      ?>
      <div class="i-counter wow slideInLeft" id="<?= $this->GetEditAreaId($arItem['ID']); ?>" data-wow-delay="<?=100*$k?>ms">
        <div class="i-counter__num"><?= $arItem['NAME'] ?></div>
        <div class="i-counter__text">
          <div class="i-counter__name"><?= $arItem['CODE'] ?></div>
          <div class="i-counter__title"><?= $arItem['PREVIEW_TEXT'] ?></div>
        </div>
      </div>
    <? endforeach; ?>
  </div>
<? endif; ?>