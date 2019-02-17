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
            padding: 0.7em ;
            text-align: center;
        }

        div.container1 a
        {
            color: #FFF;
            text-decoration: none;
            font: 16px Raleway;
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
            opacity: 0.7;
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
            height: 1px;
            width: 100%;
        }

        h1{
          font-size: 30px;
          color: #fff;
          text-transform: uppercase;
          font-weight: 300;
          text-align: center;
          margin-bottom: 15px;
        }
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
        table{
          width:100%;
          table-layout: fixed;
        }
        .tbl-header{
          background-color: light yellow;
         }
        .tbl-content{
          height:300px;
          overflow-x:auto;
          margin-top: 0px;
          border: 1px solid rgba(0,0,0,0.9);
        }
        th{
          padding: 20px 15px;
          text-align: left;
          font-weight: 500;
          font-size: 12px;
          color: #fff;
          text-transform: uppercase;
        }
        td{
          padding: 15px;
          text-align: left;
          vertical-align:middle;
          font-weight: 400;
          font-size: 15px;
          color: black;
          border-bottom: solid 1px rgba(255,255,255,0.1);
        }


        /* demo styles */

        
        body{
          background-image: linear-gradient(to right top, #5e2e49, #663c5f, #6b4c74, #6d5c8a, #6d6d9e, #6a7dae, #668cbb, #649cc6, #68adcd, #73bed2, #85cdd5, #9bdcd8);
          font-family: 'Roboto', sans-serif;
        }
        section{
          margin: 50px;
        }


        /* follow me template */
        .made-with-love {
          margin-top: 40px;
          padding: 10px;
          clear: left;
          text-align: center;
          font-size: 10px;
          font-family: arial;
          color: #fff;
        }
        .made-with-love i {
          font-style: normal;
          color: #F50057;
          font-size: 14px;
          position: relative;
          top: 2px;
        }
        .made-with-love a {
          color: #fff;
          text-decoration: none;
        }
        .made-with-love a:hover {
          text-decoration: underline;
        }


        /* for custom scrollbar for webkit browser*/

        ::-webkit-scrollbar {
            width: 6px;
        } 
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
        } 
        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
        }
    </style>
    <title>  
        History  
    </title>  
    <div class="container1 indigo borderYtoX">
        <a href="home.php">Home</a>
        <a href="user_history.php">History</a>     
        <a href="logout.php">Logout </a> 

    </div>   
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
        echo '<div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr><th>Restaurnat id</th><th>Food Name</th><th>Water</th><th>Calories</th><th>Land</th><th>Date</th></tr>
      </thead>
    </table>
  </div>';
        echo '<div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0"><tbody>';
        $data1=[];
        $data2=[];
         while($row =mysqli_fetch_assoc($result1)) {
            $time=strtotime($row["dateins"])*1000;
            $water=intval($row["water"]);
            $calories=intval($row["calories"]);
            $data1[] = [$time, $water];
            $data2[] = [$time, $calories];
            // $data1.push([$time,$val]);
            echo "<tr><td>" . $row["restaurant_id"]. "</td><td>" . $row["foodname"]. "</td><td>" . $row["water"]. "</td><td>" . $row["calories"].  "</td><td>" . $row["land"]. "</td><td>" . $row["dateins"]."</td></tr>";
          }
    echo "</tbody></table></div>";
        // while($row = mysql_fetch_array($result)) {
        //      echo print_r($row); 
        // }
        
         
            
    }else

    { echo " First Time user ";
     
    }
    ?>        



<?php 
echo json_encode($data1, JSON_NUMERIC_CHECK);?>


<!-- <h2><a href="logout.php">Logout here</a> </h2>   -->
  <div id="container3" style="height: 400px; min-width: 310px"></div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
<script type="text/javascript">
    
var chart = new Highcharts.stockChart('container3', {


    // rangeSelector: {
    //   selected: 3
    // },

    title: {
      text: 'Water Footprint'
    },
    tooltip: {
    backgroundColor: '#FCFFC5',
    borderColor: 'black',
    borderRadius: 10,
    borderWidth: 3,

            valueDecimals: 2,
            split: true
},
 
    series: [{
      name: 'Water',
      data: <?php echo json_encode($data1, JSON_NUMERIC_CHECK);?>
      
    },{
      name: 'Calories',
      data: <?php echo json_encode($data2, JSON_NUMERIC_CHECK);?>
      
    }]
  });
// $.getJSON('data.json', function (data) {
//   // Create the chart
//   Highcharts.stockChart('container3', {


//     rangeSelector: {
//       selected: 1
//     },

//     title: {
//       text: 'AAPL Stock Price'
//     },

//     series: [{
//       name: 'AAPL',
//       data: data,
//       tooltip: {
//         valueDecimals: 2
//       }
//     }]
//   });
// });


</script>
  
</body>  
  
</html>  