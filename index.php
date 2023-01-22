<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>TEST AFTER INSTALING</title>
        <link rel="stylesheet" href="../TestAfterReinstaling/newcss.css" />
    </head>
    <body>
       
        <form action="proccess/index.php">
            <select style="background-color: #cccc00; width:100px;height: 66px;" name="opt">
                <option value="#">no value</option>
                <?php
                $allNames = [];
                $msql = new mysqli('', 'root', '', "notebook");
                $query = "select distinct(`name`) from `namess` ";
                $result = $msql->query($query); //внимание ако заявкята е грешна кода ще спре без да гръмне
                $all = $result->fetch_all();
                foreach ($all as $count => $key) {
                    $allNames[] = $key[1];
                    echo "<option value=$key[0] name=$count > $key[0] </option>";
                }
                $msql->close();
                ?>

            </select> 
            <p>
            <div>
                <a href="insert_income_cost.php">go to insert incomes or costs</a>
                <p>
                    </p>
                    <a href="View/showAllForObject.php"> go to balans</a>
            </div>
            </p>
            <p>
            INSERT NEW NAME-OBJECT :<input type="text" name="newObject"  value="">
            </p>
            <p>
                <textarea name="textArea" rows="5" cols="100" style="background-color: #99ff99 ; font-size: x-large"></textarea>
            </p>
            <label for="time_event">избери дата </label>
            <input type="date" name="time_event" id="time_event">
             

                <label for="time_manual" >въведи датата ръчно</label>
                <input type="text" name="time_manual" id="time_manual" >

            
            <input  type="submit" style="background-color: #cccc00; width:100px;height: 66px;" name="btn" value="Запиши" >

 
        </form>
           
        <a href="clearDB.php">clear tables</a>
    </body>
</html>
