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
Debug::dtc($arResult, 'res');
?>
<div class="map">
  <div class="map__map" id="map"></div>
  <div class="map__content">
    <div class="m-cont__title m-cont__title--compact" data-aos="fade-up">Выбрать другую точку
      <div class="m-cont__title-checked">
        <div class="m-cont__title-checked-name">Москва</div>
        <div class="m-cont__drop"><a class="m-cont__drop-link" href="#">Москва</a><a class="m-cont__drop-link" href="#">Санкт-Петербург</a><a
                  class="m-cont__drop-link" href="#">Новосибирск</a><a class="m-cont__drop-link"
                                                                       href="#">Екатеринбург</a><a
                  class="m-cont__drop-link" href="#">Нижний Новгород</a><a class="m-cont__drop-link" href="#">Казань</a><a
                  class="m-cont__drop-link" href="#">Москва</a><a class="m-cont__drop-link" href="#">Санкт-Петербург</a><a
                  class="m-cont__drop-link" href="#">Новосибирск</a><a class="m-cont__drop-link"
                                                                       href="#">Екатеринбург</a><a
                  class="m-cont__drop-link" href="#">Нижний Новгород</a><a class="m-cont__drop-link" href="#">Казань</a>
        </div>
      </div>
    </div>
    <div class="m-cont__tabs">
      <div class="m-cont__tabs-top">
        <div class="m-cont__tabs-button" data-tab="type_1" style="display: block">Точки продаж</div>
        <div class="m-cont__tabs-button is-active" data-tab="type_2">Дистрибьюторы</div>
        <div class="m-cont__tabs-opener is-active">
          <div class="m-cont__tabs-opener-bar"></div>
          <div class="m-cont__tabs-opener-bar"></div>
          <div class="m-cont__tabs-opener-bar"></div>
        </div>
      </div>
      <div class="m-cont__tabs-content" style="display: block;">
        <div class="m-cont__tabs-content-item" id="type_1">

          <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>

            <? if ($arItem["IBLOCK_ID"] == 8): ?>
              <div class="m-cont__tabs-item">
                <a class="m-cont__tabs-item-title" href="" data-id="<?= $arItem['ID'] ?>"><?= $arItem['NAME'] ?></a>
                <div class="m-cont__tabs-item-addr"><?= $arItem['PROPERTIES']['ATT_ADDRESS']['VALUE'] ?></div>
              </div>
            <? endif; ?>

          <? endforeach; ?>
        </div>
        <div class="m-cont__tabs-content-item" id="type_2" style="display:block;">

          <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
            <? if ($arItem["IBLOCK_ID"] == 6): ?>
              <div class="m-cont__tabs-item">
                <a class="m-cont__tabs-item-title" href="" data-id="<?= $arItem['ID'] ?>"><?= $arItem['NAME'] ?></a>
                <div class="m-cont__tabs-item-addr"><?= $arItem['PROPERTIES']['ATT_ADDRESS']['VALUE'] ?></div>
              </div>
            <? endif ?>
          <? endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</div>

<script class="ajax-script">
    arPoints = {
        marker: '/local/templates/main/tpl/dist/assets/images/static/marker-1.svg',
        initial: '<?= ($_GET['city_name']) ? $_GET['city_name'] : 'Москва' ?>',
        groups: <?= CUtil::PhpToJSObject($arResult['POINTS']) ?>
    };
</script>