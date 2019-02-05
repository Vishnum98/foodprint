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
$resid=$_SESSION["userid"];

?> 
<html>  
<head>  
  
    <style type="text/css">
      @import 'https://fonts.googleapis.com/css?family=Raleway';

        html, body
        {
        margin: 0px;
        }


        div.container1
        {
            font-family: Raleway;
            margin: 0 auto;
            padding: 1.4em ;
            text-align: center;
        }

        div.container1 a
        {
            color: #FFF;
            text-decoration: none;
            font: 20px Raleway;
            margin: 0px 10px;
            padding: 10px 10px;
            position: relative;
            z-index: 0;
            cursor: pointer;
        }

        .indigo
        {
            background: #3f51b5;
        }


        /* Border from Y to X  */
        div.borderYtoX a:before, div.borderYtoX a:after
        {
            position: absolute;
            opacity: 0.5;
            height: 100%;
            width: 2px;
            content: '';
            background: #FFF;
            transition: all 0.3s;
        }

        div.borderYtoX a:before
        {
            left: 0px;
            top: 0px;
        }

        div.borderYtoX a:after
        {
            right: 0px;
            bottom: 0px;
        }

        div.borderYtoX a:hover:before, div.borderYtoX a:hover:after
        {
            opacity: 1;
            height: 2px;
            width: 100%;
        }</style>
    <title>  
    <?php  echo $_SESSION['username'];  ?>    
    </title>  
    <div class="container1 indigo borderYtoX">
        <a href="res_home.php">Home</a>
        <a href="res_history.php">History</a>     
        <a href="logout.php">Logout </a> 

    </div> 
</head>  
  
<body>  
<h1>Welcome</h1><br> 
Hello  
<?php  echo $_SESSION['username'];  ?>  
<br> Your Restaurant Id is
<?php  echo $_SESSION['userid'];  ?>  
  <br><br>
<?php  
$sql2="select water,calories,land from restaurant WHERE res_id= '$resid'";    
$result2 = mysqli_query ( $conn , $sql2 );

 if ( mysqli_num_rows( $result2 ) > 0 ){
		     
		        $data=mysqli_fetch_assoc($result2);     
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
                            <td>mobile</td>
                            <td>:</td>
                            <td><input id="mobile" name="mobile" type=
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
		    	    
		    // $resid=$_SESSION['userid'];
		    // $foodid=$_POST['foodid'];
		    $percent=$_POST['percent'];
            $foodname=$_POST['foodname'];
		    $mobile=$_POST['mobile'];
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
    		     
    		        $data=mysqli_fetch_assoc($result);           
    		                 
	            	//data has water,calories,land
	            	$water=$percent*$data["water"]/100;
	            	$calories=$percent*$data["calories"]/100;
	            	$land=$percent*$data["land"]/100;
	            	// echo $water +"   calories= "+ $calories +"  land= "+$land;
                    $sql5="select userid from userdata where mobile='$mobile'";
                    // echo "here is the query".$sql5;
                    $result3=mysqli_query($conn,$sql5);
                    if ( mysqli_num_rows( $result3) > 0 ){

                        $data1=mysqli_fetch_assoc($result3);
                        $userid=$data1['userid'];
    	            	$sql1="update userdata set water= water + '$water',calories=calories+'$calories', land=land+'$land' WHERE userid= '$userid'";   
                		$sql3="insert into `orderdata` (`orderid`, `user_id`, `restaurant_id`, `food_id`, `percent`, `water`, `calories`, `land`) VALUES (NULL, '$userid', '$resid', '$foodid', '$percent', '$water', '$calories', '$land')";
                        $sql4="update restaurant set water= water + '$water',calories=calories+'$calories', land=land+'$land' WHERE res_id= '$resid'";
                		$result1 = mysqli_query ( $conn , $sql1 );   
                		$result1 = mysqli_query ( $conn , $sql3 );   
                        $result2 = mysqli_query ( $conn , $sql4 );   
    		            header('Location: res_home.php'); }
                    else{
                        echo "Incorrect mobile";
                    }         
    		               
    		    }else{ 
                    echo " Incorrect data ";
    		     
    		    }
        }else{
            echo "Incorrect Restaurant and food match";
        }
   
     
    }
     
    ?>        





<!-- <h1><a href="logout.php">Logout here</a> </h1>  
<h2><a href="user_history.php">History</a> </h2>   -->
  
  
</body>  
  
</html>  