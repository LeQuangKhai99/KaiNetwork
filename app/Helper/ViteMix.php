<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

if (!function_exists('vitemix')) {
  function vitemix($target_file_name, $secure = null)
  {
    $manifest_json = base_path() . '/public/dist/.vite/manifest.json';
    if (!File::exists($manifest_json)) {
      return asset($target_file_name, $secure);
    }

    try {
      $json = file_get_contents($manifest_json);
      $manifest_object = json_decode($json);

      $file_object = $manifest_object->$target_file_name;
      $path = "/dist/" . $file_object->file;

      return asset($path, $secure);
    } catch (Exception $ex) {
      Log::error($ex);
      return asset($target_file_name, $secure);
    }
  }
}