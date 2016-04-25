<html>
    <head>
    <?php include 'navbar.php';
        include 'flipkart.php';
        include 'snapdeal.php';

        ?>
        <style>
            #flipkartImage{
                height: 220px;
                width: 350px;
            }
            #card{
                padding: 20px;
                margin: 20px;
            }
        </style>
    </head>
    <body>
        <?php
             $servername = "localhost";
                $username = "root";
                $password = null;
                $db = "Shopping";
                $query = $_GET['searchkey'];
                $conn = new mysqli($servername, $username, $password,$db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }else{
                //    echo "Connected";
                //    echo "<br>";
                }
                $sql = "SELECT id, flipkartId, snapdealId, Name FROM Product WHERE Name LIKE ? OR Category LIKE ?" ;
                $stmt = $conn->prepare($sql);
                $searchQuery  = '%'.$query.'%';
                $stmt->bind_param('s', $searchQuery);
                $stmt->bind_result($id, $flipkartId, $snapdealId,$name);
                $stmt->execute();
        
                while($stmt->fetch()) {
                    $flipkartobj  = getFlipkartData($flipkartId);
                    $snapdealObject  = getSnapdealData($snapdealId);
                    $card = '
                        <div  class="maindiv center-block text-center" class="container">
                            <div id="card" class="row">
                                <div class="col-md-5">
                                    <img id="flipkartImage" src=" ' . getFImageUrl($flipkartobj) . '" alt="Flipkart Image" class="img-responsive  center-block"> 
                                </div>
                            <div class="col-md-7">
                                <a href = "./view.php?id='. $id .'">
                                    <h3>'. getFTitle($flipkartobj).'</h4>
                                </a>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Flipkart</h4>
                                        <h4>Maximum Retail Price : '. getFMaximumRetailPrice($flipkartobj).' </h4>
                                        <h4>Selling Price : '.  getFSellingPrice($flipkartobj).'</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Snapdeal</h4>
                                        <h4>Maximum Retail Price : ' .getMaximumRetailPrice($snapdealObject).' </h4>
                                        <h4>Selling Price : '. getSellingPrice($snapdealObject).' </h4>
                                    </div>
                            </div>  
                        </div>
                    </div>';
                    
                    echo $card;
               }
                $stmt->close();
                $conn->close();
        ?>
        <?php include 'footer.php'?>
    </body>
</html>