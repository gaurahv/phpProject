<html>
   <head>
       <style>
           input{
               width: 300px;
               height: 50px;
                margin: 20px;
            }
           button{
               position: relative;
               left: 10%;
               height: 50px;
               width: 200px;
           }
       </style>
   </head>
    <body>
        <form  method="get">
            Flipkart ID: <input type="text" name="fid"> <br>
            Snapdeal ID: <input type="text" name="sid"> <br>
            Title: <input type="text" name="title"> 
            Category: <input type="text" name="category"> <br> <br> <br>
            <button type="submit">Submit</button>
        </form>        
    </body>
    
    <?php
        if(isset($_GET['fid']) && isset($_GET['sid']) && isset($_GET['title'])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "shopping";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if($conn->connect_error){
                die("Sorry Connection Failed Try again" . $conn->connect_error);
            }

            $sql = "INSERT INTO product (flipkartId,snapdealId,Name,Category) VALUES (?, ?, ?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssss', $_GET['fid'], $_GET['sid'], $_GET['title'], $_GET['category']);
            if ($stmt->execute()){
                echo "Insertion Successfull";
                die();
            }else{
                echo "<h1>Unuccessful...</h1>";
            }
        }
    ?>
</html>
