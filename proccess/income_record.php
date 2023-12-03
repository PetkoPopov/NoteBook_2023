<?php
$conn = new mysqli('', "root", "", 'notebook');

$name = $_GET['newNameObj'];
 
if (!empty($_GET['cost_income']) && (!empty($_GET['explain_cost_income'] || $_GET['select']))) {
//  exit('HERE income_cosrt');      
        $query = "INSERT INTO `income_cost` (`cost_income` , `at_date` , `expl`,`name`) VALUES (? , ? , ? ,?)";
        $record = $conn->prepare($query);
        if (isset($_GET['cost_income']) && $_GET['cost_income'] > 0) {
            $val = $_GET['cost_income'];
        }


        if (array_key_exists('date_event_for_object', $_GET)) {
            $date = $_GET['date_event_for_object'];
        } 
        $expl = '';
        if (array_key_exists('select', $_GET) && !empty($_GET['select'])) {
            $expl .= $_GET['select'];
        }
        if(isset($_GET['explain_cost_income']) && !empty($_GET['explain_cost_income']))
        {
        $expl .= $_GET['explain_cost_income'];
        
        }else{
            $expl .= '@';
        }
         
        $record->bind_param('dsss', $val, $date, $expl, $name);

       
        if ($record->execute()) {
            
//            $query_dump = "mysqldump -u root -p notebook>F://resrev/notebookarch.sql ";
//            if($conn->query($query)){
//                echo "dump";exit;
//            }
            
      header("Location: ../View/ShowAllForObject.php?name=$name");
            } else {
                echo "no record";
            $record->errno();
        }
    }