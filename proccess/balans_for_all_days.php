<?php

$obj = $_GET['name'];
$msql = new mysqli('', 'root', '', 'notebook');
    $query = "select SUM(cost_income) from `income_cost` where `name`='$obj' ";
//    var_dump($query);
        $result = $msql->query($query);
        $balans = $result->fetch_all()[0][0];
        $query = "SELECT COUNT(id) from `income_cost` where `name`= '$obj'";
        $result = $msql->query($query);
        $count_work_days = $result->fetch_all()[0][0];
        $msql->close();
        header("Location:../View/balans.php?count_work_days=$count_work_days&name=$obj&balans=$balans");
    
