<link rel="stylesheet" href="biblotek.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sida</title>
</head>
<body>
    <form method="post" action="laggatill.php">  
            <input type="hidden" name="Person">
            <input type="text" id="bok" name="Titel" max="100" placeholder="Namn" required="required">
            <input type="text" id="bok" name="forf"  placeholder="Password" required="required">
            <input type="submit">
    </form> 

    <form method="post" action="laggatill.php">  
            <input type="hidden" name="Bok">
            <input type="text" id="bok" name="Titel" max="100" placeholder="Lägga till bok?" required="required">
            <input type="text" id="bok" name="forf"  placeholder="Författare" required="required">
            <input type="number" id="bok" name="ISBN"  placeholder="ISBN-Nummer" required="required">
            <input type="text" id="bok" name="genre"  placeholder="Genre" required="required">
            <input type="number" id="bok" name="sidor"  placeholder="Antal sidor" required="required">
            <input type="number" id="bok" name="pid"  placeholder="Person ID" required="required">
            <input type="number" id="bok" name="ref" Min="0" Max="1" placeholder="Referens" required="required">
            <input type="submit">
        </form>  
        <form method="post" action="laggatill.php">  
            <input type="hidden" name="ljud">
            <input type="text" id="Film" name="titel2" max="100" placeholder="Titel" required="required">
            <input type="text" id="Film" name="forf2" max="100" placeholder="Författare" required="required">
            <input type="number" id="Film" name="langd" max="100" placeholder="Langd" required="required">
            <input type="text" id="Film" name="genre2" max="100" placeholder="Genre" required="required">
            <input type="text" id="Film" name="rost" max="100" placeholder="Röst" required="required">
            <input type="number" id="Film" name="pid2" max="100" placeholder="Person ID" required="required">
            <input type="submit">
        </form>  
        <form method="post" action="laggatill.php">  
            <input type="hidden" name="Film">
            <input type="text" id="Film" name="titel3" max="100" placeholder="Titel" required="required">
            <input type="text" id="Film" name="regi" max="100" placeholder="Regissör" required="required">
            <input type="number" id="Film" name="langd2" max="100" placeholder="Langd" required="required">
            <input type="text" id="Film" name="genre3" max="100" placeholder="Genre" required="required">
            <input type="number" id="Film" name="pid3" max="100" placeholder="Person ID" required="required">
            <input type="submit">
        </form>
</body>
</html>