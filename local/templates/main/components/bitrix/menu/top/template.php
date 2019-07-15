<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)){?>
  <nav class="header__menu-inner">
    <?php foreach($arResult as $arItem){ ?>
          <a class="header__menu-link <?if(!empty($arItem["ACTIVE"])) echo ' is-active';?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
    <?php } ?>
  </nav>
<?php } ?>
