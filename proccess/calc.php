<?php
 
$newNameObj=$_GET['newNameObject'];
if(array_key_exists('is_sort', $_GET)){
    $is_sort = !$_GET['is_sort'];
}
if(array_key_exists('id', $_GET)){
    
    header("Location:../funcShow.php?sort=id&newNameObject=$newNameObj&is_sort=$is_sort");
}else if(array_key_exists('reccord', $_GET)){
    
    header("Location:../funcShow.php?sort=reccord&newNameObject=$newNameObj&is_sort=$is_sort");
}else if(array_key_exists('date', $_GET)){
    header("Location:../funcShow.php?sort=time_event&newNameObject=$newNameObj&is_sort=$is_sort");
}else if(array_key_exists('edit', $_GET)){

   $id_update = $_GET['edit'];
   $id_update= explode('_', $id_update);
   header("Location:../View/update.php?id=$id_update[1]"); 
}


?>
<a href="../funcShow.php?newNameObject=<?=$newNameObj?>"> go to show everything</a>
