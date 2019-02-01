<?php  
session_start();  
  
if(!$_SESSION['username'])  
{  
  
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
}  

$conn = mysqli_connect("localhost", "root", "", "db");
	    if (!$conn) {
	        die("Error connecting to database: " . mysqli_connect_error());
	    }
require_once('config.php') ;	
$userid=$_SESSION["userid"];

?> 
<html>  
<head>  
  
    <title>  
        History  
    </title>  
</head>  
  
<body>  
<h1>Welcome to history</h1><br> 
Hello  
<?php  
echo $_SESSION['username'];  
?>  
<br> Your User Id is
  <?php  
echo $_SESSION['userid'];  
?>  
  <br><br>
<?php  
    $sql2="select water,calories,land from restaurant WHERE res_id= '$userid'";    
    $result2 = mysqli_query ( $conn , $sql2 );

 if ( mysqli_num_rows( $result2 ) > 0 ){
		     
        $data=mysqli_fetch_assoc($result2);   
                 
    	//data has water,calories,land
    	echo 'Total water is ', $data["water"] .PHP_EOL;
    	echo "<br>".'Total Calories are ', $data["calories"],PHP_EOL;
    	echo '<br>Total land is ', $data["land"],PHP_EOL;
    	 
            
    }else

    { echo " First Time user ";
     
    }

?>  
<br><br><br>

 <?php
    //print orders

    $sql="select a.restaurant_id,b.foodname, a.water , a.calories , a.land , a.dateins from orderdata a join foodmaster b on a.food_id=b.food_id where a.user_id='$userid' order by a.dateins DESC";
    $result1 = mysqli_query ( $conn , $sql );
    if ( mysqli_num_rows( $result1 ) > 0 ){
             
        // $data=mysqli_fetch_assoc($result1);   
                 
        echo "<table><tr><th>Restaurnat id</th><th>Food Name</th><th>Water</th><th>Calories</th><th>Land</th><th>Date</th></tr>";


         while($row =mysqli_fetch_assoc($result1)) {
            echo "<tr><td>" . $row["restaurant_id"]. "</td><td>" . $row["foodname"]. "</td><td>" . $row["water"]. "</td><td>" . $row["calories"].  "</td><td>" . $row["land"]. "</td><td>" . $row["dateins"]."</td></tr>";
    }
    echo "</table>";
        // while($row = mysql_fetch_array($result)) {
        //      echo print_r($row); 
        // }
        
         
            
    }else

    { echo " First Time user ";
     
    }
    ?>        





<h2><a href="logout.php">Logout here</a> </h2>  
  
  
</body>  
  
</html>  