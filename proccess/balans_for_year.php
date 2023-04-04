<?php

$obj =$_GET['name'];
//var_dump($_GET['balansForYear']);die;
 $msql = new mysqli('', 'root', '', 'notebook');
 $year =$_GET['balansForYear'].'-00-00';
 $yearEnd=(int)$_GET['balansForYear']+1;

 $yearEnd="$yearEnd"."-00-00";
// var_dump((string)$yearEnd);die;
 $query = "select SUM(cost_income) from income_cost where `name`='$obj' and at_date>'$year' and at_date<'$yearEnd' ";

        $result = $msql->query($query);
//       var_dump($result->fetch_all());die;
        $balans = $result->fetch_all()[0][0];
        $query2 = "SELECT COUNT(`id`) from income_cost where `name`='$obj' and at_date>'$year' and at_date<'$yearEnd' " ;
        $result2 = $msql->query($query2);
//    var_dump($result2->fetch_all());die;
        $count_work_days = $result2->fetch_all()[0][0];
//      var_dump($result2->fetch_all()[0]);die;/  
        $msql->close();
        header("Location:../View/balans.php?count_work_days=$count_work_days&name=$obj&balans=$balans");