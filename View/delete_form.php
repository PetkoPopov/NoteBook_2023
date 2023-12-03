<link rel="stylesheet" href="../Search/tableSearch.css"/>

<?php
$id = $_GET['id'];
$newNameObject = $_GET['newNameObject'];
//var_dump($newNameObject,$id);
?>
<div style="text-align: center">
    <form action="../funcShow.php" class="warning">
    <input type="hidden" value="<?=$newNameObject?>" name="newNameObject"/>
    <input type="submit" value="GO BACK" />
</form>
    
<form  action="../proccess/delete.php">
    <input type="submit" value="are you sure to delete ??"><!-- comment -->
    <input type="hidden" value="<?=$id?>" name="id" />
    <input type="hidden" value="<?=$newNameObject?>" name="newNameObj" />
    
</form>
    
</div>