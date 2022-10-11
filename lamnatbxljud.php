<?php
    //Använder conn.php för att göra koola grejer (koppla till db och starta sesh)
    require_once("conn.php");

    //Detta är onödigt egentligen (lovar)
    $db = $conn;
    $tableNameLanelista="lanelista";
    $columnsLanelista=['ljudID'];

    // Fetching lanelista data
    $fetchDataLanelista = fetch_data_tb($db, $tableNameLanelista, $columnsLanelista);

    // Failsafe function
    function fetch_data_tb($db, $tableNameLanelista, $columnsLanelista){
        if(empty($db)){
         $msg = "Database connection error";
        }elseif (empty($columnsLanelista) || !is_array($columnsLanelista)) {
         $msg ="columns Name must be defined in an indexed array";
        }elseif(empty($tableNameLanelista)){
          $msg = "Table Name is empty";
        }else{

    $columnNameLanelista = implode(", ", $columnsLanelista);

    $sql = "SELECT ".$columnNameLanelista." FROM $tableNameLanelista";
    $result = $db->query($sql);

    // Fetchar data om det finns
    if($result == true){ 
      if ($result->num_rows > 0) {
         $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
         $msg = $row;
      } else {
         $msg = "No Data Found"; 
      }
     }else{
       $msg = mysqli_error($db);
     }
     }
     return $msg;
     }
    
   
    $compareLjud = $db->query ("SELECT ljudID FROM lanelista WHERE lanelista.ljudID = ".$_POST["LID"]);        
        
    if ($compareLjud -> num_rows > 0){
        if (isset($_POST['lamnatbxLjud'])) {
            $LID = $_POST['LID'];
            
            $sqltabortLjud = "DELETE FROM lanelista WHERE lanelista.ljudID = $LID"; 
    
              if ($conn->query($sqltabortLjud) == TRUE) {
                echo "Du lämnade tillbaka ".$_POST["ljudTitel"]."!";
              } else {
                echo "Error: " . $sqltabortBok . "<br>" . $conn->error;
              }
        }   
        
        }
            else{
                header("location: anvandare.php");
            }
?>
