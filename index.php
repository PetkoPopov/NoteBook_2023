<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>TEST AFTER INSTALING</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../NoteBook_2023/newcss.css" />
        
    </head>
    <body>
       
        
        <form action="./showSearchResult.php" >
            <input type="text" name="search_word"/>
            <input type="submit" value="не работи кирилица search" class="button_input"/>
        </form>
        
        <form action="proccess/index.php">
            <select style="background-color: #cccc00; width:100px;height: 66px;" name="opt">
                <option value="#">no value</option>
                <?php
//                require_once 'autoload.php';
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
                INSERT NEW NAME-OBJECT :<input type="text" name="newObject"  value="" placeholder="без интервали">
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
           
        <a href="clearDB.php">erase some tables</a>
    </body>
</html>
