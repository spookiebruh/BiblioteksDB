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
<body>
    
    <div class="box">
        <form method="post" action="laggatill.php"> 
                <p>Lägg Till Person</p>
                <input type="hidden" name="Person">
                <input type="text" class="person" name="namn" max="100" placeholder="Namn" required>
                <input type="text" class="person" name="passw"  placeholder="Lösenord" required>
                <label class="control"><input type="checkbox" class="person" name="admin" placeholder="Admin eller inte?"><p>Admin</p></label>
                <input type="submit">
        </form> 
    </div>
    <div class="box">
        <form method="post" action="laggatill.php"> 
                <p>Lägg Till Bok</p>
                <input type="hidden" name="Bok">
                <input type="text" class="bok" name="Titel" max="100" placeholder="Lägga till bok?" required>
                <input type="text" class="bok" name="forf"  placeholder="Författare" required>
                <input type="number" class="bok" name="ISBN"  placeholder="ISBN-Nummer" required>
                <input type="text" class="bok" name="genre"  placeholder="Genre" required>
                <input type="number" class="bok" name="sidor"  placeholder="Antal sidor" required>
                <input type="text" class="bok" name="typ"  placeholder="Typ" required>
                <label class="control"><input type="checkbox" id="class" name="ref" Min="0" Max="1" placeholder="Referens" required><p>Referens</p></label>
                <input type="submit">
            </form>
        </div> 
        <div class="box"> 
            <form method="post" action="laggatill.php">  
                <p>Lägg Till Ljudbok</p>
                <input type="hidden" name="ljud">
                <input type="text" class="Ljud" name="titel" max="100" placeholder="Lägga till ljudbok?" required>
                <input type="text" class="Ljud" name="forf" max="100" placeholder="Författare" required>
                <input type="number" class="Ljud" name="langd" max="100" placeholder="Längd" required>
                <input type="text" class="Ljud" name="genre" max="100" placeholder="Genre" required>
                <input type="text" class="Ljud" name="rost" max="100" placeholder="Röst" required>
                <input type="submit">
            </form> 
        </div> 
        <div class="box">
            <form method="post" action="laggatill.php">  
                <p>Lägg Till Film</p>
                <input type="hidden" name="Film">
                <input type="text" class="Film" name="titel" placeholder="Lägga till film?" required>
                <input type="text" class="Film" name="regi" placeholder="Regissör" required>
                <input type="number" class="Film" name="langd" placeholder="Längd" required>
                <input type="text" class="Film" name="genre" placeholder="Genre" required>
                <input type="submit">
            </form>
        </div>
        
        
        
</body>
</html>