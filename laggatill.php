<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bibliotek";

// kopplar till databas
$conn = new mysqli($servername, $username, $password, $dbname);
// kollar om den blir fel när du kopplar
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

}

if (isset($_POST['Bok'])) {
    $Titel = $_POST["Titel"];
    $forf = $_POST["forf"];
    $ISBN = $_POST["ISBN"];
    $genre = $_POST["genre"];
    $sidor= $_POST["sidor"];
    
    $ref = $_POST["ref"];

    $sql = "INSERT INTO bok (Titel, Forfattare, ISBN, Genre, `Antalsidor`, Referens) VALUES ('$Titel','$forf', $ISBN, '$genre', $sidor, $ref);"; 

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
   echo $sql;
   if ($conn->query($sql)){
      
   }

 }

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
