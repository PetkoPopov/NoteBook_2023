
<html>
    <head>
        <link rel="stylesheet" href="../newcss.css"/>
    </head><!-- comment -->
    <body>
        <a href="../index.php">go to noteboook</a><h2>the Balans is </h2>
 
        <?php
        
        $balans = $_GET['balans'];
        $count_work_days = $_GET['count_work_days'];
        $name = $_GET['name'];
      ?>  
    <a href="../income_form.php?name=<?=$name?>"> go to income and payment</a>
<?php
            $per_day = round((int)$balans / $count_work_days, 2);
            if (isset($balans) && $balans >= 0) {
                ?>   <div>
                до момента е получил<h4 style="background-color: #66ff33"> <?= $balans ?></h4>
            </div>

<div class="clr_field">
                средно за един ден 
                <h4 style="background-color: #cccc00; font-size: x-large">
                    <?= $per_day ?>
                </h4>
            </div>
            <?php
        }?>

       
           
            <h4 style="background-color: #cccc00; font-size: x-large">брой дни 
       <div style="position:absolute;s"><?= $count_work_days ?></div>
            </h4>
       
        
</div>
<a href="../index.php">go to noteboook</a>
    <a href="../insert_income_cost.php"> go to income and payment</a>
</body>
<html>
