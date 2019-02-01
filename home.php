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
        HOMEEEE  
    </title>  
</head>  
  
<body>  
<h1>Welcome</h1><br> 
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
$sql2="select water,calories,land from userdata WHERE userid= '$userid'";    
$result2 = mysqli_query ( $conn , $sql2 );

 if ( mysqli_num_rows( $result2 ) > 0 ){
		     
		        $data=mysqli_fetch_assoc($result2);     // Getting password from db         
		        {         
	            	//data has water,calories,land
	            	echo 'Total water is ', $data["water"] .PHP_EOL;
	            	echo "<br>".'Total Calories are ', $data["calories"],PHP_EOL;
	            	echo '<br>Total land is ', $data["land"],PHP_EOL;
	            	 
		        }         
		    }else
     
		    { echo " First Time user ";
		     
		    }

?>  
 <table align="center" bgcolor="#CCCCCC" border="0" cellpadding="0"
    cellspacing="1" width="330">
        <tr>
            <td>
                <form method="post" name="">
                    <table bgcolor="#FFFFFF" border="0" cellpadding="3"
                    cellspacing="1" width="100%">
                        <tr>
                            <td align="center" colspan="3"><strong>Add Item</strong></td>
                        </tr>
                        <tr>
                            <td width="188">Restaurant Id</td>
                            <td width="6">:</td>
                            <td width="294">
                            	<select name="resid" id="resid">
								  <option value="1">Hide Out Cafe</option>
								  <option value="2">Nazeer</option>
								  <option value="3">Curry House</option>
								  <option value="4">Shruti</option>
								</select>

                            <!-- 	<input id="resid" name= "resid" type="text"> -->
                            </td>
                        </tr>

                        <tr>
                            <td>Food id</td>
                            <td>:</td>
                            <td>
                            	<select name="foodname" id="foodname" type="text">
								  <option value="Butter Chicken">Butter Chicken</option>
								  <option value="Pizza">Pizza</option>
								  <option value="chicken">chicken</option>
								  <option value="Rice">Rice</option>
								</select>




                        <!--     	<input id="foodid" name="foodid" type=
                            "text"> -->
                        </td>
                        </tr>
                        <tr>
                            <td>percent</td>
                            <td>:</td>
                            <td><input id="percent" name="percent" type=
                            "text"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input name="submit" type="submit" value=
                            "Add"> <input name="reset" type="reset" value=
                            "reset"></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>



 <?php
    if (isset($_POST['submit']))
        {     
            // session_start();
		    	    
		    $resid=$_POST['resid'];
		    // $foodid=$_POST['foodid'];
		    $percent=$_POST['percent'];
            $foodname=$_POST['foodname'];
		    
            //getting food id from foodname 
            //todo populate foodname based on restaurant selected
            $fid="select food_id from foodmaster where foodname='$foodname' and restaurant_id='$resid' ";    
            $res=mysqli_query ( $conn , $fid );
            //check correct restaurant and food id
            if ( mysqli_num_rows( $res ) > 0 ){

                $data1=mysqli_fetch_assoc($res);
                $foodid=$data1['food_id'];
    		    $sql="select water,calories,land from foodmaster where food_id='$foodid' and restaurant_id='$resid' ";    
    		    $result = mysqli_query ( $conn , $sql );   // Executes sql code
    		     



    		    if ( mysqli_num_rows( $result ) > 0 ){
    		     
    		        $data=mysqli_fetch_assoc($result);     // Getting password from db         
    		                 
    	            	//data has water,calories,land
    	            	$water=$percent*$data["water"]/100;
    	            	$calories=$percent*$data["calories"]/100;
    	            	$land=$percent*$data["land"]/100;
    	            	// echo $water +"   calories= "+ $calories +"  land= "+$land;
    	            	$sql1="update userdata set water= water + '$water',calories=calories+'$calories', land=land+'$land' WHERE userid= '$userid'";   
                		$sql3="insert into `orderdata` (`orderid`, `user_id`, `restaurant_id`, `food_id`, `percent`, `water`, `calories`, `land`) VALUES (NULL, '$userid', '$resid', '$foodid', '$percent', '$water', '$calories', '$land')";
                        $sql4="update restaurant set water= water + '$water',calories=calories+'$calories', land=land+'$land' WHERE res_id= '$resid'";
                		$result1 = mysqli_query ( $conn , $sql1 );   
                		$result1 = mysqli_query ( $conn , $sql3 );   
                        $result2 = mysqli_query ( $conn , $sql4 );   
    		            header('Location: home.php');          
    		               
    		    }else{ 
                    echo " Incorrect data ";
    		     
    		    }
        }else{
            echo "Incorrect Restaurant and food match";
        }
   
     
    }
     
    ?>        





<h1><a href="logout.php">Logout here</a> </h1>  
  
  
</body>  
  
</html>  