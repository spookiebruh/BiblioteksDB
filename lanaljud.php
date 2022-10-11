<?php
  //Connect to DB
  require_once("conn.php");



  // -------------------------------------------- //
  // --------------- Ljud ----------------------- //
  // -------------------------------------------- //


  $db = $conn;
  $tableNameLjud="ljud";
  $columnsLjud= ['Titel', 'Forfattare', 'Genre', 'Langd', 'Rost'];
  //Fetching data
  $fetchDataLjud = fetch_data_ljud($db, $tableNameLjud, $columnsLjud);
  //Defining function "fetch_data"
  function fetch_data_ljud($db, $tableNameLjud, $columnsLjud){
    if(empty($db)){
     $msgLjud = "Database connection error";
    }elseif (empty($columnsLjud) || !is_array($columnsLjud)) {
     $msgLjud = "columns Name must be defined in an indexed array";
    }elseif(empty($tableNameLjud)){
      $msgLjud = "Table Name is empty";
    }else{

    $columnNameLjud = implode(", ", $columnsLjud);

    $sqlLjud = "SELECT ".$columnNameLjud." FROM $tableNameLjud"." ORDER BY titel";
    $resultLjud = $db->query($sqlLjud);

    if($resultLjud == true){ 
      if ($resultLjud->num_rows > 0) {
         $rowLjud = mysqli_fetch_all($resultLjud, MYSQLI_ASSOC);
         $msgLjud = $rowLjud;
      } else {
         $msgLjud = "No Data Found"; 
      }
     }else{
       $msgLjud = mysqli_error($db);
     }
     }
     return $msgLjud;
     }

     $compareLjud = $db->query ("SELECT ljudID FROM lanelista WHERE lanelista.ljudID = ".$_SESSION["LID"]."");
     
     
    if ($compareLjud -> num_rows > 0){
        header("location: anvandare.php");
        }
    else{
        if (isset($_POST['Ljudbocker'])) {
          $PID = $_SESSION['PID'];
          $LID = $_POST["LID"];
          $dateLjud = date("Y-m-d");
          $slutdateLjud = date('Y-m-d', strtotime("+1 months", strtotime($dateLjud)));;
          
          $sqlLjud = "INSERT INTO lanelista (ljudID, personID, startdatum, slutdatum) VALUES ($LID,$PID, '$dateLjud', '$slutdateLjud')"; 
  
            if ($conn->query($sqlLjud) == TRUE) {
              echo "Du lånade ".$_POST["ljudTitel"]."!";
            } else {
              echo "Error: " . $sqlLjud . "<br>" . $conn->error;
            }
      }
  
        }
   
    ?>