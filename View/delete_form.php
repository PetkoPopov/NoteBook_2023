<?php
$id = $_GET['id'];
$newNameObject = $_GET['newNameObject'];
var_dump($newNameObject,$id);
?>
<form  action="../proccess/delete.php">
    <input type="submit" value="are you sure to delete ??"><!-- comment -->
    <input type="hidden" value="<?=$id?>" name="id" />
    <input type="hidden" value="<?=$newNameObject?>" name="newNameObj" />
    
</form>
    
