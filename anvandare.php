<?php
  session_start();
  require_once("conn.php");
  
  // -------------------------------------------- //
  // --------------- Bok ------------------------ //
  // -------------------------------------------- //

  //Defining variables
  $db = $conn;
  $tableNameBok="bok";
  $columnsBok= ['BID', 'Titel', 'Forfattare', 'Genre', 'Antalsidor'];
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
  // -------------------------------------------- //
  // --------------- Ljud ----------------------- //
  // -------------------------------------------- //

  $tableNameLjud="ljud";
  $columnsLjud= ['LID', 'Titel', 'Forfattare', 'Genre', 'Langd', 'Rost'];
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

  // -------------------------------------------- //
  // --------------- Film ----------------------- //
  // -------------------------------------------- //

  $tableNameFilm="film";
  $columnsFilm= ['FID', 'Titel', 'Regissor', 'Genre', 'Langd'];
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
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Användare</title>
  <div class="rubrik"><h2>Bibliotek</h2></div>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="anvandare.css">
</head>
<body>
<div class="blockk">
 <!-- BOK -->  
  <div class="box1">
            
            <table class="table table-bordered bild">
            <tbody>
          <?php
              $fetchDataBok = fetch_data($db, $tableNameBok, $columnsBok);
              if(is_array($fetchDataBok)){      
              $sn=1;
              foreach($fetchDataBok as $data){
            ?>
              <div class="box">
                <form method="post" action="lanabok.php">
                  <input type="hidden" name="Bocker">
                  <td><?php echo $_SESSION["bokTitel"] = $data['Titel']??''; ?></td>
                  <td><?php echo $_SESSION["bokForfattare"] = $data['Forfattare']??''; ?></td>
                  <td><?php echo $_SESSION["bokGenre"] = $data['Genre']??''; ?></td>
                  <td><?php echo $_SESSION["Antalsidor"] = $data['Antalsidor']??''; ?></td>
                  <td><input type="submit" value="Låna"></td>
                </form>
              </div>
        
            <?php }}?>
            </tbody>
          </table>
      </div>
  <!-- LJUD -->      
    <div class="box2">
            <table class="table table-bordered bild2">
          <tbody>
        <?php
            if(is_array($fetchDataLjud)){      
            $sn=1;
            foreach($fetchDataLjud as $data){
          ?>
            <div class="box">
              <form method="post" action="lanaljud.php">
                <input type="hidden" name="Ljudbocker">
                <td><?php echo $_SESSION["ljudTitel"] = $data['Titel']??''; ?></td>
                <td><?php echo $_SESSION["ljudForfattare"] = $data['Forfattare']??''; ?></td>
                <td><?php echo $_SESSION["ljudGenre"] = $data['Genre']??''; ?></td>
                <td><?php echo $_SESSION["ljudLangd"] = $data['Langd']??''; ?></td>
                <td><?php echo $_SESSION["Rost"] = $data['Rost']??''; ?></td>
                <td><input type="submit" value="Låna"></td>
              </form>
            </div>

          <?php }}?>
          </tbody>
          </table>
      </div>
  <!-- FILM -->  
    <div class="box3">
            <table class="table table-bordered bild3">
          <tbody>
        <?php
            if(is_array($fetchDataFilm)){      
            $sn=1;
            foreach($fetchDataFilm as $data){
          ?>
            <div class="box">
              <form method="post" action="lanafilm.php">
                <input type="hidden" name="Filmer"> 
                <td><?php echo $_SESSION["filmTitel"] = $data['Titel']??''; ?></td>
                <td><?php echo $_SESSION["Regissor"] = $data['Regissor']??''; ?></td>
                <td><?php echo $_SESSION["filmGenre"] = $data['Genre']??''; ?></td>
                <td><?php echo $_SESSION["filmLangd"] = $data['Langd']??''; ?></td>
                <td><input type="submit" value="Låna"></td>
              </form>
              </div>
          <?php }}?>
          </tbody>
          </table>
      </div>
 </div>
</div>
</body>
</html>

