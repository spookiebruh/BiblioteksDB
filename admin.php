<?php 
    require_once("conn.php")
?>

<link rel="stylesheet" href="biblotek.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Sida</title>
</head>
<div class="rubrik"><h2>Admin Sida</h2><br></div>

    <body>
     
        <div class="box">
            <form method="post" action="laggatill.php"> 
                    <p>Lägg Till Person</p><br>
                    <input type="hidden" name="Person">
                    <input type="text" class="person" name="namn" max="100" placeholder="Namn" required>
                    <input type="password" class="person" name="passw"  placeholder="Lösenord" required>
                    <label class="check"><input type="checkbox" class="person" name="admin" placeholder="Admin eller inte?"><p>Admin</p></label>
                    <input type="submit">
            </form> 
       
            <form method="post" action="laggatill.php"> 
                <p>Lägg Till Bok</p>
                <input type="hidden" name="Bok">
                <input type="text" class="bok" name="Titel" max="100" placeholder="Bok titel" required>
                <input type="text" class="bok" name="forf"  placeholder="Författare" required>
                <input type="number" class="bok" name="ISBN"  placeholder="ISBN-Nummer" required>
                <input type="text" class="bok" name="genre"  placeholder="Genre" required>
                <input type="number" class="bok" name="sidor"  placeholder="Antal sidor" required>
                <input type="text" class="bok" name="typ"  placeholder="Typ" required>
                <label class="check"><input type="checkbox" id="class" name="ref" Min="0" Max="1" placeholder="Referens" required><p>Referens</p></label>
                <input type="submit">
            </form>
        
            <form method="post" action="laggatill.php">  
                <p>Lägg Till Ljudbok</p>
                <input type="hidden" name="ljud">
                <input type="text" class="Ljud" name="titel" max="100" placeholder="Ljudbok titel?" required>
                <input type="text" class="Ljud" name="forf" max="100" placeholder="Författare" required>
                <input type="time" class="Ljud" name="langd" max="100" placeholder="Längd" required>
                <input type="text" class="Ljud" name="genre" max="100" placeholder="Genre" required>
                <input type="text" class="Ljud" name="rost" max="100" placeholder="Röst" required>
                <input type="submit">
            </form> 
    
            <form method="post" action="laggatill.php">  
                <p>Lägg Till Film</p><br>
                <input type="hidden" name="Film">
                <input type="text" class="Film" name="titel" placeholder="Film titel" required>
                <input type="text" class="Film" name="regi" placeholder="Regissör" required>
                <input type="time" class="Film" name="langd" placeholder="Längd" required>
                <input type="text" class="Film" name="genre" placeholder="Genre" required>
                <input type="submit">
            </form>
        </div>
    </body>
        <div class="container">
            <div class="print">
                <h2>Personers inlogg</h2>
                <?php
                    // Person print

                    $sql = "SELECT Namn, Password, Admin FROM person";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) {
                            echo "Namn: " . $row["Namn"]. " - Lösenord: " . $row["Password"]. " - Admin: " . $row["Admin"]. "<br>";
                        }
                    } else {
                    echo "0 results";
                    }
                ?>

                <h2>Bok information</h2>
                <?php
                    // Bok print

                    $sql = "SELECT Titel, Forfattare, Antalsidor, Genre, Typ, ISBN FROM bok";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) {
                            echo "Titel: " . $row["Titel"]. " - Författare: " . $row["Forfattare"]. "<br>Antal sidor: " . $row["Antalsidor"]. " - Genre: " . $row["Genre"]. " - Typ av bok: " . $row["Typ"]. " - ISBN: " . $row["ISBN"]. "<br><br>";
                        }
                    } else {
                    echo "0 results";
                    }
                ?>
            </div>
            <div class="print">
                <h2>Ljudboks information</h2>
                <?php
                    // Ljudbok print

                    $sql = "SELECT Titel, Forfattare, Langd, Genre, Rost FROM ljud";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) {
                            echo "Titel: " . $row["Titel"]. " - Författare: " . $row["Forfattare"]. " - Längd: " . $row["Langd"]. " - Genre: " . $row["Genre"]. "- Röst: " . $row["Rost"]. "<br>";
                        }
                    } else {
                    echo "0 results";
                    }
                ?>
            
                <h2>Filmer information</h2>
                <?php
                    // Film print

                    $sql = "SELECT Titel, Regissor, Langd, Genre FROM film";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) {
                            echo "Titel: " . $row["Titel"]. " - Regissör: " . $row["Regissor"]. " - Längd: " . $row["Langd"].  " - Genre: " . $row["Genre"]."<br>";
                        }
                    } else {
                    echo "0 results";
                    }
                
                ?>
            </div>
        </div>
    
</html>