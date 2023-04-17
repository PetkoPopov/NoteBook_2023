<head>
    <link rel="stylesheet" href="../TestAfterReinstaling/newcss.css" />

</head>
<body>

    <?php
    $newNameObj = $_GET['newNameObject'];
    $msql = new mysqli('', 'root', '', "notebook");
    ?>    
    <a href="index.php">go to NoteBook </a>
    <a href="./income_form.php?name=<?= $newNameObj ?>">go to insert income payment </a>
    <a href="View/showAllForObject.php?name=<?=$newNameObj?>">show balans</a>

    <?php
    $query = "select * from notebook.$newNameObj";
    if (isset($_GET['is_sort'])) {
        $is_sort = $_GET['is_sort'];
    } else {
        $is_sort = true;
    }
    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
        $is_sort = $_GET['is_sort'];
        if ($is_sort == '1') {
            $query = "select * from notebook.$newNameObj order by $sort desc";
        } else {
            $query = "select * from notebook.$newNameObj order by $sort asc";
        }
    } else {
        $query = "select * from notebook.$newNameObj";
    }
    $result = $msql->query($query);
    if ($result) {
        $show = $result->fetch_all();
        ?>
        <form action="proccess/calc.php">
            <table>

                <input type="hidden" name="is_sort" value="<?= $is_sort ?>"/>

                <input type="hidden" value="<?= $newNameObj ?>" name="newNameObject"/>
               
                <th><input type="submit" name="id" value="sort" ></th>

                <th>Record</th>
                <th>Date Time</th>
                <th><input type="submit" name="date" value="sort"></th>



    <?php
    $counter = 0;

    foreach ($show as $recc) {

        $counter++;
        if ($counter % 8 == 0) {
            ?>
                        <tr><!-- comment -->
                            <td><a href="index.php">Go to NoteBook</a></td>
                            <td><a href="View/showAllForObject.php?name=<?=$newNameObj?>">show balans</a></td>
                            <td><form action="income_form.php"><button name="name"><?= $newNameObj ?></button>
                                    <input type="hidden" name="name" value="<?=$newNameObj?>"/></form></td>
                        </tr><?php
        }
        $n = 'update_' . $recc[0];

        $recc[] = " <input class='button_input'   type='submit' value='$n'  name='edit'   />";

        echo "<tr>";

        foreach ($recc as $r) {


            echo "<td>";
            echo $r;
            echo "</td>";
        }

        echo "</tr>";
    }
    echo "</table>";
}
$msql->close();
?>

    </form>
    <a href="index.php">go to NoteBook</a>
    <a href="../NTBook/income_form.php?name=<?= $newNameObj ?>">go to insert income payment </a>
    <a href="View/showAllForObject.php?name=<?=$newNameObj?>">go to balans</a>
</body>