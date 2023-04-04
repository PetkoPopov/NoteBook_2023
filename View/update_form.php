<?php

$id = $_GET['id'];
$newNameObj=$_GET['newNameObject'];
$msql = new mysqli('', 'root', '', "notebook");
$query ="select * from notebook.$newNameObj where id = $id";
$result = $msql->query($query);
$show = $result->fetch_all();

?>
       <form action="../proccess/update.php">
           <input type="hidden" name="id" value="<?=$id?>"/>
           
           <input type="hidden" name="newNameObject" value="<?=$newNameObj?>"/>
            <p>
                <textarea name="textArea" 
                          rows="5" cols="100" 
                          style="background-color: #99ff99 ; 
                          font-size: x-large" ><?=$show[0][1]?></textarea>
            </p>
            <label for="time_event">избери дата </label>
            <input type="date" name="time_event" id="time_event" value="<?=$show[0][3]?>">
             

                <label for="time_manual" >въведи датата ръчно</label>
                <input type="text" name="time_manual" id="time_manual" >

            
            <input  type="submit" style="background-color: #cccc00; width:160px;height: 66px; border-radius: 20%; box-shadow:#ff9933 5px 5px ;"
                    name="btn" value="Запиши Промяната" >

 
        </form>
 <?php
 $msql->close();