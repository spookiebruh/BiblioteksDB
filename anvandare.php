<?php
  require_once("lana.php");
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
            <th>Titel</th>
            <th>Författare</th>
            <th>Genre</th>
            <th>Antal sidor</th>
          </thead>
        <tbody>
      <?php
          if(is_array($fetchDataBok)){      
          $sn=1;
          foreach($fetchDataBok as $data){
        ?>
          <tr>
            <td><?php echo $data['Titel']??''; ?></td>
            <td><?php echo $data['Forfattare']??''; ?></td>
            <td><?php echo $data['Genre']??''; ?></td>
            <td><?php echo $data['Antalsidor']??''; ?></td>
            <td><input type="submit" value="Låna"></td>
          </tr>
    
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

