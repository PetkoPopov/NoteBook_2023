<head>
    <link rel="stylesheet" href="../TestAfterReinstaling/newcss.css" />

</head>
<body>
    <a href="index.php">go to NoteBook </a>
    <a href="insert_income_cost.php">income and payment</a>
    <a href="View/showAllForObject.php">show balans</a>

    <?php
    $newNameObj = $_GET['newNameObject'];
    $msql = new mysqli('', 'root', '', "notebook");
    $show = '';
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
            $query = "select * from notebook.$newNameObj";
        }
    }else{
         $query = "select * from notebook.$newNameObj";
    }
        $result = $msql->query($query);
        $show = $result->fetch_all();
    
    ?>
    <form action="proccess/calc.php">
        <table>

            <input type="hidden" name="is_sort" value="<?= $is_sort ?>"/>

            <input type="hidden" value="<?= $newNameObj ?>" name="newNameObject"/>

            <th><input type="submit" name="id" value="sort" ></th>

            <th><input type="submit" name="empty" value="sort"></th>
            <th><input type="submit" name="reccord" value="sort" ></th>
            <th><input type="submit" name="date" value="sort"></th>



            <?php
            $counter = 0;

            foreach ($show as $recc) {

                $counter++;
                if ($counter % 8 == 0) {
                    ?>
                    <tr><!-- comment -->
                        <td><a href="index.php">Go to NoteBook</a></td>
                        <td><a href="View/showAllForObject.php">show balans</a></td>
                        <td><a href="insert_income_cost.php">income and payment</a></td>
                    </tr><?php
        }
        $n = 'update_' . $recc[0];

        $recc[] = " <input type='submit' value='$n'  name='edit'   />";

        echo "<tr>";

        foreach ($recc as $r) {


            echo "<td>";
            echo $r;
            echo "</td>";
        }

        echo "</tr>";
    }
    echo "</table>";
            ?>

    </form>
    <a href="index.php">go to NoteBook</a>
    <a href="insert_income_cost.php">go to insert income payment </a>
    <a href="View/showAllForObject.php">go to balans</a>
</body>