<?php

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
    $query = " CREATE TABLE `notebook`."
            . "$newNameObj ( `id` INT NULL AUTO_INCREMENT, "
            . "`event` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL , "
            . "`time_record` DATETIME  NULL DEFAULT CURRENT_TIMESTAMP , "
            . "`time_event` DATE NOT NULL ,"
            . " PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $msql->query($query);
} else {
    echo "<a href = clearDB.php >clear tables</a>";
    die;
}

$query = "CREATE TABLE `notebook`.`income_cost` ("
        . " `id` INT NOT NULL AUTO_INCREMENT ,"
        . " `cost_income` INT(10) NULL DEFAULT NULL , "
        . "`expl` TEXT NULL DEFAULT NULL ,"
        . " `at_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP ,"
        . " PRIMARY KEY (`id`)) ENGINE = InnoDB; ";
$msql->query($query);
$query = "ALTER TABLE `income_cost` ADD `name` TEXT NOT NULL AFTER `at_date`;";
$msql->query($query);
$query = "ALTER TABLE `income_cost` ADD INDEX(`name`)";
$msql->query($query);

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

    $stmt->bind_param("s", $new);
    $new = $newNameObj;
    $stmt->execute();
}


if (!empty($_GET['textArea'])) {

    $newMysql = new mysqli('', 'root', '', 'notebook');
    $query_insert_into = "INSERT INTO `notebook`.`$newNameObj` (`event` , `time_event`) VALUES ( ? , ? )";
    $stmt2 = $newMysql->prepare($query_insert_into);
    $stmt2->bind_param('ss', $event, $time_event);
    $event = $_GET['textArea'];

    if (!empty($_GET['time_event'])) {
        $time_event = $_GET["time_event"];
        $_SESSION['time_event'] = $time_event;
    } elseif (!empty($_GET['time_manual'])) {
        $time_event = $_GET['time_manual'];

        $_SESSION['time_event'] = $time_event;
    }
    if ($stmt2->execute()) {
        echo "RECCORD";
    } else {
        echo "NO RECORD";
    }
}


header("Location:../funcShow.php?newNameObject=$newNameObj");

