<form>
    <?php
    $msql = new mysqli('', 'root', '', "notebook");
    $query = "select * from `namess` ";
    $result = $msql->query($query);
    foreach ($result->fetch_all() as $r) {
        ?>
        <p>
            <input type="checkbox" id="<?= $r[1] ?>" value="<?= $r[0] ?>" name="<?= $r[1] ?>" >
            <label for="<?= $r[1] ?>" ><?= $r[1] ?></label>
        </p>

        <?php
    }
    ?>
    <input type="submit" value="erase choosen tables">
</form>
<?php
$allNames = $_GET;

foreach ($allNames as $name => $id) {

    $query = "DELETE FROM `namess` WHERE `id` = '$id' ";
    
    $msql->query($query);
    $query = "drop table $name ";
    $msql->query($query);
}
$msql->close();
?>
<a href="index.php">go to notebook</a>