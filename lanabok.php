<?php
  //Connect to DB
  require_once("conn.php");
  //Starting session
  session_start();

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

    $columnNameBok = implode(", ", $columnsBok);

    $sql = "SELECT ".$columnNameBok." FROM $tableNameBok"." ORDER BY titel";
    $result = $db->query($sql);

    if($result == true){ 
      if ($result->num_rows > 0) {
         $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
         $msg= $row;
      } else {
         $msg= "No Data Found"; 
      }
     }else{
       $msg= mysqli_error($db);
     }
     }
     return $msg;
     }

     // Lägger till media i lånelistan
     $compareBok = $db->query ("SELECT bokID FROM lanelista WHERE lanelista.bokID = ".$_SESSION["BID"]."");
     
     
      if ($compareBok -> num_rows > 0){
          header("location: anvandare.php");
          }
      else{
          if (isset($_POST['Bocker'])) {
            $BID = $_SESSION["BID"];
            $sqlBok = "INSERT INTO lanelista (bokID) VALUES ($BID)"; 
              
            echo ($sqlBok);
    
              if ($conn->query($sqlBok) == TRUE) {
                echo "Du lånade ".$_SESSION["bokTitel"]."!";
              } else {
                echo "Error: " . $sqlBok . "<br>" . $conn->error;
              }
        }
    
          }
     
?>
