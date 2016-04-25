<html>
<?php
	include 'partials.php';
    include 'navbar.php';
?>
   <head>
       <style>
           input[type='text'], input[type='password']{
               padding: 10px;
               margin: 10px;
               width: 300px;
               height: 40px;
               font-size: 20px;
           }
       </style>
   </head>
    <body>
       <div class="container">
        <form  method="post ">
            	<h1>Sign Up</h1>
		<input name="username" type="text" placeholder="User Name"/>
		</br>
		<input name="password" type="password" placeholder="Password"/>
		</br>
		<button class="btn btn-submit" type="submit">Sign Up</button>
    </form>
    </div>
    </body>
    <?php
        include 'footer.php'
    ?>
</html>


<?php
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Shopping";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
            die("Sorry Connection Failed Try again" . $conn->connect_error);
        }

        $sql = "INSERT INTO user VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', isset($_POST["username"]), isset($_POST["password"]));
        if ($stmt->execute()){
            echo "Congratulations Now You May Login ";
            header( 'Location: sigin.php' );   
        }else{
            echo "<h1>Unuccessful...</h1>";
        }
        $stmt->close();
        $conn->close();
    }
    
?>