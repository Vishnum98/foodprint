<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <table align="center" bgcolor="#CCCCCC" border="0" cellpadding="0"
    cellspacing="1" width="300">
        <tr>
            <td>
                <form method="post" name="">
                    <table bgcolor="#FFFFFF" border="0" cellpadding="3"
                    cellspacing="1" width="100%">
                        <tr>
                            <td align="center" colspan="3"><strong>User
                            Login</strong></td>
                        </tr>
                        <tr>
                            <td width="78">Username</td>
                            <td width="6">:</td>
                            <td width="294"><input id="username" name= "username" type="text"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input id="password" name="password" type=
                            "password"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input name="submit" type="submit" value=
                            "Login"><input name="submit1" type="submit" value=
                            "Login Restaurant"> </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
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
            $sql="select res_id from restaurant where res_name='$username' and res_password='$password' ";    
            $result = mysqli_query ( $conn , $sql );   // Executes sql code

            if ( mysqli_num_rows( $result ) > 0 ){
             
                $data=mysqli_fetch_assoc($result);     // Getting password from db         
                {         
                    $_SESSION['loggedin'] = "true";  // session memory for checking logged in or not             
                    $_SESSION["username"] = $username; 
                    $_SESSION["userid"] = $data["resid"]; 
                    header('Location: home.php');           
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
                    header('Location: home.php');           
                }         
            }
             
            else
             
            { echo " Your id or pswd incorrect ";
             
            }
             
    }
     
    ?>                
</body>
</html>