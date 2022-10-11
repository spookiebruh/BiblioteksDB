<?php
    //Använder conn.php för att göra koola grejer (koppla till db och starta sesh)
    require_once("conn.php");

    //Detta är onödigt egentligen (lovar)
    $db = $conn;
    $tableNameLanelista="lanelista";
    $columnsLanelista=['bokID'];

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
    
   
    $compareBok = $db->query ("SELECT bokID FROM lanelista WHERE lanelista.bokID = ".$_POST["BID"]);        
        
    if ($compareBok -> num_rows > 0){
        if (isset($_POST['lamnatbxBok'])) {
            $BID = $_POST["BID"];
            
            $sqltabortBok = "DELETE FROM lanelista WHERE lanelista.bokID = $BID"; 
    
              if ($conn->query($sqltabortBok) == TRUE) {
                echo "Du lämnade tillbaka ".$_POST["bokTitel"]."!";
              } else {
                echo "Error: " . $sqltabortBok . "<br>" . $conn->error;
              }
        }   
        
        }
            else{
                header("location: anvandare.php");
            }
?>
