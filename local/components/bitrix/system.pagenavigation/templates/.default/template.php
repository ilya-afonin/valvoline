<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

if (!$arResult["NavShowAlways"]) {
  if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
    return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>


<div class="pagination">
<?/*= $arResult["NavFirstRecordShow"] ?> <?= GetMessage("nav_to") ?> <?= $arResult["NavLastRecordShow"] ?> <?= GetMessage("nav_of") ?> <?= $arResult["NavRecordCount"] */?>

<? if ($arResult["NavPageNomer"] > 1): ?>

  <? if ($arResult["bSavePage"]): ?>
    <a class="pagination__link pagination__link--arr-back" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1"><?= GetMessage("nav_begin") ?></a>
    |
    <a class="pagination__link pagination__link--arr-back" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><?= GetMessage("nav_prev") ?></a>
    |
  <? else: ?>
    <a  class="pagination__link pagination__link--arr-backhref="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= GetMessage("nav_begin") ?></a>
    |
    <? if ($arResult["NavPageNomer"] > 2): ?>
      <a class="pagination__link pagination__link--arr-back" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><?= GetMessage("nav_prev") ?></a>
    <? else: ?>
      <a class="pagination__link pagination__link--arr-back" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= GetMessage("nav_prev") ?></a>
    <? endif ?>
    |
  <? endif ?>

<? else: ?>
  <?= GetMessage("nav_begin") ?>&nbsp;|&nbsp;<?= GetMessage("nav_prev") ?>&nbsp;|
<? endif ?>

<? while ($arResult["nStartPage"] <= $arResult["nEndPage"]): ?>

  <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
    <a class="pagination__link is-active" href="#"><?= $arResult["nStartPage"] ?></a>
  <? elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false): ?>
    <a class="pagination__link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $arResult["nStartPage"] ?></a>
  <? else: ?>
    <a class="pagination__link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
  <? endif ?>
  <? $arResult["nStartPage"]++ ?>
<? endwhile ?>
  |

<? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
  <a class="pagination__link pagination__link--arr-frw" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><?= GetMessage("nav_next") ?></a>&nbsp;|
  <?/*<a class="pagination__link pagination__link--arr-frw" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>"><?= GetMessage("nav_end") ?></a>*/?>
<? else: ?>
  <?= GetMessage("nav_next") ?>&nbsp;|&nbsp;<?= GetMessage("nav_end") ?>
<? endif ?>

</div>

<!--  <a class="pagination__link pagination__link--arr-back" href="#">Назад</a>
  <a class="pagination__link is-active" href="#">1</a>
  <a class="pagination__link" href="#">2</a>
  <a class="pagination__link" href="#">3</a>
  <a class="pagination__link d-none d-md-inline-block" href="#">4</a>
  <a
          class="pagination__link d-none d-md-inline-block" href="#">5</a><a
          class="pagination__link d-none d-md-inline-block" href="#">6</a><a
          class="pagination__link d-none d-md-inline-block" href="#">7</a><a
          class="pagination__link d-none d-md-inline-block" href="#">...</a><a
          class="pagination__link pagination__link--arr-frw" href="#">Вперед</a>-->

