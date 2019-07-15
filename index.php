<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Valvoline");
$APPLICATION->SetPageProperty("title", "Valvoline");
$APPLICATION->SetPageProperty("description", "Valvoline");

use Deus\Helpers\Main;
global $APPLICATION;

?>
    <?php Main::includeFile("main/slider"); ?>

    <div class="container">
        <div class="overlay"></div>
        <?php Main::includeFile("main/content"); ?>
        <?php Main::includeFile("main/catalog-list"); ?>
        <?php Main::includeFile("main/promo"); ?>
        <?php Main::includeFile("main/points"); ?>
        <?php Main::includeFile("main/offers"); ?>
        <?php Main::includeFile("main/articles"); ?>
        <?php Main::includeFile("main/seller"); ?>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>