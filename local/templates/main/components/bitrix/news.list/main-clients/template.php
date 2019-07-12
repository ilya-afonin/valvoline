<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<? if (count($arResult['ITEMS']) > 0): ?>
  <div class="i-clients__slider">
    <div class="i-clients__scene owl-carousel">
      <div class="i-clients">
      <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <?if($k % 12 == 0 && $k != 0):?></div><div class="i-clients"><?endif;?>
          <div class="i-client wow fadeIn" id="<?= $this->GetEditAreaId($arItem['ID']); ?>" data-wow-delay="<?=80*$k?>ms">
            <div class="i-client__img">
              <img class="i-client__img" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>">
            </div>
          </div>
      <? endforeach; ?>
      </div>
    </div>
    <div class="s__dots"></div>
  </div>
<? endif; ?>



