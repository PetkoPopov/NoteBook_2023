<html>
    <head>
         <link rel="stylesheet" href="Search/tableSearch.css"/>
    </head>
    <body>
       
<?php
include_once './Search/search.php';
$res =search();
?>

<div class="container">
   
    <table>
	
 <?php
    foreach ($res as  $value) {  
?>    
                <tr><td><?=$value?></td></tr>
    
        <?php
    }
    ?>
        </table>
</div>  
    </body>
</html>