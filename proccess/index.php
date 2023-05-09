<?php

//echoУАУЬ
$msql = new mysqli('', 'root', '', "notebook");

if (($_GET['opt']) == '#' && empty($_GET['newObject'])) {

    die("No choosen Ctaegory");
}
if (empty($_GET['textArea']) || !isset($_GET['textArea'])) {

    $newNameObj = $_GET['opt'];
    header("Location:../funcShow.php?newNameObject=$newNameObj");
}


if (isset($_GET['opt']) && $_GET['opt'] != "#" && !empty($_GET['opt'])) {
    $newNameObj = $_GET['opt'];
} else if (!empty($_GET['newObject']) && $_GET['opt'] == '#') {

    $newNameObj = $_GET['newObject'];
//     var_dump($newNameObj);exit;
    $query = " CREATE TABLE `notebook`."
            . "$newNameObj ( `id` INT NULL AUTO_INCREMENT, "
            . "`event` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL , "
            . "`time_record` DATETIME  NULL DEFAULT CURRENT_TIMESTAMP , "
            . "`time_event` DATE NOT NULL ,"
            . " PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    if($msql->query($query)){
        echo "new table $newNameObj was created ";
        
    }else{
         var_dump($query);exit;
    }
        
} else {
    echo "<a href = clearDB.php >clear tables</a>";
    die;
}


///////////////////////////////////////////////////////////////////////////////////////
//            $query ="insert into `namess` (`name`) values($newNameObj)";
//            $msql->query($query);
//            не работи
///////////////////////////////////////////////////////////////////////////////////////
$allNames_2 = [];
$query = "select distinct(`name`) from `namess` ";
$result = $msql->query($query); //внимание ако заявкята е грешна кода ще спре без да гръмне
$all = $result->fetch_all();

foreach ($all as $name) {
    $allNames_2[] = $name[0];
}
if (!in_array($newNameObj, $allNames_2)) {
    $query = "INSERT INTO `namess` ( `name`) VALUES (?)";

    $stmt = $msql->prepare($query);
   
    $stmt->bind_param("s", $new_);
     $new_ = $newNameObj;
    $stmt->execute();
    $stmt->close();
}

if (!empty($_GET['textArea'])) {

    $query_insert_into = "INSERT INTO `notebook`.`$newNameObj` (`event` , `time_event`) VALUES ( ? , ? )";
// var_dump($query_insert_into);exit;
    $stmt234 = $msql->prepare($query_insert_into);
if($stmt234 == null){
//    var_dump($query_insert_into);exit;
} 
    
    $stmt234->bind_param('ss', $event2, $time_event2);

        $event2 = $_GET['textArea'];
    if (!empty($_GET['time_event'])) {

        $time_event2 = $_GET["time_event"];
        
    } else if (!empty($_GET['time_manual'])) {

        $time_event2 = $_GET['time_manual'];
    }

    if ($stmt234->execute()) {
        echo "RECCORD";
    } else {
        echo "NO RECORD";
    }
}
header("Location:../funcShow.php?newNameObject=$newNameObj");

