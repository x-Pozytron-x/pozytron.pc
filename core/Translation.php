<?

class Translation
{
  private static $lang = 'en';
  public static function setLang($language)
  {
    self::$lang = in_array($language, ['en', 'ua', 'cz']) ? $language : 'en';
  }

  public static function get($section, $key)
  {
    $query = "SELECT content_" . self::$lang . " as content 
              FROM pozytron_content 
              WHERE page_section = ? AND key_name = ?";

    $result = get_data($query, [$section, $key]);
    return $result ? $result[0]['content'] : "Missing: {$section}.{$key}";
  }
}

Translation::setLang($lang);

function tr($section, $key) {
  return Translation::get($section, $key);
}

// test comment
?>