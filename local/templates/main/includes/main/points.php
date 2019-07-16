<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
global $APPLICATION;
?>

<div class="m-cont" data-aos="fade-up">
    <div class="m-cont__inner">
        <div class="m-cont__title">
            <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/points/points-header.php", Array(), Array("MODE" => "html")); ?>
            <?
            // получаем разделы
            $dbResSect = CIBlockSection::GetList(
                Array("NAME" => "ASC"),
                Array("IBLOCK_ID" => 8, 'DEPTH_LEVEL' => '1', "ACTIVE" => "Y"),
                Array("ID", 'NAME')
            );

            //Получаем разделы и собираем в массив
            while ($sectRes = $dbResSect->GetNext()) {
                $arSections[] = $sectRes;
            }

            ?>

            <div class="m-cont__title-checked">
                <div class="m-cont__title-checked-name">Москве</div>
                <div class="m-cont__drop">
                    <?foreach ($arSections as $city):?>
                        <a class="m-cont__drop-link m-cont__drop-link--main" data-id="<?=$city['ID']?>"><?=$city['NAME']?></a>
                    <?endforeach;?>
                </div>
            </div>
        </div>
        <div class="m-cont__button">
            <a class="button button--red button--compact" href="/map/">Показать на карте</a></div>
        <div class="m-cont__stats">
            <div class="m-cont__stat">
                <div class="m-cont__stat-value">
                    <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/points/points-sales.php", Array(), Array("MODE" => "text")); ?>
                </div>
                <div class="m-cont__stat-name">точек<br> продаж</div>
            </div>
            <div class="m-cont__stat">
                <div class="m-cont__stat-value">
                    <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/includes/main/points/points-distrib.php", Array(), Array("MODE" => "text")); ?>
                </div>
                <div class="m-cont__stat-name">городов</div>
            </div>
        </div>
    </div>
</div>