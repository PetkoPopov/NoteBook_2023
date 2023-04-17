<?php
$msql = new mysqli('localhost', 'root', '', 'notebook');
$query = "select * from namess";
$mst = $msql->query($query);
$result = $mst->fetch_all();
?>
<pre>
<?php
foreach($result as $r){
    $arr_names[]=$r[1];
}
//var_dump($arr_names);
foreach($arr_names as $k=>$name){
    
    echo '<br>';
    $q = "select * from notebook.$name";
    echo $q;
    $enm = $msql->query($q);
    if($enm != null){
    $res=$enm->fetch_all();
    
//    var_dump($res);
    }
}

?>
</pre>
<a href="../index.php">go to index</a>
