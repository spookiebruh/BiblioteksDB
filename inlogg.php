<?php
session_start();
require_once('conn.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inlogg.css">
    <title>Inlogg</title>
</head>
<body>
    <?php
        $Name = "";
        $NameErr = false;
        $Password = "";
        $PasswordErr = false;

        if(isset($_POST['Namn']) && isset($_POST['Password'])){

            
            
            $_SESSION['anv'] = $_POST['Namn'];
            $_SESSION['pass'] = $_POST['Password'];

        require_once('conn.php');
        
        $anv = $_POST['Namn'];
        $pass = $_POST['Password'];
        
        $sql = "SELECT * FROM person WHERE Namn='$anv' and Password='$pass'";
        $result = $conn->query($sql);
        $print = mysqli_fetch_all($result, MYSQLI_ASSOC);
        print_r($print);


            $anv = $_SESSION['anv'];
            $pass = $_SESSION['pass'];
            
            $sql = "SELECT * FROM person WHERE Namn='$anv' and Password='$pass'";
            $result = $conn->query($sql);
            $print = mysqli_fetch_all($result, MYSQLI_ASSOC);
            print_r($print);

            // Initiera variabler och ställ in på tomma strängar
            $NameErr = $PasswordErr = "";
            
            if ($result->num_rows!=1) {
                // header("location: inlogg.php");
            }
            else{
                
                $sql = "SELECT * FROM person WHERE Namn=? and Password=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss",$anv, $pass);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $id = $row['Admin'];
                
                $_POST['id'] = $id;
                print_r($id);
                if (intval($id) == 1){
                    header("location: admin.php");
                }
                else{
                    header("location: anvandare.php");
                }

            }
        }
    ?>
    <div class="block2">
    <div class="rubrik"><h2>Bibliotek</h2></div>
        <div class="block">
            <form method="post">
                <div class="text"><p2>Logga in:<p2></div>
                <input required type="text" name="Namn" placeholder="Skriv in ett användarnamn" value="<?php echo $Name; ?>"><span class="error"> <?php echo $NameErr; ?></span><br><br>
                <input required type="password" name="Password" placeholder="Skriv in ett lösenord" value="<?php echo $Password; ?>"><span class="error"> <?php echo $PasswordErr; ?></span><br><br>
                <input type="submit" value="Skicka">
                <input type="button" value="Glömt lösenord?">
                <input type="button" value="Skapa nytt konto">
            </form> 
        </div>
    </div>
</body>
</html>