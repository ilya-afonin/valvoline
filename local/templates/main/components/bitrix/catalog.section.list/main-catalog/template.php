<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>

<?php if (0 < count($arResult["SECTIONS"])): ?>

    <div class="p-cards">
        <div class="p-cards__row" data-aos="fade-up">
             <?php foreach ($arResult['SECTIONS'] as $index => $arSection): ?>
            <div class="p-cards__col">
                <div class="p-card">
                    <a class="p-card__link" href="<?=$arSection['SECTION_PAGE_URL']?>"></a>
                    <div class="p-card__name"><?= $arSection["NAME"] ?></div>
                    <div class="p-card__image">
                        <img class="p-card__image-file" src="<?=$arSection['PICTURE']['SRC']?>" alt="<?=$arSection['NAME']?>">
                    </div>
                </div>
            </div>
             <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
