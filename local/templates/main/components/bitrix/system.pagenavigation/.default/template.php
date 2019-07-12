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

        <div class="pagination">

            <?php if ($arResult["NavPageNomer"] > 1){ ?>
                <a class="pagination__prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=(SITE_ID == 'en')?'Prev':'Предыдущая';?></a>
            <?php } ?>
            <div class="pagination__pages">
            <?php if ($arResult["NavPageNomer"] > 1){ ?>
                <a class="pagination__pages-link" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
            <?php } else { ?>
                <a class="pagination__pages-link _active">1</a>
            <?php } ?>

            <?php
                $arResult["nStartPage"]++;
                while($arResult["nStartPage"] <= $arResult["nEndPage"]-1){ ?>
                <?php if ($arResult["nStartPage"] == $arResult["NavPageNomer"]){ ?>
                    <a class="pagination__pages-link _active"><?=$arResult["nStartPage"]?></a>
                <?php } else { ?>
                    <a class="pagination__pages-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
                <?php } ?>
                <?php $arResult["nStartPage"]++; ?>
            <?php } ?>

            <?php if($arResult["NavPageNomer"] < $arResult["NavPageCount"]){ ?>
                <?php if($arResult["NavPageCount"] > 1){ ?>
                    <a class="pagination__pages-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
                <?php } ?>
            <?php } else { ?>
                <?php if($arResult["NavPageCount"] > 1){ ?>
                    <a class="pagination__pages-link _active"><?=$arResult["NavPageCount"]?></a>
                <?php } ?>
            <?php } ?>
            </div>

            <?php if($arResult["NavPageNomer"] < $arResult["NavPageCount"]){ ?>
                <a class="pagination__next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><?=(SITE_ID == 'en')?'Next':'Следующая'?></a>
            <?php } ?>

        </div>
