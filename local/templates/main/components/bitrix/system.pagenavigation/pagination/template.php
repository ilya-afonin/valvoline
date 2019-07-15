<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

?>

<!--
<div class="pagination">
    <a class="pagination__link pagination__link--prev" href="#">Назад</a>
    <a class="pagination__link active" href="#">1</a>
    <a class="pagination__link" href="#">2</a>
    <a class="pagination__link" href="#">3</a>
    <a class="pagination__link" href="#">4</a>
    <a class="pagination__link" href="#">5</a>
    <a class="pagination__link pagination__link--next" href="#">Вперёд</a>
</div>-->


<div class="pagination" data-aos="fade-up">
<?if($arResult["bDescPageNumbering"] === true):?>

	<?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["bSavePage"]):?>
			<a class="pagination__link pagination__link--prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span><?echo GetMessage("round_nav_back")?></span></a>
			<a class="pagination__link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span>1</span></a>
		<?else:?>
			<?if (($arResult["NavPageNomer"]+1) == $arResult["NavPageCount"]):?>
				<a class="pagination__link pagination__link--prev" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span><?echo GetMessage("round_nav_back")?></span></a>
			<?else:?>
				<a class="pagination__link pagination__link--prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span><?echo GetMessage("round_nav_back")?></span></a>
			<?endif?>
			<a class="pagination__link" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span>1</span></a>
		<?endif?>
	<?else:?>
			<span class="pagination__link pagination__link--prev"><?echo GetMessage("round_nav_back")?></span>
			<span class="pagination__link active">1</span>
	<?endif?>

	<?
	$arResult["nStartPage"]--;
	while($arResult["nStartPage"] >= $arResult["nEndPage"]+1):
	?>
		<?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>

		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<span class="pagination__link active"><?=$NavRecordGroupPrint?></span>
		<?else:?>
			<a class="pagination__link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><span><?=$NavRecordGroupPrint?></span></a>
		<?endif?>

		<?$arResult["nStartPage"]--?>
	<?endwhile?>

	<?if ($arResult["NavPageNomer"] > 1):?>
		<?if($arResult["NavPageCount"] > 1):?>
			<a class="pagination__link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><span><?=$arResult["NavPageCount"]?></span></a>
		<?endif?>
			<a class="pagination__link pagination__link--next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span><?echo GetMessage("round_nav_forward")?></span></a>
	<?else:?>
		<?if($arResult["NavPageCount"] > 1):?>
			<span class="pagination__link active"><?=$arResult["NavPageCount"]?></span>
		<?endif?>
			<span class="pagination__link pagination__link--next"><?echo GetMessage("round_nav_forward")?></span>
	<?endif?>

<?else:?>

	<?if ($arResult["NavPageNomer"] > 1):?>
		<?if($arResult["bSavePage"]):?>
			<a class="pagination__link pagination__link--prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span><?echo GetMessage("round_nav_back")?></span></a>
			<a class="pagination__link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><span>1</span></a>
		<?else:?>
			<?if ($arResult["NavPageNomer"] > 2):?>
				<a class="pagination__link pagination__link--prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span><?echo GetMessage("round_nav_back")?></span></a>
			<?else:?>
				<a class="pagination__link pagination__link--prev" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span><?echo GetMessage("round_nav_back")?></span></a>
			<?endif?>
			<a class="pagination__link" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span>1</span></a>
		<?endif?>
	<?else:?>
			<span class="pagination__link pagination__link--prev"><?echo GetMessage("round_nav_back")?></span>
			<span class="pagination__link active">1</span>
	<?endif?>

	<?
	$arResult["nStartPage"]++;
	while($arResult["nStartPage"] <= $arResult["nEndPage"]-1):
	?>
		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<span class="pagination__link active"><?=$arResult["nStartPage"]?></span>
		<?else:?>
			<a class="pagination__link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><span><?=$arResult["nStartPage"]?></span></a>
		<?endif?>
		<?$arResult["nStartPage"]++?>
	<?endwhile?>

	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["NavPageCount"] > 1):?>
			<a class="pagination__link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><span><?=$arResult["NavPageCount"]?></span></a>
		<?endif?>
			<a class="pagination__link pagination__link--next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span><?echo GetMessage("round_nav_forward")?></span></a>
	<?else:?>
		<?if($arResult["NavPageCount"] > 1):?>
			<span class="pagination__link active"><?=$arResult["NavPageCount"]?></span>
		<?endif?>
			<span class="pagination__link pagination__link--next"><?echo GetMessage("round_nav_forward")?></span>
	<?endif?>
<?endif?>

</div>
