<?php
  //Connect to DB
  require_once("conn.php");


  // -------------------------------------------- //
  // --------------- Film ----------------------- //
  // -------------------------------------------- //


  $db = $conn;
  $tableNameFilm="film";
  $columnsFilm= ['Titel', 'Regissor', 'Genre', 'Langd'];
  //Fetching data
  $fetchDataFilm = fetch_data_film($db, $tableNameFilm, $columnsFilm);
  //Defining function "fetch_data"
  function fetch_data_film($db, $tableNameFilm, $columnsFilm){
    if(empty($db)){
     $msgFilm = "Database connection error";
    }elseif (empty($columnsFilm) || !is_array($columnsFilm)) {
     $msgFilm = "columns Name must be defined in an indexed array";
    }elseif(empty($tableNameFilm)){
      $msgFilm = "Table Name is empty";
    }else{

    $columnNameFilm = implode(", ", $columnsFilm);

    $sqlFilm = "SELECT ".$columnNameFilm." FROM $tableNameFilm"." ORDER BY titel";
    $resultFilm = $db->query($sqlFilm);

    if($resultFilm == true){ 
      if ($resultFilm->num_rows > 0) {
         $rowFilm = mysqli_fetch_all($resultFilm, MYSQLI_ASSOC);
         $msgFilm = $rowFilm;
      } else {
         $msgFilm = "No Data Found"; 
      }
     }else{
       $msgFilm = mysqli_error($db);
     }
     }
     return $msgFilm;
     }

     $compareFilm = $db->query ("SELECT filmID FROM lanelista WHERE lanelista.filmID = ".$_POST["FID"]);
     
     
     if ($compareFilm -> num_rows > 0){
        header("location: anvandare.php");
        }
    else{
        if (isset($_POST['lanaFilm'])) {
          $PID = $_SESSION['PID'];
          $FID = $_POST["FID"];
          $dateFilm = date("Y-m-d");
          $slutdateFilm = date('Y-m-d', strtotime("+1 months", strtotime($dateFilm)));;
          
          $sqlFilm = "INSERT INTO lanelista (filmID, personID, startdatum, slutdatum) VALUES ($FID,$PID, '$dateFilm', '$slutdateFilm')"; 
  
            if ($conn->query($sqlFilm) == TRUE) {
              echo "Du lånade ".$_POST["filmTitel"]."!";
            } else {
              echo "Error: " . $sqlFilm . "<br>" . $conn->error;
            }
      }
  
        }
   
?>