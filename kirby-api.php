<?php
/*
 * Basic JSON API
 * A plugin for Kirby - https://getkirby.com/
 * Author: Butch Ewing @butchewing
 * $api['documents'] is commented out because is doesn't work in the current version of Kirby
 * $api['siblings'] is commented out because it is not nessesary in most API's
*/

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
      //$api['documents']     = page($collection)->documents()->toArray();
      $documents            = page($collection)->documents();
      foreach($documents as $item) {
        $api['documents'][] = array(
          'url'      => $item->url(),
          'filename' => $item->filename(),
          'type'     => $item->type(),
          'size'     => $item->size(),
          'dir'      => $item->dir()
        );
      }
      //$api['siblings']      = page($collection)->siblings()->toArray();
      $api['children']      = page($collection)->children()->toArray();
      $api['grandchildren'] = page($collection)->grandchildren()->toArray();

      return new Response($api, 'json');
    }
  )
));
