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

$blue_cards = [5, 7, 10, 12, 13];
$count = count($arResult['ITEMS']);
?>
<? if ($count > 0): ?>

    <div class="c-cards">
        <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <? if (empty($_REQUEST['PAGEN_1'])): ?>
                <? if ($key == 0): ?>

                    <? if (is_array($arItem["DETAIL_PICTURE"])) {
                        $tmpImage = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"]["ID"], array("width" => 720, "height" => 720), BX_RESIZE_IMAGE_EXACT, false);
                    } else {
                        $tmpImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("width" => 720, "height" => 720), BX_RESIZE_IMAGE_EXACT, false);
                    }
                    ?>

                    <div class="c-cards__big">
                    <div class="c-cards__big-col">
                        <div class="c-card c-card--big" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                            <a class="c-card__link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"></a>
                            <div class="c-card__image" style="background-image:url(<?= $tmpImage['src'] ?>)"></div>
                            <div class="c-card__content">
                                <div class="c-card__tag"><?= $arItem['TAGS'] ?></div>
                                <div class="c-card__title"><?= $arItem['NAME'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="c-cards__big-col">
                <? endif; ?>
                <? if ($key == 1): ?>
                <div class="c-cards__big-row">
                    <div class="c-card c-card--mid c-card--light" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <a class="c-card__link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"></a>
                        <div class="c-card__content">
                            <div class="c-card__tag"><?= $arItem['TAGS'] ?></div>
                            <div class="c-card__title"><?= $arItem['NAME'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="c-cards__big-row">
            <? endif; ?>
                <? if ($key == 2 || $key == 3): ?>
                    <div class="c-card c-card--small<?= ($key == 2) ? ' c-card--blue' : ' c-card--grey' ?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <a class="c-card__link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"></a>
                        <div class="c-card__content">
                            <div class="c-card__tag"><?= $arItem['TAGS'] ?></div>
                            <div class="c-card__title"><?= $arItem['NAME'] ?></div>
                        </div>
                    </div>
                <? endif; ?>
                <? if ($key == 3 || $count < 3): ?>
                    </div>
                    </div>
                    </div>
                <? endif; ?>
            <? endif ?>
            <? if ($key > 3 || !empty($_REQUEST['PAGEN_1'])): ?>
                <div class="c-card c-card--<?= ($key == 4) ? 'mid c-card--light' : 'small' ?><?= (in_array($key % 15 + $_REQUEST['PAGEN_1']*4, $blue_cards)) ? ' c-card--blue' : (($key !== 4) ? ' c-card--grey' : '') ?>" data-aos="fade-up" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a class="c-card__link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"></a>
                    <div class="c-card__content">
                        <div class="c-card__tag"><?= $arItem['TAGS'] ?></div>
                        <div class="c-card__title"><?= $arItem['NAME'] ?></div>
                    </div>
                </div>
            <? endif; ?>
        <? endforeach; ?>
    </div>
    <?= $arResult['NAV_STRING'] ?>
<? endif; ?>