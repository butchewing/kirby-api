<?php
/*
 * Kirby Basic JSON REST API Plugin
 * A plugin for Kirby - https://getkirby.com/
 * Version: 0.0.2
 *
 * Author: Butch Ewing @butchewing
*/

// Feel free to set this to whatever you would like.
$prefix = "api/v1/";

kirby()->routes(array(
  array(
    'method'  => 'GET',
    'pattern' => $prefix . '(:all)',
    'action'  => function() use($prefix) {
      $path                 = kirby()->request()->path();
      $collection           = str_replace($prefix, '', $path);
      $api                  = array();

      $api['page']          = page($collection)->toArray();

      $api['images']        = page($collection)->images()->toArray();

      // Commented out because is doesn't work in the current version of Kirby.
      //$api['documents']     = page($collection)->documents()->toArray();
      $documents            = page($collection)->documents();
      $docs                 = array();
      foreach($documents as $item) {
        $docs[] = item;
      }
      $api['documents']     = $docs;

      // Commented out because it is not usually nessesary.
      //$api['siblings']      = page($collection)->siblings()->toArray();

      $children             = page($collection)->children()->toArray();
      $childrenImages       = array();
      foreach($children as $item) {
        $item['images']   = page($item['id'])->images()->toArray();
        $childrenImages[] = $item;
      }
      $api['children']      = $childrenImages;

      // Commented out because it is not usually nessesary.
      //$api['grandchildren'] = page($collection)->grandchildren()->toArray();

      return new Response($api, 'json');
    }
  )
));
