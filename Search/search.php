<?php
$msql = new mysqli('localhost', 'root', '', 'notebook');
$query = "select * from namess";
$mst = $msql->query($query);
$result = $mst->fetch_all();
?>
<pre>
<?php
$search_string = $_GET['search_word'];


foreach($result as $r){
    $arr_names[]=$r[1];
}
$result_search=[];

//var_dump($arr_names);
foreach($arr_names as $k=>$name){
    
    echo '<br>';
    $q = "select * from notebook.$name";
    
    $enm = $msql->query($q);
    if($enm != null){
    $res=$enm->fetch_all();
    foreach ($res as $key => $value) {
       
      if( str_contains($value[1] , $search_string)){
         $result_search[]="$value[1] ---- $name ----$value[0]";
      }  
    }
    
    }
    
}
var_dump($result_search);
?>
</pre>
<a href="../index.php">go to index</a>
