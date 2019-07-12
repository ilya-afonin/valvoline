<?php
/**
 * Created by PhpStorm.
 * User: mary
 * Date: 13.03.19
 * Time: 10:50
 */

namespace Deus\EventHandlers;


class Optimize
{
  /**
   * убирает преносы строк
   * @param array $content
   */
  public static function OptimizeHtml(&$content){
    global $USER;
    if(!$USER->IsAdmin()) {
      $content = preg_replace('~>\s*\n\s*<~', '><', $content);
    }
  }

  /**
   * убирает kernel.css битры
   * @param array $content
   */
  function deleteKernelCss(&$content) {
    if(defined('PAGE') && PAGE == '/'){
      global $USER, $APPLICATION;
      if((is_object($USER) && $USER->IsAuthorized()) || strpos($APPLICATION->GetCurDir(), "/bitrix/")!==false) return;
      if($APPLICATION->GetProperty("save_kernel") == "Y") return;

      $arPatternsToRemove = Array(
          '/<link.+?href=".+?kernel_main\/kernel_main\.css\?\d+"[^>]+>/',
          '/<link.+?href=".+?bitrix\/js\/main\/core\/css\/core[^"]+"[^>]+>/', // это ломает html
//            '/<link.+?href=".+?bitrix\/templates\/[\w\d_-]+\/styles.css[^"]+"[^>]+>/',
//            '/<link.+?href=".+?bitrix\/templates\/[\w\d_-]+\/template_styles.css[^"]+"[^>]+>/',
      );

      $content = preg_replace($arPatternsToRemove, "", $content);
      $content = preg_replace("/\n{2,}/", "\n\n", $content);
    }

  }
}