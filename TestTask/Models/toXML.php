<?php

class ArrayToXML
{
  /**
   * Функция конвертации массива в XML объект
   * На вход подается мульти вложенный массив, на выходе получается с помощью рекурсии валидный xml
   *
   * @param array $data
   * @param string $rootNodeName - корень вашего xml.
   * @param SimpleXMLElement $xml - используется рекурсивно
   * @return string XML
   */
  public static function toXml($data, $rootNodeName = 'data', $xml=null)
  {
    // включить режим совместимости, не совсем понял зачем это но лучше делать
    if (ini_get('zend.ze1_compatibility_mode') == 1)
    {
      ini_set ('zend.ze1_compatibility_mode', 0);
    }
  
    if ($xml == null)
    {
      $xml = simplexml_load_string("<?xml version=\"1.0\" encoding=\"utf-8\"?><$rootNodeName />");
    }
  
    //цикл перебора массива
    foreach($data as $key => $value)
    {
      // нельзя применять числовое название полей в XML
      if (is_numeric($key))
      {
        // поэтому делаем их строковыми
        $key = "unknownNode_". (string) $key;
      }
  
      // удаляем не латинские символы
      $key = preg_replace('/[^a-z0-9]/i', '', $key);
  
      // если значение массива также является массивом то вызываем себя рекурсивно
      if (is_array($value))
      {
        $node = $xml->addChild($key);
        // рекурсивный вызов
        ArrayToXML::toXml($value, $rootNodeName, $node);
      }
      else
      {
        // добавляем один узел
                                $value = htmlentities($value);
        $xml->addChild($key,$value);
      }
  
    }
    // возвратим обратно в виде строки  или просто XML-объект
    return $xml->asXML();
  }
}

?>