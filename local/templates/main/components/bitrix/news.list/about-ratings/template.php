<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc as Loc,
    Bitrix\Main\Context;
Loc::loadMessages(__FILE__);
$request = Context::getCurrent()->getRequest();
Debug::dtc(SITE_ID, 'SITE_ID');
$this->setFrameMode(true);
?>

<? if (count($arResult['ITEMS']) > 0): ?>

<?if(!$request->isAjaxRequest()):?>
    <div class="a-slider__head">
        <div class="a-slider__list-wrapper">
            <div class="dropdown__list link link--drop link--drop-red">
                <div class="dropdown__current">
                    <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/index__feeds-title.php", Array(), Array("MODE" => "text")); ?>
                    <span class="dropdown__current-name"><?=$arResult['SECTIONS'][0]['NAME']?></span>
                    <input type="hidden" name="dropdown_current" value="<?=$arResult['SECTIONS'][0]['ID']?>">
                </div>
                <div class="dropdown__drop">
                    <? foreach ($arResult["SECTIONS"] as $s => $arSection): ?>
                        <a class="dropdown__drop-link js-ratings-btn" href="#" data-section-id="<?=$arSection['ID']?>"><?=(SITE_ID == 'en')?$arSection['UF_NAME_EN']:$arSection['NAME']?></a>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
        <div class="s-navigation"></div>
    </div>

    <div class="a-ratings__scene owl-carousel">
<?endif?>
        <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
            <?if(!$request->isAjaxRequest()):?>
                <?if($arItem['IBLOCK_SECTION_ID'] !== $arResult['SECTIONS'][0]['ID']) continue;?>
            <?endif;?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="a-rating" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="a-rating__container">
                    <div class="a-rating__image">
                        <div class="a-rating__number">
                            <div class="a-rating__num"><?=$arItem['PROPERTIES']['PLACE']['VALUE']?></div>
                            <div class="a-rating__num-text"><?=Loc::getMessage('place');?></div>
                        </div>
                    </div>
                </div>
                <div class="a-rating__name"><?=$arItem['NAME']?></div>
            </div>
        <?endforeach;?>
    <?if(!$request->isAjaxRequest()):?>
        </div>
    <?endif;?>
<? endif; ?>