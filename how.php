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
    $username=$_SESSION['username'];

?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Food Print | Support</title>

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
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="new_home.php" class="site_title"><i class="fa fa-paw"></i> <span>Food Print</span></a>
            </div>

            <div class="clearfix"></div>
            <?php
             
                $sql="select path from userdata where userid='$userid'";
                $ans=mysqli_query($conn,$sql); 
                if ( mysqli_num_rows( $ans ) > 0 ){           
                 while($row3 =mysqli_fetch_assoc($ans)) {
                  $profilepic=$row3["path"];
                 }}
                 if($profilepic == ""){
                    $profilepic='static/images/pro.jpg';
                 }

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
                <h2><?php echo $_SESSION['username'] ?></h2>
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
                  <li><a href="resources.php" ><i class="fa fa-laptop"></i>Resources</a></li>
                  <li><a href="how.php"><i class="fa fa-laptop"></i>Support</a></li>                  
                  <li><a href="logout.php"><i class="fa fa-laptop"></i>Logout</a></li>                 
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
                    <img src=<?php echo $profilepic ?> alt=""><?php echo $_SESSION['username'] ?>
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

       <div class="right_col" role="main" style="min-height: 1683px;">
         <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Support</h2>
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
                      <!-- form begins here -->
                      <form method="post" class="form-horizontal form-label-left">

                      
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Question</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" style="padding-left: 10px!important">
                          <input type="text" name="ques" id="ques" class="form-control" placeholder="Enter your Question.">
                        </div>
                      </div>    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" style="padding-left: 10px!important">
                          <!-- <input type="text" name="percent" id="percent" class="form-control" placeholder="Default Input"> -->
                          <textarea class="form-control" name="desc" id="desc" rows="3" placeholder="Enter Description for your Question." ></textarea>
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
<?php
    if (isset($_POST['submit']))
        {     
        $desc=$_POST['desc'];        
        $ques=$_POST['ques'];            
        $fid="INSERT INTO `questions` (`userid`,`ques`, `description`) VALUES ('$userid', '$ques', '$desc');";              
        $res=mysqli_query ( $conn , $fid );       
          echo "<h2>We will get back to you on your registered mail id shortly</h2>";
               
        }     
    ?>
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

    <!-- Custom Theme Scripts -->
    <script src="static/build/js/custom.min.js"></script>


  </body>
</html>
