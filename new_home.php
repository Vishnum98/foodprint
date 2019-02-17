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
                $conn = mysqli_connect("localhost", "root", "", "db");
                if (!$conn) {
                    die("Error connecting to database: " . mysqli_connect_error());
                }
                // $userid=1; 
                $sq="select * from userdata where userid='$userid'";
                $ans=mysqli_query($conn,$sq); 
                if ( mysqli_num_rows( $ans ) > 0 ){           
                 while($row3 =mysqli_fetch_assoc($ans)) {                  
                    $userwater=intval($row3["water"]);
                    $usercalories=intval($row3["calories"]);
                    $userland=intval($row3["land"]);
                    $username=$row3["username"];
                  }
                }else
                { echo " Userid not found ";     
                }
                //rank code starts
                $query="SELECT  FIND_IN_SET( water, ( SELECT GROUP_CONCAT(DISTINCT water ORDER BY water DESC ) FROM userdata ) ) AS rank FROM userdata WHERE userid='$userid'";

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
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Food Print</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="static/images/vi.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $username ?></h2>
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
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
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
                    <img src="static/images/vi.jpg" alt=""><?php echo $username ?>
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
          <!-- top tiles -->
          <div class="row tile_count">
                   
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-glass"></i> Total Water</span>
              <div class="count"><?php echo "".$userwater ?></div>
              <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total Calories</span>
              <div class="count"><?php echo "".$usercalories ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-building"></i> Total Land</span>
              <div class="count green"><?php echo "".$userland ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-line-chart"></i> Current Rank</span>
              <div class="count green"><?php echo "".$userrank ?></div>
              <span class="count_bottom">Out of <i class="green"><?php echo $count?> </i> Users </span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-cutlery"></i> Total Food Wasted</span>
              <div class="count">IDK</div>
              <span class="count_bottom">Out of </i><?php echo $count?> </i> Users </span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-cloud"></i> Total O₂</span>
              <div class="count">IDK</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <div class="x_title">
                    <h2>Daily Wastage</h2>                    
                    <div class="clearfix"></div>
                  </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                    <canvas id="mybarChart1"></canvas>                  
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <br>
                    <h2>Add Items</h2>
                    
                    <div class="clearfix"></div>
                  </div>
              <div class="x_content col-md-12 col-sm-12 col-xs-12">
                    <br>
                    <form method="post" class="form-horizontal form-label-left">

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Restaurant</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">                          
                          <select name="resid" id="resid" class="form-control">
                            <option value="1">Hide Out Cafe</option>
                            <option value="2">Nazeer</option>
                            <option value="3">Curry House</option>
                            <option value="4">Shruti</option>
                          </select>
                        </div>
                      </div>                        

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Food</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">                          
                          <select name="foodname" id="foodname" class="form-control">
                            
                          </select>
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Percent</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
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
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                            
                              $sql="SELECT username,water,FIND_IN_SET( water, ( SELECT GROUP_CONCAT(DISTINCT water ORDER BY water DESC ) FROM userdata ) ) AS rank FROM userdata ORDER By rank ASC LIMIT 5";
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
                <div class="x_title">
                  <h2>Device Usage</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tbody><tr>
                      <th style="width:37%;">
                        <p>Top 5</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <p class="">Device</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <p class="">Progress</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                        <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tbody><tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>IOS </p>
                            </td>
                            <td>30%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>Android </p>
                            </td>
                            <td>10%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Blackberry </p>
                            </td>
                            <td>20%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>Symbian </p>
                            </td>
                            <td>15%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>Others </p>
                            </td>
                            <td>30%</td>
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
                  <h2>Quick Settings</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                    <ul class="quick-list">
                      <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
                      </li>
                      <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
                      </li>
                      <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                      <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                      </li>
                      <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                      <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                      </li>
                      <li><i class="fa fa-area-chart"></i><a href="logout.php">Logout</a>
                      </li>
                    </ul>

                    <div class="sidebar-widget">
                        
                        <canvas width="200" height="120" id="echart_gauge" class="" style=""></canvas>
                        
                    </div>
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
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                          <th>Land</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>                    
                         <?php
                 //print orders
                           
                              $sql="select restaurant.res_name,b.foodname, a.water , a.calories , a.land , DATE_FORMAT(a.dateins, '%d-%m-%y %H:%i %p') AS dateins from orderdata a join foodmaster b on a.food_id=b.food_id JOIN restaurant on restaurant.res_id=a.restaurant_id where a.user_id='$userid' order by a.dateins DESC";
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

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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
   
  
    
    <script src="static/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

    <script type="text/javascript"> 
      var diction = {
                      1: ["Butter Chicken", "Pizza"],
                      2: ["Rice", "chicken"],
                      3: [""],
                      4: [""]
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
          $sql="SELECT DATE_FORMAT(dateins, '%d-%m-%y %l%p') AS dateins , SUM(water) as water,SUM(calories) as calories,SUM(land) as land FROM orderdata WHERE user_id = '$userid' GROUP BY DAY(dateins), HOUR(dateins) DIV 2 ORDER BY DATE(dateins) ASC , dateins DESC";
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
              label: 'Land(m²) ',
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
            $sql="select water,calories,land,cusine from foodmaster where food_id='$foodid' and restaurant_id='$resid' ";    
            $result = mysqli_query ( $conn , $sql );  
             
            if ( mysqli_num_rows( $result ) > 0 ){
             
              $data=mysqli_fetch_assoc($result);    
                         
                //data has water,calories,land
                $water=$percent*$data["water"]/100;
                $calories=$percent*$data["calories"]/100;
                $land=$percent*$data["land"]/100;
                $cusine=$data["cusine"];
                // echo $water +"   calories= "+ $calories +"  land= "+$land;
                $sql1="update userdata set water= water + '$water',calories=calories+'$calories', land=land+'$land',$cusine=$cusine+'$water' WHERE userid= '$userid'";   
                $sql3="insert into `orderdata` (`orderid`, `user_id`, `restaurant_id`, `food_id`, `percent`, `water`, `calories`, `land`) VALUES (NULL, '$userid', '$resid', '$foodid', '$percent', '$water', '$calories', '$land')";
                $sql4="update restaurant set water= water + '$water',calories=calories+'$calories', land=land+'$land' WHERE res_id= '$resid'";
                
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
  </body>
</html>
