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

    <title>Resources</title>

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
                    <h2>Resources</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <div style="float:left;">
                        <iframe frameborder="0" id="youtube" src="//www.youtube.com/embed/AY-7RAcoXYs?rel=0" title="YouTube video player" width="340" height="241" class="graphic"></iframe>
                      </div>

                      <div style="float:left;">
                        <iframe frameborder="0" id="youtube" src="//www.youtube.com/embed/TDK83M8MgUQ?rel=0" title="YouTube video player" width="340" height="241" class="graphic"></iframe>
                      </div>
                      <div style="float:left;">
                        <iframe frameborder="0" id="youtube" src="//www.youtube.com/embed/U8G2FCElM0w?rel=0" title="YouTube video player" width="340" height="241" class="graphic"></iframe>
                      </div>
                      <div style="float:left;">
                        <iframe frameborder="0" id="youtube" src="//www.youtube.com/embed/Z99Za8SsLlI?rel=0" title="YouTube video player" width="340" height="241" class="graphic"></iframe>
                      </div>
                      <div style="float:left;">
                        <iframe frameborder="0" id="youtube" src="//www.youtube.com/embed/ivbNrgLna_w?rel=0" title="YouTube video player" width="340" height="241" class="graphic"></iframe>
                      </div>
                      <div style="float:left;">
                        <iframe frameborder="0" id="youtube" src="//www.youtube.com/embed/Q46G6qRvvdI?rel=0" title="YouTube video player" width="340" height="241" class="graphic"></iframe>
                      </div>
                      
                  </div>
                  

                </div>
              </div>
            </div>
            <div class="clea"></div>
           <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Important Documents (Click to Download)</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div>
                    <h2>
                    <ul>
                      <li style=" padding-top: 7px;"><a href="https://drive.google.com/file/d/14gqrVFewNT5G3AkUjNU4UZCaCH0zdUfJ/view?usp=sharing" target="_blank" style=" text-decoration: underline;color: cornflowerblue;">Assignment for School Students</a></li>
                      <li style=" padding-top: 7px;"><a href="https://drive.google.com/open?id=1b5Nk_2_soqtDgqSzijWfxzw4Sl6RbyXO" target="_blank" style=" text-decoration: underline;color: cornflowerblue;">Water footprint of crops</a></li>
                      <li style=" padding-top: 7px;"><a href="https://drive.google.com/open?id=16nj7xBF_cdutwPFSQd2Mf2Nh967moolf" target="_blank" style=" text-decoration: underline;color: cornflowerblue;">Low Carbon lifestyle</a></li>
                      <li style=" padding-top: 7px;"><a href="https://drive.google.com/open?id=1PsF0MZeyXQM9p5Wu1-vtExvFZGptRgTz" target="_blank" style=" text-decoration: underline;color: cornflowerblue;">How to calculate water footprint</a></li>
                      <li style=" padding-top: 7px;"><a href="https://drive.google.com/open?id=1NGQL0mqqQHrSR5-Q8SuBZAsfaieZ0J_E" target="_blank" style=" text-decoration: underline;color: cornflowerblue;">Water footprint of common food items</a></li>
                      <li style=" padding-top: 7px;"><a href="https://drive.google.com/open?id=13trmA_k23SkXhN-q-rZ17eNTe1jDN2fs" target="_blank" style=" text-decoration: underline;color: cornflowerblue;">Presentation for school students</a></li>

                    </ul>
                    </h2>
                    </div>
                     
                      
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
