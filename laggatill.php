<?php

  require "conn.php";

  if (isset($_POST['Person'])) {
    $namn = $_POST["namn"];
    $passw = $_POST["passw"];
    $admin= isset($_POST['admin']) ? 1 : 0; 

    $sqlPerson = "INSERT INTO person (Namn, Password, Admin) VALUES ('$namn', '$passw',$admin)"; 
  
    if ($conn->query($sqlPerson) == TRUE) {
      echo "DET FUNKA!!!!";
    } else {
      echo "DU DE BLEV FEL!" . $sqlPerson . "<br>" . $conn->error;
    }
}


  if (isset($_POST['Bok'])) {
      $Titel = $_POST["Titel"];
      $forf = $_POST["forf"];
      $ISBN = $_POST["ISBN"];
      $genre = $_POST["genre"];
      $sidor= $_POST["sidor"];
      $typ = $_POST["typ"];
      $ref = isset($_POST['ref']) ? 1 : 0; 

      $sqlBok = "INSERT INTO bok (Titel, Forfattare, ISBN, Genre, Antalsidor, Typ, Referens) VALUES ('$Titel','$forf', $ISBN, '$genre', $sidor, '$typ', '$ref')"; 

      if ($conn->query($sqlBok) == TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sqlBok . "<br>" . $conn->error;
      }
  }

  if (isset($_POST['ljud'])) {
      $Titel = $_POST["titel"];
      $forf = $_POST["forf"];
      $langd = $_POST["langd"];
      $genre = $_POST["genre"];
      $rost = $_POST["rost"];
      
      $sqlLjud = "INSERT INTO ljud (Titel, Forfattare, Langd, Genre, Rost) VALUES ('$Titel','$forf', $langd, '$genre', '$rost')"; 
      
      if ($conn->query($sqlLjud) == TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sqlLjud . "<br>" . $conn->error;
      }
  }

  if (isset($_POST['Film'])) {
      $Titel = $_POST["titel"];
      $Regi = $_POST["regi"];
      $Langd = $_POST["langd"];
      $Genre = $_POST["genre"];

      $sqlFilm = "INSERT INTO Film (Titel, Regissor, Langd, Genre) VALUES ('$Titel', '$Regi', $Langd, '$Genre')"; 
    
      if ($conn->query($sqlFilm) == TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sqlFilm . "<br>" . $conn->error;
      }
  }
?>




