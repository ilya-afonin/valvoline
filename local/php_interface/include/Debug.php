<?

class Debug {
  /**
   * Log message with label
   *
   * @param mixed $message
   * @param string $label
   * @param string $path
   * @param bool $isClearFile
   * @param string $absPath
   */
  public static function lm($message, $label = '', $path = '', $isClearFile = false, $absPath = '') {
    $backTrace = debug_backtrace();

    if (empty($absPath)) {
      $logPathPart = array(
        'logs',
        date('Y'),
        date('m'),
        date('d')
      );

      $logPath = $_SERVER['DOCUMENT_ROOT'].'/';

      foreach ($logPathPart as $part) {
        $logPath .= $part.'/';

        if (!file_exists($logPath)) {
          mkdir($logPath, 0700);
        }

        if ($part == 'logs') {
          $htAccess = fopen($logPath.'.htaccess', 'w');
          fwrite($htAccess, 'Deny from all');
          fclose($htAccess);
        }
      }

      $path = $logPath.(mb_strlen($path) == 0 ? 'log.txt' : $path);

      if ($isClearFile) {
        unlink($path);
      }
    } else {
      if ($isClearFile) {
        unlink($absPath);
      }

      $path = $absPath;
    }

    $file = fopen($path, 'a+');
    fwrite($file, date('r', time())."\t".$label.': '.print_r($message, true)." (line: ".$backTrace[0]['line'].", file: ".$backTrace[0]['file'].")\n");

    fclose($file);
  }

  /**
   * Object to array
   *
   * @param mixed $object
   *
   * @return array
   */
  public static function ota($object) {
    if (!is_object($object) && !is_array($object)) {
      return $object;
    }

    if (is_object($object)) {
      $object = get_object_vars($object);
    }

    return array_map(array(
      'Debug',
      'ota'
    ), $object);
  }

  /**
   * Вывод переменной в консоль debug to console
   *
   * @param mixed $var
   * @param string $label
   * @param bool $useBackTrace
   * @param bool $toString
   *
   * @return string
   */
  public static function dtc($var, $label = '', $useBackTrace = true, $toString = false) {
    $backTrace = array();
    if ($useBackTrace) {
      $backTrace = debug_backtrace();
    }

    $js = '<script>
      console.log('.(empty($label) ? '' : '\''.$label.':\',').json_encode(unserialize(serialize($var))).');
      '.($useBackTrace ? 'console.log("line: '.$backTrace[0]['line'].', file: '.$backTrace[0]['file'].'")' : '').';
    </script>';

    if (!$toString) {
      echo $js;
      return '';
    } else {
      return $js;
    }
  }

  /**
   * Возвращает стек вызовов
   *
   * @return string
   */
  public static function btf() {
    $files = array();
    $label = 'FilesStack';

    $backTrace = debug_backtrace();

    foreach ($backTrace as $item) {
      $files[] = $item['file'].' ['.$item['line'].']';
    }

    echo '<script>
      console.log('.(empty($label) ? '' : '\''.$label.':\',').json_encode(unserialize(serialize($files))).');
    </script>';
  }

  /**
   * Записывает сериализованную переменную в файл
   *
   * @param mixed $data
   * @param string $fileName
   * @param bool $isClearFile
   *
   * @return mixed
   */
  public static function sjs($data, $fileName = 'data', $isClearFile = false) {
    if ($isClearFile) {
      unlink($_SERVER['DOCUMENT_ROOT'].'/'.$fileName.'.json');
    }

    return file_put_contents($_SERVER['DOCUMENT_ROOT'].'/'.$fileName.'.json', serialize($data));
  }

  /**
   * Вытаскивает из файла сериализованную переменную
   *
   * @param string $fileName
   *
   * @return mixed
   */
  public static function gjs($fileName = 'data') {
    if (file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$fileName.'.json')) {
      return unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/'.$fileName.'.json'));
    } else {
      return false;
    }
  }

  /**
   * @param mixed $value
   * @param string $label
   * @param string $color
   * @param bool $collapse
   */
  public static function d($value, $label, $color = '#000', $collapse = true) {
    $rand = rand();
    echo '<div style="border-bottom: silver 1px solid;margin-bottom: 5px;padding-bottom:5px;color:'.$color.';"><div'.($collapse ? ' id="label_'.$rand.'"' : "").' style="cursor:pointer;">'.$label.'</div><pre'.($collapse ? ' id="block_'.$rand.'"' : "").($collapse ? ' hidden' : '').'>'.print_r($value, true).'</pre>';
    if ($collapse) {
      echo '<script>
        var label = document.getElementById("label_'.$rand.'");
        label.addEventListener("click", function() {
          var block = document.getElementById("block_'.$rand.'");
          
          if (block.hasAttribute("hidden")) {
            block.removeAttribute("hidden");
          } else {
            block.setAttribute("hidden", "hidden");
          }
        });
      </script>';
    }

    echo '</div>';
  }

  //region Time debug
  static $time = array();

  /**
   * Return response time array
   *
   * @return array
   */
  private static function getResponseArray() {
    return array(
      'start' => 0,
      'end' => 0,
      'time' => 0
    );
  }

  /**
   * Return time
   *
   * @return mixed
   */
  private static function getTime() {
    $time = explode(' ', microtime());
    return $time[0] + $time[1];
  }

  /**
   * Start timer
   *
   * @param string|int $id
   */
  static function start($id = 0) {
    self::$time[$id] = self::getResponseArray();
    self::$time[$id]['start'] = self::getTime();
  }

  /**
   * Stop timer and return time array
   *
   * @param string|int $id
   * @return mixed
   */
  static function stop($id = 0) {
    self::$time[$id]['end'] = self::getTime();
    self::$time[$id]['time'] = self::$time[$id]['end'] - self::$time[$id]['start'];
    return self::$time[$id];
  }
  //endregion
}