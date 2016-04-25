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
        <h1>Sign In</h1>
		<input name="username" type="text" placeholder="User Name"/>		</br>
		<input name="password" type="password" placeholder="Password"/>		</br>
        </br>
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

        $username = $_POST["username"];
        $pwd = $_POST["password"];
        if($username != " " && $pwd != " "){
            $selectquery = "SELECT * FROM  user  WHERE Name = ? AND Password = ?";

            $selectstmt = $conn->prepare($selectquery);
            $selectstmt->bind_param('ss', $username,  $pwd);

            $selectstmt->execute();
            $selectstmt->bind_result($id, $name);
            $selectstmt->fetch();

            setcookie('id', $id, time()+60*60);
            setcookie('username', $name, time()+60*60);
        }
        $selectstmt->close();
        $conn->close();
    } 
?>


