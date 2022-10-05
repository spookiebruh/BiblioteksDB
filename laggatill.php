<?php

  require "conn.php";

  if (isset($_POST['Bok'])) {
      $Titel = $_POST["Titel"];
      $forf = $_POST["forf"];
      $ISBN = $_POST["ISBN"];
      $genre = $_POST["genre"];
      $sidor= $_POST["sidor"];
      $pid = $_POST["pid"];
      $ref = $_POST["ref"];

      $sql = "INSERT INTO bok (Titel, Forfattare, ISBN, Genre, `Antal sidor`, PID, Referens) VALUES ('$Titel','$forf', $ISBN, '$genre', $sidor, $pid, $ref);"; 

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  if (isset($_POST['ljud'])) {
      $Titel2 = $_POST["titel2"];
      $forf2 = $_POST["forf2"];
      $langd = $_POST["langd"];
      $genre2 = $_POST["genre2"];
      $rost = $_POST["rost"];
      $pid2 = $_POST["pid2"];
      $sql = "INSERT INTO ljud (Titel, Forfattare, Langd, Genre, Rost, PID) VALUES ('$Titel2','$forf2', $langd, '$genre2', '$rost', $pid2)"; 
      
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  if (isset($_POST['Film'])) {
      $Titel3 = $_POST["titel3"];
      $Regi = $_POST["regi"];
      $Langd = $_POST["langd2"];
      $Genre3 = $_POST["genre3"];
      $pid3 = $_POST["pid3"];

      $sql = "INSERT INTO Film (Titel, Regissor, Langd, Genre, PID) VALUES ('$Titel3', '$Regi', $Langd, '$Genre3', $pid3)"; 
    
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }
?>




