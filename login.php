<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap -->
    <link href="static/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="static/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="static/vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="static/build/css/custom.min.css" rel="stylesheet">
</head>
<body class="login">
   <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
       <div class="login_wrapper">
          <div class="animate form login_form">
            <section class="login_content">
              <form method="post">
                <h1>Login</h1>
                <div>
                  <input id="username" name= "username" type="text" class="form-control" placeholder="Username" required="" />
                </div>
                <div>
                  <input  id="password" name="password" type="password" class="form-control" placeholder="Password" required="" />
                </div>
                <div>
                  <!-- <a class="btn btn-default submit" name="submit" type="submit"  href="new_home.php">Log in</a>
                  <a class="btn btn-default submit"  name="submit1" type="submit" href="res_home.php">Log in Restaurant</a> -->
                  <input class="btn btn-default" name="submit" type="submit" value=
                              "Login"><input class="btn btn-default" name="submit1" type="submit" value=
                              "Login Restaurant">
                  
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                  <p class="change_link">New to site?
                    <a href="login.php#signup" class="to_register" style="font-size: 13px;margin: 10px 15px 0 0;color: black;"> Create Account </a>
                  </p>

                  <div class="clearfix"></div>
                  <br />

                  <div>
                    <h1><i class="fa fa-paw"></i> Food Print!</h1>
                    <p>©2019 Food Print is a Hackathon Project</p>
                  </div>
                </div>
              </form>
            </section>
          </div>

          <div id="register" class="animate form registration_form">
            <section class="login_content">
              <form>
                <h1>Create Account</h1>
                <div>
                  <input type="text" class="form-control" placeholder="Username" required="" />
                </div>
                <div>
                  <input type="email" class="form-control" placeholder="Email" required="" />
                </div>
                <div>
                  <input type="password" class="form-control" placeholder="Password" required="" />
                </div>
                <div>
                  <a class="btn btn-default submit" href="">Submit</a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                  <p class="change_link">Already a member ?
                    <a href="#signin" class="to_register"> Log in </a>
                  </p>

                  <div class="clearfix"></div>
                  <br />

                  <div>
                    <h1><i class="fa fa-paw"></i> Food Print!</h1>
                    <p>©2019 Food Print is a Hackathon Project</p>
                  </div>
                </div>
              </form>
            </section>
          </div>
      </div>
    <?php
      if (isset($_POST['submit1'])){
        // echo "Restaurant";

        session_start();
             // connect to database
            $conn = mysqli_connect("localhost", "root", "", "db");

            if (!$conn) {
                die("Error connecting to database: " . mysqli_connect_error());
            }

            require_once('config.php') ;
            // session_start();
            $username=$_POST['username'];
            $password=$_POST['password'];
            $_SESSION['login_user']=$username; 
            $sql="select * from restaurant where username='$username' and res_password='$password' ";    
            $result = mysqli_query ( $conn , $sql );   // Executes sql code

            if ( mysqli_num_rows( $result ) > 0 ){
             
                $data=mysqli_fetch_assoc($result);     // Getting password from db         
                {         
                    $_SESSION['loggedin'] = "true";  // session memory for checking logged in or not             
                    $_SESSION["username"] = $data["username"]; 
                    $_SESSION["userid"] = $data["res_id"]; 
                    header('Location: newres_home.php');           
                }         
            }
             
            else
             
            { echo " Your id or pswd incorrect ";
             
            }

      }
    else if (isset($_POST['submit'])){     
            session_start();

            // connect to database
            $conn = mysqli_connect("localhost", "root", "", "db");

            if (!$conn) {
                die("Error connecting to database: " . mysqli_connect_error());
            }

            require_once('config.php') ;
            // session_start();
            $username=$_POST['username'];
            $password=$_POST['password'];
            $_SESSION['login_user']=$username; 
            $sql="select password,userid from userdata where username='$username' and password='$password' ";    
            $result = mysqli_query ( $conn , $sql );   // Executes sql code

            if ( mysqli_num_rows( $result ) > 0 ){
             
                $data=mysqli_fetch_assoc($result);     // Getting password from db         
                {         
                    $_SESSION['loggedin'] = "true";  // session memory for checking logged in or not             
                    $_SESSION["username"] = $username; 
                    $_SESSION["userid"] = $data["userid"]; 
                    header('Location: new_home.php');           
                }         
            }
             
            else
             
            { echo " Your id or pswd incorrect ";
             
            }
             
    }
     
    ?>                
</body>
</html>