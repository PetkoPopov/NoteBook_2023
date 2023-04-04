<?php

 $month = $_GET['month'];
 $obj = $_GET['name'];
 $msql = new mysqli('', 'root', '', 'notebook');       
        $dateStart =  $month.'-00' ;
//        var_dump($dateStart);die;
       $d = explode('-', $month);
       
       if($d[1]=='12'){
           $d[0]+=1;
           $d[1]='00';
       }else if($d[1]<=11 && $d[1]>=10){
           $d[1]+=1;
           $d[1]="$d[1]";
       }else if($d[1]<=8){
           $d[1]+=1;
           $d[1]='0'.$d[1];
           $d[1]="$d[1]";
       }else if($d[1]==9){
           $d[1]='10';
       }
       $dateEnd = $d[0]."-$d[1]-00";
//        var_dump($dateStart,$dateEnd);die;
        $query = "select SUM(cost_income) from income_cost where `name`='$obj' and at_date>'$dateStart' and at_date<'$dateEnd' ";
//    var_dump($query);die;
        $result = $msql->query($query);
        $balans = $result->fetch_all()[0][0];
//     var_dump($balans);die;
        $query = "SELECT COUNT(id) from `income_cost` where `name`= '$obj'  and at_date>'$dateStart' and at_date<'$dateEnd' ";
        $result = $msql->query($query);
        $count_work_days = $result->fetch_all()[0][0];
         header("Location:../View/balans.php?count_work_days=$count_work_days&name=$obj&balans=$balans");
        
