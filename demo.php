<?php  
  

    $conn = mysqli_connect("localhost:3306", "vishnu", "vishnufoodprint123", "foodprint");
          if (!$conn) {
              die("Error connecting to database: " . mysqli_connect_error());
          }
    require_once('config.php') ;  
    $userid=1;
    $username='Demo';

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
    <style type="text/css">
      /*coloring the info point black*/
      .panel_toolbox>li>a {
    color: #000000!important;
    </style>
      <?php
    if (isset($_POST['submit']))
        {     
            // session_start();
              
        $resid=$_POST['resid'];
        // $foodid=$_POST['foodid'];
        $percent=$_POST['percent'];
            $foodname=$_POST['foodname'];
            //add user id code later
            // $userid='1';
        
            //getting food id from foodname 
            //todo populate foodname based on restaurant selected
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
                $sql4="update restaurant set water= water + '$water',calories=calories+'$calories', land=land+'$land',weight=weight+'$weight' WHERE res_id= '$resid'";
                
                $result1 = mysqli_query ( $conn , $sql1 );   
                $result1 = mysqli_query ( $conn , $sql3 );   
                    $result2 = mysqli_query ( $conn , $sql4 );   
                // header('Location: home.php');
                // echo("<meta http-equiv='refresh' content='1'>");          
                       
            }else{ 
                    echo " Incorrect data ";
             
            }
        }else{
            echo "Incorrect Restaurant and food match";
        }
   
     
    }
     
    ?>
    <?php
                
                $sq="select * from userdata where userid='$userid'";
                $ans=mysqli_query($conn,$sq); 
                 $beverages=0;
                      $chinese_veg=0;
                      $chinese_nveg=0;
                      $breads=0;
                      $indian_veg=0;
                      $indian_nveg=0;
                      $snacks_veg=0;
                      $snacks_nveg=0;
                if ( mysqli_num_rows( $ans ) > 0 ){           
                 while($row3 =mysqli_fetch_assoc($ans)) {                  
                    $userwater=intval($row3["water"]);
                    $usercalories=intval($row3["calories"]);
                    $userland=intval($row3["land"]);
                    $username=($row3["username"]);
                    $beverages=intval($row3["beverages"]);
                    $chinese_veg=intval($row3["chinese_veg"]);
                    $chinese_nveg=intval($row3["chinese_nveg"]);
                    $breads=intval($row3["breads"]);
                    $indian_veg=intval($row3["indian_veg"]);
                    $indian_nveg=intval($row3["indian_nveg"]);
                    $snacks_veg=intval($row3["snacks_veg"]);
                    $snacks_nveg=intval($row3["snacks_nveg"]);
                    $foodwaste=intval($row3["weight"]);
                    $profilepic=$row3["path"];
                    $cusum=intval($beverages+$chinese_veg+$chinese_nveg+$breads+$indian_veg+$indian_nveg+$snacks_veg+$snacks_nveg);
                    if ($cusum>0) {                      
                      $beverages=intval($beverages/$cusum*100);
                      $chinese_veg=intval($chinese_veg/$cusum*100);
                      $chinese_nveg=intval($chinese_nveg/$cusum*100);
                      $breads=intval($breads/$cusum*100);
                      $indian_veg=intval($indian_veg/$cusum*100);
                      $indian_nveg=intval($indian_nveg/$cusum*100);
                      $snacks_veg=intval($snacks_veg/$cusum*100);
                      $snacks_nveg=intval($snacks_nveg/$cusum*100);
                    }else{
                      $beverages=0;
                      $chinese_veg=0;
                      $chinese_nveg=0;
                      $breads=0;
                      $indian_veg=0;
                      $indian_nveg=0;
                      $snacks_veg=0;
                      $snacks_nveg=0;
                    }
                
                    // echo "indianveg perceny".$indian_nveg;
                  }
                }else
                { echo " Userid not found ";     
                }
                //rank code starts
                $query="SELECT  FIND_IN_SET( water, ( SELECT GROUP_CONCAT(DISTINCT water ORDER BY water ASC ) FROM userdata ) ) AS rank FROM userdata WHERE userid='$userid'";

                $res2 = mysqli_query ( $conn , $query );

                if ( mysqli_num_rows( $res2 ) > 0 ){                     
                    $data=mysqli_fetch_assoc($res2);                                      
                    $userrank=$data["rank"];                                                              
                }else{
                     echo " Userid not found ";                    
                }

                $sc="select count(*) as count from userdata";
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
              <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Food Print</span></a>
            </div>

            <div class="clearfix"></div>
            <?php
             
                 $profilepic='static/images/pro.jpg';
            ?>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="row">
              <div class="profile_pic col-sm-4">
                <img src=<?php echo $profilepic ?> alt="..." class="img-circle profile_img">
                <!-- <div class="img-circle profile_img" style="background-image: url(<?php echo $profilepic ?> )"></div> -->
              </div>
              <div class="profile_info col-sm-8">
                <span>Welcome,</span>
                <h2><?php echo $username ?></h2>
              </div>
              <div class="clearfix"></div>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="new_home.php"><i class="fa fa-home"></i>Home </a></li>
                  <li><a href="resources.php" ><i class="fa fa-book"></i>Resources</a></li>
                  <li><a href="how.php"><i class="fa fa-laptop"></i>Support</a></li>                  
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
                    <img src=<?php echo $profilepic ?> alt=""><?php echo $username ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profile.php"> Profile</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <?php 
        $days=1;    
          $query="CREATE VIEW temp as SELECT count(land) as land FROM orderdata WHERE user_id = 1 GROUP BY DAY(dateins), HOUR(dateins) DIV 2 ORDER BY DATE(dateins) ASC , dateins DESC";
          $ress=mysqli_query($conn,$query);
          $query="SELECT COUNT(land) as count from temp";
          $ress=mysqli_query($conn,$query);
          
          if ( mysqli_num_rows( $ress ) > 0 ){                     
              $data=mysqli_fetch_assoc($ress);                                      
              $days=intval($data["count"]);                                                              
          }else{
               echo " Counting days error "; 
               $days=1;                   
          }
          $ress=mysqli_query($conn,"drop view temp");
        ?>
        <?php 
        $qu="SELECT SUM(water) as todaywater from orderdata where cast(orderdata.dateins as date) = cast(CURRENT_DATE() as date) and user_id='$userid'";
      $resul=mysqli_query($conn,$qu);
       if ( mysqli_num_rows( $resul ) > 0 ){ 
           $data2=mysqli_fetch_assoc($resul);
           $todaywater=intval($data2["todaywater"]);
           $todaywater=5-($todaywater/200);
           if($todaywater<0)
            {$todaywater=0;
              // echo "0";
            }
           
            // echo $todaywater;
        }else
        { 
          // echo "5";     
          $todaywater=5;
        }
        ?>
       <div class="right_col" role="main" style="min-height: 1683px;">
          <!-- top tiles -->
          <div class="row tile_count">
                   
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top" ><i class="fa fa-glass"></i> Total Water (L) <i style=" color: black;right: -15%;padding: 1px 5px;border-radius: 50%;position: relative;" class="fa fa-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Water wasted till date due to wastage of food "></i></span>
              <div class="count"><?php echo "".$userwater ?></div>
              <span class="count_bottom"><i class="green"><?php echo ceil($userwater/40)?></i> Buckets of water <i style=" color: black;right: -5%;padding: 1px 5px;border-radius: 50%;position: relative;" class="fa fa-info" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Buckets of water wasted till date due to wastage of food "></i></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-fire"></i> Total Calories (cal) <i style=" color: black;right: -10%;padding: 1px 5px;border-radius: 50%;position: relative;" class="fa fa-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Calories (cal) wasted till date due to wastage of food "></i></span>
              <div class="count"><?php echo "".$usercalories ?></div>
              <span class="count_bottom"><i class="green"><?php echo ceil($usercalories/($days*2.73))?></i> days a kid can be fed<i style=" color: black;
    /*right: -5%;*/
     padding: 1px 5px; 
    border-radius: 50%;
    position: relative;" class="fa fa-info" data-toggle="tooltip" data-placement="bottom" title="" 
    data-original-title="Number of days a child can be fed if your average food wastage is extrapolated annulay"></i></span>
            </div>                    
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-cutlery"></i> Total Food Wasted (g)</span>
              <div class="count"><?php echo $foodwaste ?></div>
              <span class="count_bottom"><i class="green"><?php  echo ceil($foodwaste*0.365/$days)?> </i>Kg wasted in a year<i style=" color: black;
    /*right: -5%;*/
     padding: 1px 5px; 
    border-radius: 50%;
    position: relative;" class="fa fa-info" data-toggle="tooltip" data-placement="bottom" title="" 
    data-original-title="Yearly waste generated if you countinue the Current wastage trend."></i></span>
            </div>
            
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-cloud"></i> Total CO₂ (g)<i style=" color: black;right: -20%;padding: 1px 5px;border-radius: 50%;position: relative;" class="fa fa-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Total CO₂ (g) emitted till date due to wastage of food "></i></span>
              <div class="count green"><?php echo "".$userland ?></div>
              <span class="count_bottom"><i class="green"><?php  echo ceil($userland*0.0521/$days)?></i> Saplings to be planted<i style=" color: black;
    /*right: -5%;*/
     padding: 1px 5px; 
    border-radius: 50%;
    position: relative;" class="fa fa-info" data-toggle="tooltip" data-placement="bottom" title="" 
    data-original-title="Number of plants that must be planted annulay to absorb the CO₂ emitted if your food wastage is extrapolated annualy."></i></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-line-chart"></i> Current Rank <i style=" color: black;right: -20%;padding: 1px 5px;border-radius: 50%;position: relative;" class="fa fa-info" data-toggle="tooltip" data-placement="top" title="" 
                data-original-title="Your Current rank out of all the people registered on our website based."></i></span>
              <div class="count green"><?php echo "".$userrank ?></div>
              <span class="count_bottom">Out of <i class="green"><?php echo $count?> </i> Users </span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-star"></i> Today's Rating</span>
              <div class="count"><?php  echo round( $todaywater, 1, PHP_ROUND_HALF_UP)?> </div>
              <span class="count_bottom">Out of <i class="green">5 </i></span>
            </div>
          </div>
          <!-- /top tiles -->

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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Restaurant</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" style="padding-left: 10px!important">                          
                          <select name="resid" id="resid" class="form-control" >
                            <option value="1">Hide Out Cafe</option>
                            <option value="2">Shiv Sagar</option>
                            <option value="3">Oriental Spice</option>
                            <option value="4">VNIT Canteen</option>
                            <option value="5">Others</option>
                          </select>
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
          <div class="row">


            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                
                <div class="x_title">
                    <h2>Leaderboard</h2>
                    <ul class="nav navbar-right panel_toolbox" style="min-width: 0px;">
                     <li>.</li><li></li>
                      <li><a class=""><i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Your Ranking based on the total amount of water you wasted amongst all the users."></i></a>
                      </li>                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="display: block; margin-top: 0px!important;">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Rank</th>
                          <th>Name</th>
                          <th>Water</th>                          
                        </tr>
                      </thead>
                      <tbody>                        
                         <?php
                            //print Leaderboard
                            
                              $sql="SELECT username,water,FIND_IN_SET( water, ( SELECT GROUP_CONCAT(DISTINCT water ORDER BY water ASC ) FROM userdata ) ) AS rank FROM userdata ORDER By rank ASC LIMIT 5";
                              $result1 = mysqli_query ( $conn , $sql );
                              if ( mysqli_num_rows( $result1 ) > 0 ){                  
                                   while($row =mysqli_fetch_assoc($result1)) {           
                                      echo "<tr><th scope=\"row\">" . $row["rank"]. "</th><td>" . $row["username"]. "</td><td>" . $row["water"]."</td></tr>";
                                    }        
                              }else
                              { echo " Leaderboard error";     
                              }
                              ?>
                        <tr style="    border: 2px solid #000000c2;">
                          <th scope="row"><?php echo $userrank ?></th>
                          <td><?php echo $username ?></td>
                          <td><?php echo $userwater ?></td>
                          
                        </tr>
                      </tbody>
                    </table>

                  </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title" >
                  <h2>Wastage Distribution</h2>
                  <ul class="nav navbar-right panel_toolbox" style="min-width: 0px;">
                     <li>.</li><li></li>
                      <li><a class=""><i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="You can see the environmental impact of the food wasted classified on the basis of different cusines."></i></a>
                      </li>
                      
                    </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="padding-bottom: 0px!important;float: unset!important;">
                  <table class="" style="width:100%">
                    <tbody><tr>
                      <th style="width:37%;">
                        <p> </p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <p class="">Cuisine</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <p class="">Percentage</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                        <canvas class="canvasDoughnut1" height="140" width="140" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tbody><tr>
                            <td>                             
                              <p><i class="fa fa-square blue"></i>Beverages </p>
                            </td>
                            <td><?php echo $beverages."%" ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>Chinese Veg </p>
                            </td>
                            <td><?php echo $chinese_veg."%" ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square grey" style="color: grey"></i>Chinese Non Veg </p>
                            </td>
                            <td><?php echo $chinese_nveg."%" ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Breads </p>
                            </td>
                            <td><?php echo $breads."%" ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square " style="color: #9cc2cb"></i>Indian Veg </p>
                            </td>
                            <td><?php echo $indian_veg."%" ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square " style="color: #E74C3C"></i>Indian Non Veg </p>
                            </td>
                            <td><?php echo $indian_nveg."%" ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow" style="color: #e8e884"></i>Snacks Veg </p>
                            </td>
                            <td><?php echo $snacks_veg."%" ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square black" style="color: #fba12e"></i>Snacks Non Veg </p>
                            </td>
                            <td><?php echo $snacks_nveg."%" ?></td>
                          </tr>
                          
                        </tbody></table>
                      </td>
                    </tr>
                  </tbody></table>
                </div>
              </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Daily Rating</h2>
                 <ul class="nav navbar-right panel_toolbox" style="min-width: 0px;">
                     <li>.</li><li></li>
                      <li><a class=""><i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Your daily rating based on the water you wasted."></i></a>
                      </li>
                      
                    </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                 
                  <div>
                    <table>
  <tr>
    <td style="padding-right:10px ;padding-top: 05%">
      <label for="input-3" class="control-label" style="width: 100%">Today's Rating</label>
    </td></tr>
    <tr>
    <td>
      <input id="input-3" name="input-3" value=
      <?php
       echo $todaywater;     
      ?> class="rating-loading">
    </td>
    </tr>

  <tr>
    <td style="padding-right:10px ;padding-top: 15%">
      <label for="input-4" class="control-label" style="width: 100%">Yesterday's Rating</label>
    </td></tr>
    <tr>
    <td>
      <input id="input-4" name="input-4" value=
      <?php
      $qu="SELECT SUM(water) as todaywater from orderdata where cast(orderdata.dateins as date) = cast(CURRENT_DATE()-1 as date) and user_id='$userid'";
      $resul=mysqli_query($conn,$qu);
       if ( mysqli_num_rows( $resul ) > 0 ){ 
           $data2=mysqli_fetch_assoc($resul);
           $todaywater=intval($data2["todaywater"]);
           $todaywater=5-($todaywater/200);
           if($todaywater<0)
            echo "0";
           else
            echo $todaywater;
        }else
        { echo "5";     
        }      
      ?> class="rating-loading">
    </td>
    </tr>

</table>
                  </div>
                </div>
              </div>
            </div>

          </div>
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
                          <th>Restaurant</th>
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
                           
                              $sql="select restaurant.res_name,b.foodname, a.water , a.calories , a.land , DATE_FORMAT(a.dateins, '%d-%m-%y %l:%i %p ') AS dateins from orderdata a join foodmaster b on a.food_id=b.food_id JOIN restaurant on restaurant.res_id=a.restaurant_id where a.user_id='$userid' order by a.dateins DESC";
                              $result1 = mysqli_query ( $conn , $sql );
                              if ( mysqli_num_rows( $result1 ) > 0 ){                  
                                   while($row =mysqli_fetch_assoc($result1)) {           
                                      echo "<tr><td>" . $row["res_name"]. "</td><td>" . $row["foodname"]. "</td><td>" . $row["water"]. "</td><td>" . $row["calories"].  "</td><td>" . $row["land"]. "</td><td>" . $row["dateins"]."</td></tr>";
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
      <!-- bootstrap-progressbar -->
    <!-- <script src="static/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> -->
      <!-- gauge.js -->
    <script src="static/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="static/build/js/custom.min.js"></script>
    <script src="static/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="static/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="static/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
   
  
    <script src="static/js/star-rating.min.js"></script>
    <script src="static/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

    <script type="text/javascript"> 

      var chart_doughnut_settings = {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: {
          labels: [
            "Beverages",
            "Chinese Veg",
            "Chinese Non Veg",
            "Breads",
            "Indian Veg",
            "Indian Non Veg",
            "Snacks Veg",
            "Snacks Non Veg"
          ],
          datasets: [{
            data: [<?php
              echo $beverages.",".$chinese_veg.",".$chinese_nveg.",".$breads.",".$indian_veg.",".$indian_nveg.",".$snacks_veg.",".$snacks_nveg;
              ?>],
            backgroundColor: [
              "blue",
              "green",
              "grey",
              "purple",
              "#9cc2cb",
              "#E74C3C",
              "#e8e884",
              "#fba12e"
            ],
            hoverBackgroundColor: [
              "purple",
              "purple",
              "purple",
              "purple",
              "purple",
              "purple",
              "purple",
              "purple"
            ]
          }]
        },
        options: { 
          legend: false, 
          responsive: false 
        }
      }
    
      $('.canvasDoughnut1').each(function(){
        
        var chart_element = $(this);
        var chart_doughnut = new Chart( chart_element, chart_doughnut_settings);
        
      }); 

       $('#input-3').rating({displayOnly: true, step: 0.5});
       $('#input-4').rating({displayOnly: true, step: 0.5});


      var diction = {
                      1: ["Black Coffee","Black Tea","Hot Coffee ","Hot Coffee with cream","Cold coffee","Lemon Tea","Milkshake with chocolate","Dryfruit Milkshake","Lemonade","Soft Drink","Float","Virgin Mojito","Apple Juice","Pineapple Juice","Orange juice","Grapefruit juice","Veg Noodles","Paneer Noodles","Chilly paneer","Veg Manchurian","Paneer Manchurian","Chicken Noodles","Chicken manchurian","Masala Burger","Cheese Burger","Paneer Burger","Chicken Burger","Cheese chicken","Paneer Pizza","Margherita Pizza","Veg cheeze Pizza","Chicken Pizza","Chicken Cheese Pizza","Masala Fries","Cheese Fries ","Chocolate Sandwich","Veg  Sandwich","Cheese Garlic Sandwich","Cheese Corn Sandwich","cheese toast","Chicken Sanwich","Chicken Mayo","Masala Pasta ","Cheese Pasta","Panner Pasta","Masala Maggie","Cheese Maggie","Panner Maggie","Chicken Pasta","Chicken Maggie"],
                      2: ["Milk","Black Coffee","Black Tea","Hot Coffee ","Lemon Tea","Soft Drink","Aloo paratha","Onion Paratha","Gobhi Paratha","Mix Paratha","Paneer Paratha","naan","Roti","Butter naan","Butter Roti","Lacha Paratha","chola bathura","Shahi Paneer ","Rice","Jeera rice","Veg Biryani","Paneer butter masala","paneer tikka masala","Mix veg","Dal fry","Dal tadka","Dal Makhani"],
                      3: ["Black Coffee","Black Tea","Hot Coffee ","Hot Coffee with cream","Cold coffee","Cold coffee with ice cream","Lemon Tea","Milkshake without Chocolate","Milkshake with chocolate","Dryfruit Milkshake","Veg Noodles","Paneer Noodles","Chilly potato","Chilly paneer","Veg hot n sour soups","Carrot soup","Veg manchow soups","Cream of tomato soup","Sweet corn soup","Chicken Noodles","Chilly chicken","Chicken manchurian","Chicken momos","Chicken hot n sour soup","Chicken manchow soup","Vegetable choupsey","Spring roll","Veg momos ","Paneer momos"],
                      4: ["Milk","Black Coffee","Black Tea","Hot Coffee ","Cold coffee","Soft Drink","Lemonade","Apple Juice","Pineapple Juice","Orange juice","Grapefruit juice","Veg Noodles","Veg Manchurian","Paneer Manchurian","Chicken Noodles","Paneer Paratha","Masala Dosa","Plain Dosa","Idli Sambhar","Uttapam","Sambar Wada","chola bathura","Vada Pav","chicken Biryani","Masala Omlette","Masala Fries","Veg  Sandwich","Masala Maggie","Cheese Maggie","Panner Maggie"],
                      5: ["Milk","Black Coffee","Black Tea","Hot Coffee ","Hot Coffee with cream","Cold coffee","Cold coffee with ice cream","Lemon Tea","Milkshake without Chocolate","Milkshake with chocolate","Dryfruit Milkshake","Lemonade","Soft Drink","Float","Virgin Mojito","Apple Juice","Pineapple Juice","Orange juice","Grapefruit juice","Veg Noodles","Paneer Noodles","Chilly potato","Chilly paneer","Veg Manchurian","Paneer Manchurian","Vegetable choupsey","Spring roll","Veg momos ","Paneer momos","Veg hot n sour soups","Carrot soup","Veg manchow soups","Cream of tomato soup","Sweet corn soup","Chicken Noodles","Chilly chicken","Chicken manchurian","Chicken momos","Chicken hot n sour soup","Chicken manchow soup","Aloo paratha","Onion Paratha","Gobhi Paratha","Mix Paratha","Paneer Paratha","naan","Roti","Butter naan","Butter Roti","Lacha Paratha","Masala Dosa","Plain Dosa","Idli Sambhar","Uttapam","Sambar Wada","chola bathura","Vada Pav","Shahi Paneer ","Rice","Jeera rice","Veg Biryani","Paneer butter masala","paneer tikka masala","Mix veg","Dal fry","Dal tadka","Dal Makhani","chicken Biryani","Mutton biryani","Butter chicken","Chicken Tikka Masala","Masala Omlette","Cheese omlette","Bacon and egg","Masala Burger","Cheese Burger","Paneer Burger","Paneer Pizza","Margherita Pizza","Veg cheese Pizza","Masala Fries","Cheese Fries ","Chocolate Sandwich","Veg  Sandwich","Cheese Garlic sandwich","Cheese Corn Sandwich","cheese toast","Masala Pasta ","Cheese Pasta","Panner Pasta","Masala Maggie","Cheese Maggie","Panner Maggie","Chicken Burger","Cheese chicken burger","Chicken Pizza","Chicken Cheese Pizza","Chicken Sandwich","Chicken Mayo","Chicken Pasta","Chicken Maggie"]
                    }

                    // bind change event handler
      $('#resid').change(function() {
        // get the second dropdown
        $('#foodname').html(
            // get array by the selected value
            diction[this.value]
            // iterate  and generate options
            .map(function(v) {
              // generate options with the array element
              return $('<option/>', {
                value: v,
                text: v
              })
            })
          )
          // trigger change event to generate second select tag initially
      }).change()
      $('#datatable').dataTable({
        'order': [[ 5, 'desc' ]]
      });
        <?php

        
        // $sql="select DATE_FORMAT(dateins, '%e %b %y %H:%i') dateins,water,calories,land from orderdata where user_id=1 order by dateins ASC";
          $sql="SELECT DATE_FORMAT(dateins, '%d-%m-%y %l%p') AS dateins , SUM(water) as water,SUM(calories) as calories,SUM(land) as land FROM orderdata WHERE user_id = '$userid' GROUP BY DAY(dateins), HOUR(dateins) DIV 2 ORDER BY DATE(dateins) ASC , dateins ASC";
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
         // echo " First Time user ";   
          $data1=[0];
            $data2=[0];
            $data3=[0];
            $data4=[0]; 
        }
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
              label: 'CO₂ (g) ',
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
