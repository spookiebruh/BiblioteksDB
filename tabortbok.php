<?php
    require_once("conn.php");

    $db = $conn;
    $tableNameLanelista="lanelista";
    $columnsLanelista= ['bokID'];

    // Fetching lanelista data
    $fetchDataLanelista = fetch_data($db, $tableNameLanelista, $columnsLanelista);

    // Failsafe function
    function fetch_data($db, $tableNameLanelista, $columnsLanelista){
        if(empty($db)){
         $msg = "Database connection error";
        }elseif (empty($columnsLanelista) || !is_array($columnsLanelista)) {
         $msg ="columns Name must be defined in an indexed array";
        }elseif(empty($tableNameLanelista)){
          $msg = "Table Name is empty";
        }else{

        
    
    // Gör om arrayen till en sträng som används i ett prepared statement  
    $columnNameLanelista = implode(", ", $columnsBok);

        



    if(array_key_exists('lamnatbx', $_POST)) {
        lamnatbx();
    }

    function lamnatbx() {
        $BID = $_SESSION["BID"];
              
        $sqlTabortBok = "DELETE FROM lanelista WHERE lanelista.bokID = $BID"; 
    
        }


?>