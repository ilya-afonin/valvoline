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

<?php if (empty($_SERVER['HTTP_BX_AJAX']) && empty($_SERVER['HTTP_X_REQUESTED_WITH'])){ ?>
<ul class="pagination">

	<?php if ($arResult["NavPageNomer"] > 1){ ?>
		<?php if($arResult["bSavePage"]){ ?>
			<li><a class="pagination__prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span><?echo GetMessage("Previous")?></span></a></li>
			<li><a class="pagination__page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><span>1</span></a></li>
		<?php } else { ?>
			<?php if ($arResult["NavPageNomer"] > 2){ ?>
				<li><a class="pagination__page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span><?echo GetMessage("Previous")?></span></a></li>
			<?php } else { ?>
				<li><a class="pagination__page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span><?echo GetMessage("Previous")?></span></a></li>
			<?php } ?>
			<li><a class="pagination__page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span>1</span></a></li>
        <?php } ?>
	<?php } else { ?>

			<li class="is-active"><a class="pagination__page"><span>1</span></a></li>
    <?php } ?>

	<?php
	    $arResult["nStartPage"]++;
	    while($arResult["nStartPage"] <= $arResult["nEndPage"]-1){ ?>
		    <?php if ($arResult["nStartPage"] == $arResult["NavPageNomer"]){ ?>
			    <li class="is-active"><a class="pagination__page"><span><?=$arResult["nStartPage"]?></span></a></li>
		    <?php } else { ?>
			    <li><a class="pagination__page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><span><?=$arResult["nStartPage"]?></span></a></li>
		    <?php } ?>
		    <?php $arResult["nStartPage"]++; ?>
	    <?php } ?>

	<?php if($arResult["NavPageNomer"] < $arResult["NavPageCount"]){ ?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li><a class="pagination__page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><span><?=$arResult["NavPageCount"]?></span></a></li>
		<?endif?>

			<li><a class="pagination__next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span><?echo GetMessage("Next")?></span></a></li>
	<?php } else { ?>
		<?php if($arResult["NavPageCount"] > 1){ ?>
			<li class="is-active"><a class="pagination__page"><span><?=$arResult["NavPageCount"]?></span></a></li>
		<?php } ?>
	<?php } ?>
</ul>
<?php } ?>

<?php if($arResult["NavPageNomer"] < $arResult["NavPageCount"]){ ?>
    <?php $next = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1); ?>
    <div class="catalog__more">
        <a class="btn btn_white" href="<?=$next?>" role="button"><span class="revert"><?echo GetMessage("SHOW_MORE")?></span></a>
    </div>
<?php } ?>