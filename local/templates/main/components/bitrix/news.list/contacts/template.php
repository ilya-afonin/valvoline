<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc as Loc,
    Deus\Helpers\Main;

Loc::loadMessages(__FILE__);

$this->setFrameMode(true);

?>
<? if (count($arResult['ITEMS']) > 0): ?>

    <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div class="contacts" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="container">
                <div class="contacts__top row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="contacts__item">
                            <div class="contacts__title"><?=$arItem['PROPERTIES']['MAIN_INFO']['DESCRIPTION']?></div>
                            <a class="contacts__link" href="mailto:<?=$arItem['PROPERTIES']['MAIN_INFO']['VALUE']?>"><?=$arItem['PROPERTIES']['MAIN_INFO']['VALUE']?></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="contacts__item">
                            <div class="contacts__title"><?=$arItem['PROPERTIES']['MAN_PR']['DESCRIPTION']?></div>
                            <a class="contacts__link" href="mailto:<?=$arItem['PROPERTIES']['MAN_PR']['VALUE']?>"><?=$arItem['PROPERTIES']['MAN_PR']['VALUE']?></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="contacts__item">
                            <div class="contacts__title"><?=$arItem['PROPERTIES']['MAN_HR']['DESCRIPTION']?></div>
                            <a class="contacts__link" href="mailto:<?=$arItem['PROPERTIES']['MAN_HR']['VALUE']?>"><?=$arItem['PROPERTIES']['MAN_HR']['VALUE']?></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="contacts__item">
                            <div class="contacts__title"><?=$arItem['PROPERTIES']['MARKETING']['DESCRIPTION']?></div>
                            <a class="contacts__link" href="mailto:<?=$arItem['PROPERTIES']['MARKETING']['VALUE']?>"><?=$arItem['PROPERTIES']['MARKETING']['VALUE']?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contacts__map wow fadeIn">
                <div class="container">
                    <div class="contacts__left">
                        <div class="contacts__left-inner">
                            <div class="contacts__left-item contacts__left-item--phone">
                                <div class="c-item__icon" style="background-image: url(/local/templates/main/tpl/dist/assets/images/static/icon-phone.svg)"></div>
                                <div class="c-item__text-wrapper">
                                    <?
                                        $phone = Main::getPhoneLink($arItem['PROPERTIES']['PHONE']['VALUE']);
                                    ?>
                                    <div class="c-item__title"><?=$arItem['PROPERTIES']['PHONE']['DESCRIPTION']?></div>
                                    <div class="c-item__text">
                                        <a class="c-item__link" href="<?=$phone?>">
                                            <?=$arItem['PROPERTIES']['PHONE']['VALUE']?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="contacts__left-item contacts__left-item--metro">
                                <div class="c-item__icon" style="background-image: url(/local/templates/main/tpl/dist/assets/images/static/icon-metro.svg)"></div>
                                <div class="c-item__text-wrapper">
                                    <div class="c-item__title"><?=$arItem['PROPERTIES']['METRO']['DESCRIPTION']?></div>
                                    <div class="c-item__text"><?=$arItem['PROPERTIES']['METRO']['VALUE']?></div>
                                </div>
                            </div>
                            <div class="contacts__left-item contacts__left-item--address">
                                <div class="c-item__icon" style="background-image: url(/local/templates/main/tpl/dist/assets/images/static/icon-address.svg)"></div>
                                <div class="c-item__text-wrapper">
                                    <div class="c-item__title"><?=$arItem['PROPERTIES']['ADDRESS']['DESCRIPTION']?></div>
                                    <div class="c-item__text"><?=$arItem['PROPERTIES']['ADDRESS']['VALUE']?></div>
                                </div>
                            </div>
                            <div class="contacts__left-image" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)"></div>
                        </div>
                    </div>
                </div>
                <div class="map" id="map" data-points="<?=$arItem['PROPERTIES']['COORDINATES']['VALUE']?>"></div>
            </div>
        </div>

    <? endforeach; ?>

<? endif; ?>

