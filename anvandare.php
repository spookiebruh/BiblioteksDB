<?php
  require_once("conn.php");
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
    // -------------------------------------------- //
  // --------------- Ljud ----------------------- //
  // -------------------------------------------- //

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

  // -------------------------------------------- //
  // --------------- Film ----------------------- //
  // -------------------------------------------- //

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
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Användare</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

 <!-- BOK -->  

  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="table-responsive">
          <table class="table table-bordered">
          <thead>
            <tr>
            <th>ID</th>
            <th>Titel</th>
            <th>Författare</th>
            <th>Genre</th>
            <th>Antal sidor</th>
          </thead>
        <tbody>
      <?php


          $db = $conn;
          $tableNameBok="bok";
          $columnsBok= ['BID', 'Titel', 'Forfattare', 'Genre', 'Antalsidor'];

          $fetchDataBok = fetch_data($db, $tableNameBok, $columnsBok);
          if(is_array($fetchDataBok)){      
          $sn=1;
          foreach($fetchDataBok as $data){
        ?>
          <form method="post" action="lana.php">
            <input type="hidden" name="Bocker">
            <td><?php echo $_SESSION["BID"] = $data['BID']??''; ?></td>
            <td><?php echo $_SESSION["Titel"] = $data['Titel']??''; ?></td>
            <td><?php echo $_SESSION["Forfattare"] = $data['Forfattare']??''; ?></td>
            <td><?php echo $_SESSION["Genre"] = $data['Genre']??''; ?></td>
            <td><?php echo $_SESSION["Antalsidor"] = $data['Antalsidor']??''; ?></td>
            <td><input type="submit" value="Låna"></td>
          </form>
    
        <?php }}?>
        </tbody>
        </table>
      </div>
    </div>
    </div>
  </div>

  <!-- LJUD -->          

  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="table-responsive">
          <table class="table table-bordered">
          <thead>
            <tr>
            <th>Titel</th>
            <th>Författare</th>
            <th>Genre</th>
            <th>Längd (i sek.)</th>
            <th>Röst</th>
          </thead>
        <tbody>
      <?php
          if(is_array($fetchDataLjud)){      
          $sn=1;
          foreach($fetchDataLjud as $data){
        ?>
          <tr>
            <td><?php echo $data['Titel']??''; ?></td>
            <td><?php echo $data['Forfattare']??''; ?></td>
            <td><?php echo $data['Genre']??''; ?></td>
            <td><?php echo $data['Langd']??''; ?></td>
            <td><?php echo $data['Rost']??''; ?></td>
            <td><input type="submit" value="Låna"></td>
          </tr>

        <?php }}?>
        </tbody>
        </table>
      </div>
    </div>
    </div>
  </div>

  <!-- FILM -->  

  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="table-responsive">
          <table class="table table-bordered">
          <thead>
            <tr>
            <th>Titel</th>
            <th>Regissör</th>
            <th>Genre</th>
            <th>Längd (i sek.)</th>
          </thead>
        <tbody>
      <?php
          if(is_array($fetchDataFilm)){      
          $sn=1;
          foreach($fetchDataFilm as $data){
        ?>
          <tr>
            <td><?php echo $data['Titel']??''; ?></td>
            <td><?php echo $data['Regissor']??''; ?></td>
            <td><?php echo $data['Genre']??''; ?></td>
            <td><?php echo $data['Langd']??''; ?></td>
            <td><input type="submit" value="Låna"></td>
          </tr>

        <?php }}?>
        </tbody>
        </table>
      </div>
    </div>
    </div>
  </div>


</body>
</html>

