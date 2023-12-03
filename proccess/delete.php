<?php

$id = $_GET['id'];
$newNameObject = $_GET['newNameObj'];

$msql = new mysqli('localhost', 'root', '', 'notebook');
$tableForDel = 'notebook.'.$newNameObject;    
//$query ="select * from $tableForDel";
    $query = " delete from $tableForDel where id = $id  " ;
    var_dump($query);
    if($msql->query($query)){        
        $del=true;
        header("Location:../index.php?is_deleted=$del");
    }else{
        $msql->errno();
        $del="is imposible";
        header("Location:../index.php?is_deleted=$del");
    }

    