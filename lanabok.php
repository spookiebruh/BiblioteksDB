<?php


  //Connect to DB
  require_once("conn.php");
  
  // -------------------------------------------- //
  // --------------- Bok ------------------------ //
  // -------------------------------------------- //

  //Defining variables
  $db = $conn;
  $tableNameBok="bok";
  $columnsBok= ['Titel', 'Forfattare', 'Genre', 'Antalsidor'];

  //Fetching data
  $fetchDataBok = fetch_data($db, $tableNameBok, $columnsBok);

  //Defining function "fetch_data"
  function fetch_data($db, $tableNameBok, $columnsBok){
    if(empty($db)){
     $msg= "Database connection error";
    }elseif (empty($columnsBok) || !is_array($columnsBok)) {
     $msg="columns Name must be defined in an indexed array";
    }elseif(empty($tableNameBok)){
      $msg= "Table Name is empty";
    }else{





    // Gör om arrayen till en sträng
    $columnNameBok = implode(", ", $columnsBok);
    
  
    $sql = "SELECT ".$columnNameBok." FROM $tableNameBok"." ORDER BY titel";
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



     // Lägger till media i lånelistan
     $compareBok = $db->query ("SELECT bokID FROM lanelista WHERE lanelista.bokID = ".$_POST["BID"]);
     //$personIDBok = $db->query ("SELECT PID FROM person WHERE person.Namn = ".$_SESSION['$anv']." AND person.Password = ".$_SESSION['$pass']);
     
      if ($compareBok -> num_rows > 0){
          header("location: anvandare.php");
          }
      else{
          if (isset($_POST['lanaBok'])) {
            $PID = $_SESSION['PID'];
            $BID = $_POST["BID"];
            $dateBok = date("Y-m-d");
            $slutdateBok = date('Y-m-d', strtotime("+1 months", strtotime($dateBok)));;
            
            $sqlBok = "INSERT INTO lanelista (bokID, personID, startdatum, slutdatum) VALUES ($BID, $PID, '$dateBok', '$slutdateBok')"; 
    
              if ($conn->query($sqlBok) == TRUE) {
                echo "Du lånade ".$_POST["bokTitel"]."!";
              } else {
                echo "Error: " . $sqlBok . "<br>" . $conn->error;
              }
        }
    
          }

