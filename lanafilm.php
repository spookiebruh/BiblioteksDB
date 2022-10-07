<?php
     //Connect to DB
  require_once("conn.php");
  //Starting session
  session_start();

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

     $compareFilm = $db->query ("SELECT filmID FROM lanelista WHERE lanelista.filmID = ".$_SESSION["FID"]."");
     
     
      if ($compareFilm -> num_rows > 0){
          header("location: anvandare.php");
          }
      else{
          if (isset($_POST['Filmer'])) {
            $FID = $_SESSION["FID"];
            $sqlFilm = "INSERT INTO lanelista (filmID) VALUES ($FID)"; 
              
            echo ($sqlFilm);
    
              if ($conn->query($sqlFilm) == TRUE) {
                echo "Du lånade ".$_SESSION["filmTitel"]."!";
              } else {
                echo "Error: " . $sqlFilm . "<br>" . $conn->error;
              }
        }
    
          }
?>