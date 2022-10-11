<link rel="stylesheet" href="laggatill.css">
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bibliotek";

  require "conn.php";


    echo"<div class='text'>";
      echo"<p>";
      if (isset($_POST['Person'])) {
          $namn = $_POST["namn"];
          $passw = $_POST["passw"];
          $admin= isset($_POST['admin']); 

          $sqlPerson = "INSERT INTO person (Namn, Password, Admin) VALUES ('$namn', '$passw',$admin)"; 
        
          if ($conn->query($sqlPerson) == TRUE) {
            echo "Du har lagt till en ";
          } else {
            echo "DU DE BLEV FEL!" . $sqlPerson . "<br>" . $conn->error;
          }
      echo"</p>";
    echo"</div>";
  echo"<div class='usertext'>";
    if($admin == 1) {
      echo"Admin"; 
    } else {
      echo"Användare";
    }
  echo"</div>";

  ?>
  <script>
  setTimeout(() => {
    location.replace("admin.php")
  }, "1500")
  </script>
  <?php

}


if (isset($_POST['Bok'])) {
    $Titel = $_POST["Titel"];
    $forf = $_POST["forf"];
    $ISBN = $_POST["ISBN"];
    $genre = $_POST["genre"];
    $sidor= $_POST["sidor"];

    
    $ref = $_POST["ref"];

    $sql = "INSERT INTO bok (Titel, Forfattare, ISBN, Genre, `Antalsidor`, Referens) VALUES ('$Titel','$forf', $ISBN, '$genre', $sidor, $ref);"; 

    $typ = $_POST["typ"];
    $ref = isset($_POST['ref']) ? 1 : 0; 

    $sqlBok = "INSERT INTO bok (Titel, Forfattare, ISBN, Genre, Antalsidor, Typ, Referens) VALUES ('$Titel','$forf', $ISBN, '$genre', $sidor, '$typ', '$ref')"; 


    if ($conn->query($sqlBok) == TRUE) {
      echo "Du har lagt till en bok";
    } else {
      echo "Det blev något fel i: " . $sqlBok . "<br>" . $conn->error;
    }
}

if (isset($_POST['ljud'])) {
    $Titel = $_POST["titel"];
    $forf = $_POST["forf"];
    $langd = $_POST["langd"];
    $genre = $_POST["genre"];
    $rost = $_POST["rost"];
    
    $sqlLjud = "INSERT INTO ljud (Titel, Forfattare, Langd, Genre, Rost) VALUES ('$Titel','$forf', '$langd', '$genre', '$rost')"; 
    
    if ($conn->query($sqlLjud) == TRUE) {
      echo "Du har lagt till en Ljudbok";
    } else {
      echo "Det blev något fel i: " . $sqlLjud . "<br>" . $conn->error;
    }
}

if (isset($_POST['Film'])) {
    $Titel = $_POST["titel"];
    $Regi = $_POST["regi"];
    $Langd = $_POST["langd"];
    $Genre = $_POST["genre"];

    
    $sqlFilm = "INSERT INTO Film (Titel, Regissor, Langd, Genre) VALUES ('$Titel', '$Regi', '$Langd', '$Genre')"; 
  
    if ($conn->query($sqlFilm) == TRUE) {
      echo "Du har lagt till en Ljudbok";
    } else {
      echo "Det blev något fel i: " . $sqlFilm . "<br>" . $conn->error;
    }
}

?>





if (isset($_POST['Film'])) {
  $Titel = $_POST["Titel"];
  $forf = $_POST["Regi"];
  $ISBN = $_POST["ISBN"];
  $genre = $_POST["genre"];
  $sidor= $_POST["sidor"];
  $pid = $_POST["pid"];

  $sql = "INSERT INTO Bok (`Titel`, `Forfattare`, `ISBN`, `Genre`, `Antal sidor`, `PID`, `Referens`) VALUES ('$Titel','$forf', $ISBN, '$genre', $sidor, $pid, $ref)"; 
  echo $sql;
  if ($conn->query($sql)){   
 
}
}
$conn->close();
?>

