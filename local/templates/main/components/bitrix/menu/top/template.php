<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)){?>
  <nav class="header__menu-inner">
    <?php foreach($arResult as $arItem){ ?>

          <a class="header__menu-link <?if(!empty($arItem["ACTIVE"])) echo ' is-active';?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>


    <?php } ?>
  </nav>
<?php } ?>


<div class="header__menu-inner">
    <a class="header__menu-link is-active" href="#">О Valvoline</a>
    <a class="header__menu-link" href="#">Продукция</a>
    <a class="header__menu-link" href="#">Точки продаж</a>
    <a class="header__menu-link" href="#">Полезная информация</a>
    <a class="header__menu-link" href="#">Дистрибьюторам</a></div>
