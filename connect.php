<?php
    $flipkartId = "";
    $snapdealId = "";

    function connect($id){
        global $flipkartId, $snapdealId;
        $servername = "localhost";
        $username = "root";
        $password = null;
        $db = "Shopping";
        $conn = new mysqli($servername, $username, $password,$db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
        //    echo "Connected";
        //    echo "<br>";
        }
        $sql = "SELECT id, flipkartId, snapdealId, Name FROM Product WHERE id= ?" ;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($id, $flipkartId, $snapdealId,$name);
        $stmt->fetch();
        $stmt->close();
        $conn->close();
    }   
?>