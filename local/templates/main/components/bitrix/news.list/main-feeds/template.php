<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<? if (count($arResult['ITEMS']) > 0): ?>
  <div class="i-feeds__slider">
    <div class="i-feeds__scene owl-carousel">
      <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="i-feed wow fadeIn" data-wow-offset="200" data-wow-delay="<?=$k*60?>ms" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
          <div class="i-feed__image">
            <img class="i-feed__img" src="<?= $arItem['RESIZED_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>"
                 data-fancybox="" data-src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>">
          </div>
          <div class="i-feed__text"><?= $arItem['NAME'] ?></div>
        </div>
      <? endforeach; ?>
    </div>
  </div>
<? endif; ?>
