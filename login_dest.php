<?php
session_start();
$host="localhost";
$dbuser="root";
$pass="";
$dbname="mysite";
$conn=mysqli_connect($host,$dbuser,$pass,$dbname);
if(mysqli_connect_errno())
{
    echo("Connection failed");

}
?>

<html>

    <head>
    <title> Signup page- organise </title>
    <link rel="stylesheet" type="text/css" href="reg_style.css">
    </head>
    
    <body>
    
        <?php
        
        if(isset($_POST['login']))
        {
          $name_user=$_POST['user_name'];  
          $pwd=$_POST['pwd'];
          $encrypt_pwd=md5($pwd);
          $res = mysqli_query($conn,"SELECT * FROM tab_user WHERE username='$name_user' AND pass='$encrypt_pwd'");
             if(mysqli_num_rows($res)==1)
             {
                 
                 $_SESSION["un_ss"] = $name_user;
                 $_SESSION["pw_ss"] = $encrypt_pwd;
                 
                 
                 header("Location: log_profile.php");
             }
            else
            {
                echo("<h3> Login Unsuccessful ! </h3>");
            }
        
        }
        
        else
        {
            echo("Wrong way !");
        }
        ?>

    </body>
</html>