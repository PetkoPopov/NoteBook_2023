<?php

$id = $_GET['id'];
$newNameObj=$_GET['newNameObject'];
$tbl_name = 'notebook.'.$newNameObj;
$text_update =$_GET['textArea'];
$date = $_GET['time_event'];
$msql = new mysqli('', 'root', '', "notebook");

$query = "update $tbl_name set `event`='$text_update' ,`time_event`='$date'  where id=$id ";

$msql->query($query);
$msql->close();
header("Location:../funcShow.php?newNameObject=$newNameObj"); 