<?php
if(isset($_REQUEST['filename']))
{
  $filename=$_REQUEST['filename'].".txt";
  $myfile=file($filename);
  $myfile_array = json_encode($myfile);
  print($myfile_array);
}
?>
