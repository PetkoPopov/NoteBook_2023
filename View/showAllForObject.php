
     <!--<link rel="stylesheet" href="../newcss.css"/>-->
    <link rel="stylesheet" href="../NoteBook_2023/newcss.css" style="display: none"/>

        <?php
        include_once '../View/MakeTableFromArray.php';
        $msql = new mysqli('', 'root', '', 'notebook');
        $obj = $_GET["name"];
//        var_dump($obj);exit;
        $query = "select * from `income_cost` where `name` = '" . $obj . "'";
//var_dump($msql->query($query));die;
        $result = $msql->query($query);
        $arr = $result->fetch_all();
        $table = new \MakeTableFromArray\MakeTableFromArray($arr);
        $arr_year = [];
        foreach ($arr as $year) {
            $hlp = substr($year[3], 0, 4);

            if (!in_array($hlp, $arr_year)) {
                $arr_year[] = $hlp;
            }
        }
        ?>
         <a href="../index.php">go to noteboook</a>
            <a href="../income_form.php?name=<?=$obj?>"> go to income and payment</a>
          
     <form action="../proccess/balans_for_all_days.php">
            <input type="hidden" name ="name" value="<?= $obj ?>"/>
            <input type="submit" value="show Balans"/> 
        </form>
        <form action="../proccess/balans_for_month.php">
            <input type="hidden" name="name" value="<?= $obj ?>"/>
            <input type="submit" value="Balans for month" name="balansForMonth" style=" width:200px; border: solid 2px #000000;
                   box-shadow: 10px 6px #ff0000;"/>
            <input type="month" name="month" />

        </form>
        <form action="../proccess/balans_for_year.php">
            <input type="hidden" name="name" value="<?= $obj ?>"/>
            <input type="submit" value="show Balans for year " name="showBalans" style=" width:200px; border: solid 2px #000000;
                   box-shadow: 10px 6px #ff0000;"/>

            <select name="balansForYear" style="position: relative; left:10px;">
                <?php
                foreach ($arr_year as $year_distinct) {
                    ?>          <option value="<?= $year_distinct ?>"><?= $year_distinct ?></option><?php
                }
                ?>
        </form>
            
        
        
    