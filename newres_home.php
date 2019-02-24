<?php  
    session_start();  
      
    if(!$_SESSION['username'])  
    {  
      
        header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
    }  

    $conn = mysqli_connect("localhost:3306", "vishnu", "vishnufoodprint123", "foodprint");
          if (!$conn) {
              die("Error connecting to database: " . mysqli_connect_error());
          }
    require_once('config.php') ;  
    $resid=$_SESSION["userid"];
    $resname=$_SESSION['username'];

?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Food Print</title>

    <!-- Bootstrap -->
    <link href="static/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="static/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="static/vendors/star-rating.min.css" rel="stylesheet">
    <!-- NProgress -->
    <!-- <link href="static/vendors/nprogress/nprogress.css" rel="stylesheet"> -->

    <!-- Custom Theme Style -->
    <link href="static/build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
      .form-horizontal .control-label{
        text-align: left!important;
      }
    </style>
  </head>

  <body class="nav-md">
    <?php
                
                $sq="select * from restaurant where res_id='$resid'";
                $ans=mysqli_query($conn,$sq); 
                if ( mysqli_num_rows( $ans ) > 0 ){           
                 while($row3 =mysqli_fetch_assoc($ans)) {                  
                    $userwater=intval($row3["water"]);
                    $usercalories=intval($row3["calories"]);
                    $userland=intval($row3["land"]);
                    $username=($row3["res_name"]);                
                    $foodwaste=intval($row3["weight"]);                    
                    // echo "indianveg perceny".$indian_nveg;
                  }
                }else
                { echo " Userid not found ";     
                }
                //rank code starts
                $query="SELECT  FIND_IN_SET( water, ( SELECT GROUP_CONCAT(DISTINCT water ORDER BY water ASC ) FROM restaurant ) ) AS rank FROM restaurant WHERE res_id='$resid'";

                $res2 = mysqli_query ( $conn , $query );

                if ( mysqli_num_rows( $res2 ) > 0 ){                     
                    $data=mysqli_fetch_assoc($res2);                                      
                    $userrank=$data["rank"];                                                              
                }else{
                     echo " Res not found ";                    
                }

                $sc="select count(*) as count from restaurant";
                $res2 = mysqli_query ( $conn , $sc );

                if ( mysqli_num_rows( $res2 ) > 0 ){                     
                    $data=mysqli_fetch_assoc($res2);                                      
                    $count=$data["count"];                                                              
                }else{
                     echo " Random error ";                    
                }

    ?> 
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="newres_home.php" class="site_title"><i class="fa fa-paw"></i> <span>Food Print</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="static/images/vi.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['username'] ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="newres_home.php"><i class="fa fa-home"></i>Home </a></li>
                  <li><a href="resourcesr.php" ><i class="fa fa-book"></i>Resources</a></li>
                  <li><a href="howr.php"><i class="fa fa-laptop"></i>Support</a></li>                  
                  <li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>                 
                </ul>
              </div>          
            </div>
            <!-- /sidebar menu -->

             <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
             
              <a data-toggle="tooltip" data-placement="top" title="Logout" style="width: 100%" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="static/images/vi.jpg" alt=""><?php echo $_SESSION['username'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="static/images/vi.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="static/images/vi.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="static/images/vi.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="static/images/vi.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->

       <div class="right_col" role="main" style="min-height: 1683px;">
          

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <div class="x_title">
                    <h2>Wastage Trend</h2>    
                    <ul class="nav navbar-right panel_toolbox" style="min-width: 0px;">
                     <li>.</li><li></li>
                      <li><a class=""><i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="It shows individual impact of order on environment."></i></a>
                      </li>                      
                    </ul>  
                    <div class="clearfix"></div>
                  </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                    <canvas id="mybarChart1"></canvas>                  
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <br>
                    <h2>Add Items</h2>
                    <ul class="nav navbar-right panel_toolbox" style="min-width: 0px;">
                     <li>.</li><li></li>
                      <li><a class=""><i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add your order details along with the percent of parcticular dish you wasted.Enter 0 if you didn't waste any."></i></a>
                      </li>                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
              <div class="x_content col-md-12 col-sm-12 col-xs-12" style="padding-left: 1px!important">
                    <br>
                    <form method="post" class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Number</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" style="padding-left: 10px!important">
                          <input type="text" name="number" id="percent" class="form-control" placeholder="Default Input">
                        </div>
                      </div>
                                           

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Food</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" style="padding-left: 10px!important">                          
                          <select name="foodname" id="foodname" class="form-control">
                            
                          </select>
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Percent</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" style="padding-left: 10px!important">
                          <input type="text" name="percent" id="percent" class="form-control" placeholder="Default Input">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button type="submit" name="submit" class="btn btn-success">Submit</button>
                          <button type="submit" name="mail" class="btn btn-success">Mail</button>
                        </div>
                      </div>

                    </form>
                  </div>
                  
                  

                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br>
         <?php
    if (isset($_POST['submit']))
    {     

      $number=$_POST['number'];
      // $foodid=$_POST['foodid'];
      $percent=$_POST['percent'];
      $foodname=$_POST['foodname'];
      
      $main="select userid from userdata where mobile='$number'";
      $mainr=mysqli_query($conn,$main);
      // echo "".$main;
      if ( mysqli_num_rows( $mainr ) > 0 ){
        $datar=mysqli_fetch_assoc($mainr);
        $userid=$datar["userid"];
      }else{
        // change this number very important
        $userid=8;
      }
        $fid="select food_id from foodmaster where foodname='$foodname' and restaurant_id='$resid' ";    
        $res=mysqli_query ( $conn , $fid );
        //check correct restaurant and food id
        if ( mysqli_num_rows( $res ) > 0 ){

            $data1=mysqli_fetch_assoc($res);
            $foodid=$data1['food_id'];
            $sql="select water,calories,land,cusine,weight from foodmaster where food_id='$foodid' and restaurant_id='$resid' ";    
            $result = mysqli_query ( $conn , $sql );  
             
            if ( mysqli_num_rows( $result ) > 0 ){
             
              $data=mysqli_fetch_assoc($result);    
                         
                //data has water,calories,land
                $water=$percent*$data["water"]/100;
                $calories=$percent*$data["calories"]/100;
                $land=$percent*$data["land"]/100;
                $cusine=$data["cusine"];
                $weight=$percent*$data["weight"]/100;
                // echo $water +"   calories= "+ $calories +"  land= "+$land;
                $sql1="update userdata set water= water + '$water',calories=calories+'$calories', land=land+'$land',$cusine=$cusine+'$water',weight=weight+'$weight' WHERE userid= '$userid'";   
                $sql3="insert into `orderdata` (`orderid`, `user_id`, `restaurant_id`, `food_id`, `percent`, `water`, `calories`, `land`) VALUES (NULL, '$userid', '$resid', '$foodid', '$percent', '$water', '$calories', '$land')";
                $sql4="update restaurant set water= water + '$water',calories=calories+'$calories', land=land+'$land' WHERE res_id= '$resid'";
                 // echo("console.log('PHP: ".json_encode($sql1, JSON_NUMERIC_CHECK)."');");
                $result1 = mysqli_query ( $conn , $sql1 );   
                $result1 = mysqli_query ( $conn , $sql3 );   
                    $result2 = mysqli_query ( $conn , $sql4 );   
                // header('Location: home.php');          
                       
            }else{ 
                    echo " Incorrect data ";
             
            }
        }else{
            echo "Incorrect Restaurant and food match";
        }
      
   
     
    }
     
    ?>
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Order History </h2>
                   <ul class="nav navbar-right panel_toolbox" style="min-width: 0px;">
                     <li>.</li><li></li>
                      <li><a class=""><i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Track record of all the orders and its environmental impact."></i></a>
                      </li>
                      
                    </ul>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      All your orders sorted according to your order date.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Customer Name</th>
                          <th>Food Name</th>
                          <th>Water</th>
                          <th>Calories</th>
                          <th>CO₂</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>                    
                         <?php
                 //print orders
                           
                              $sql="select userdata.username,b.foodname, a.water , a.calories , a.land , DATE_FORMAT(a.dateins, '%d-%m-%y %H:%i %p') AS dateins from orderdata a join foodmaster b on a.food_id=b.food_id JOIN userdata on userdata.userid=a.user_id where a.restaurant_id='$resid' order by a.dateins DESC";
                              $result1 = mysqli_query ( $conn , $sql );
                              if ( mysqli_num_rows( $result1 ) > 0 ){                  
                                   while($row =mysqli_fetch_assoc($result1)) {           
                                      echo "<tr><td>" . $row["username"]. "</td><td>" . $row["foodname"]. "</td><td>" . $row["water"]. "</td><td>" . $row["calories"].  "</td><td>" . $row["land"]. "</td><td>" . $row["dateins"]."</td></tr>";
                                    }        
                              }else
                              { echo " First Time user ";     
                              }
                              ?>                          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>          
        </div>
    
        <!-- /page content -->
      </div>
    </div>

   <!-- jQuery -->
    <script src="static/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="static/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="static/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="static/vendors/nprogress/nprogress.js"></script>
    <script src="static/vendors/Chart.js/dist/Chart.min.js"></script>
    <script src="static/vendors/echarts/dist/echarts.min.js"></script>    
    <!-- Custom Theme Scripts -->
    <script src="static/build/js/custom.min.js"></script>
    <script src="static/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="static/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="static/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>       
    <script src="static/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

   
    <script type="text/javascript"> 



      var diction = {
                      1: ["Black Coffee","Black Tea","Hot Coffee ","Hot Coffee with cream","Cold coffee","Lemon Tea","Milkshake with chocolate","Dryfruit Milkshake","Lemonade","Soft Drink","Float","Virgin Mojito","Apple Juice","Pineapple Juice","Orange juice","Grapefruit juice","Veg Noodles","Paneer Noodles","Chilly paneer","Veg Manchurian","Paneer Manchurian","Chicken Noodles","Chicken manchurian","Masala Burger","Cheese Burger","Paneer Burger","Chicken Burger","Cheese chicken","Paneer Pizza","Margherita Pizza","Veg cheeze Pizza","Chicken Pizza","Chicken Cheese Pizza","Masala Fries","Cheese Fries ","Chocolate Sandwich","Veg  Sandwich","Cheese Garlic Sandwich","Cheese Corn Sandwich","cheese toast","Chicken Sanwich","Chicken Mayo","Masala Pasta ","Cheese Pasta","Panner Pasta","Masala Maggie","Cheese Maggie","Panner Maggie","Chicken Pasta","Chicken Maggie"],
                      2: ["Milk","Black Coffee","Black Tea","Hot Coffee ","Lemon Tea","Soft Drink","Aloo paratha","Onion Paratha","Gobhi Paratha","Mix Paratha","Paneer Paratha","naan","Roti","Butter naan","Butter Roti","Lacha Paratha","chola bathura","Shahi Paneer ","Rice","Jeera rice","Veg Biryani","Paneer butter masala","paneer tikka masala","Mix veg","Dal fry","Dal tadka","Dal Makhani"],
                      3: ["Black Coffee","Black Tea","Hot Coffee ","Hot Coffee with cream","Cold coffee","Cold coffee with ice cream","Lemon Tea","Milkshake without Chocolate","Milkshake with chocolate","Dryfruit Milkshake","Veg Noodles","Paneer Noodles","Chilly potato","Chilly paneer","Veg hot n sour soups","Carrot soup","Veg manchow soups","Cream of tomato soup","Sweet corn soup","Chicken Noodles","Chilly chicken","Chicken manchurian","Chicken momos","Chicken hot n sour soup","Chicken manchow soup","Vegetable choupsey","Spring roll","Veg momos ","Paneer momos"],
                      4: ["Milk","Black Coffee","Black Tea","Hot Coffee ","Cold coffee","Soft Drink","Lemonade","Apple Juice","Pineapple Juice","Orange juice","Grapefruit juice","Veg Noodles","Veg Manchurian","Paneer Manchurian","Chicken Noodles","Paneer Paratha","Masala Dosa","Plain Dosa","Idli Sambhar","Uttapam","Sambar Wada","chola bathura","Vada Pav","chicken Biryani","Masala Omlette","Masala Fries","Veg  Sandwich","Masala Maggie","Cheese Maggie","Panner Maggie"],
                      5: ["Milk","Black Coffee","Black Tea","Hot Coffee ","Hot Coffee with cream","Cold coffee","Cold coffee with ice cream","Lemon Tea","Milkshake without Chocolate","Milkshake with chocolate","Dryfruit Milkshake","Lemonade","Soft Drink","Float","Virgin Mojito","Apple Juice","Pineapple Juice","Orange juice","Grapefruit juice","Veg Noodles","Paneer Noodles","Chilly potato","Chilly paneer","Veg Manchurian","Paneer Manchurian","Vegetable choupsey","Spring roll","Veg momos ","Paneer momos","Veg hot n sour soups","Carrot soup","Veg manchow soups","Cream of tomato soup","Sweet corn soup","Chicken Noodles","Chilly chicken","Chicken manchurian","Chicken momos","Chicken hot n sour soup","Chicken manchow soup","Aloo paratha","Onion Paratha","Gobhi Paratha","Mix Paratha","Paneer Paratha","naan","Roti","Butter naan","Butter Roti","Lacha Paratha","Masala Dosa","Plain Dosa","Idli Sambhar","Uttapam","Sambar Wada","chola bathura","Vada Pav","Shahi Paneer ","Rice","Jeera rice","Veg Biryani","Paneer butter masala","paneer tikka masala","Mix veg","Dal fry","Dal tadka","Dal Makhani","chicken Biryani","Mutton biryani","Butter chicken","Chicken Tikka Masala","Masala Omlette","Cheese omlette","Bacon and egg","Masala Burger","Cheese Burger","Paneer Burger","Paneer Pizza","Margherita Pizza","Veg cheese Pizza","Masala Fries","Cheese Fries ","Chocolate Sandwich","Veg  Sandwich","Cheese Garlic sandwich","Cheese Corn Sandwich","cheese toast","Masala Pasta ","Cheese Pasta","Panner Pasta","Masala Maggie","Cheese Maggie","Panner Maggie","Chicken Burger","Cheese chicken burger","Chicken Pizza","Chicken Cheese Pizza","Chicken Sandwich","Chicken Mayo","Chicken Pasta","Chicken Maggie"]
                    }
$('#foodname').html(
            // get array by the selected value
            diction[<?php echo $resid ?>].map(function(v) {
              // generate options with the array element
              return $('<option/>', {
                value: v,
                text: v
              })
            })
          );
     
      $('#datatable').dataTable({
        'order': [[ 5, 'desc' ]]
      });
        <?php

        
        // $sql="select DATE_FORMAT(dateins, '%e %b %y %H:%i') dateins,water,calories,land from orderdata where user_id=1 order by dateins ASC";
          $sql="SELECT DATE_FORMAT(dateins, '%d-%m-%y') AS dateins , SUM(water) as water,SUM(calories) as calories,SUM(land) as land FROM orderdata WHERE restaurant_id = '$resid' GROUP BY DAY(dateins) ORDER BY DATE(dateins) ASC , dateins DESC";
          // echo "".$sql;

        $result1 = mysqli_query ( $conn , $sql );
        if ( mysqli_num_rows( $result1 ) > 0 ){
                 
            $data1=[];
            $data2=[];
            $data3=[];
            $data4=[];
             while($row =mysqli_fetch_assoc($result1)) {
                // $time=strtotime($row["dateins"])*1000;
                $temp=$row["dateins"];
                $water=intval($row["water"]);
                $calories=intval($row["calories"]);
                $land=intval($row["land"]);
                $data1[] = "$water";
                $data2[] = "$temp"; 
                $data3[] = "$calories";  
                $data4[] = "$land";  

              }            
        }else{
         echo " First Time user ";     
        }

        // echo("console.log('PHP: ".json_encode($data1, JSON_NUMERIC_CHECK)."');");
        ?>

          // if ($('#mybarChart1').length ){ 
            
            var ctx = document.getElementById("mybarChart1");
            var mybarChart1 = new Chart(ctx, {
            type: 'bar',
            data: {
              labels:<?php echo json_encode($data2, JSON_NUMERIC_CHECK);?>,
              datasets: [{
              label: 'Water (L) ',
              backgroundColor: "#064e96",
              yAxisID: 'A',
              data:<?php echo json_encode($data1, JSON_NUMERIC_CHECK);?>
              },{
              label: 'Calories (cal) ',
              backgroundColor: "#CCCCCC",
              yAxisID: 'A',
              data:<?php echo json_encode($data3, JSON_NUMERIC_CHECK);?>
            },{
              label: 'CO² (g) ',
              backgroundColor: "#FF6600",
              yAxisID: 'B',
              data:<?php echo json_encode($data4, JSON_NUMERIC_CHECK);?>
            }]
            },

            options: {
              scales: {
              yAxes: [{
                id: 'A',
            type: 'linear',
            position: 'left',
                ticks: {
                beginAtZero: true
                }
              },{
                id: 'B',
            type: 'linear',
            position: 'right',
                ticks: {
                beginAtZero: true
                }
              }]
              }
            }
            });
            
          
    </script>
    
  </body>
</html>
