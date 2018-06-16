<?php
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
        if(isset($_POST['sign_submit']))
        {
            $name_of=$_POST['first_n'];
            $name_user=$_POST['userName'];
            $email_id=$_POST['email_id'];
            $pwd=$_POST['pass_word'];
            $con_pwd=$_POST['con_pass_word'];
            $hashed_pwd=md5($pwd);
            $res = mysqli_query($conn,"SELECT * FROM tab_user WHERE username='$name_user'");
            
            
            if(empty($name_of) || empty($name_user) || empty($email_id) || empty($pwd) || empty($con_pwd) )
            {
                echo("<h3>Cannot leave any field blank !</h3>");
        
                    
               
            }
            else if($pwd!=$con_pwd)
            {
                echo("<h3>Passwords must match</h3>");
                
            }
            
            
            else if(mysqli_num_rows($res)==1)
            {
                echo("<h3>User exists----Change the username</h3>");
            }

            else
            {
                $sql="INSERT INTO tab_user(name, email, username, pass) VALUES('$name_of', '$email_id', '$name_user', '$hashed_pwd');";
                $result=mysqli_query($conn,$sql);
                $some_res=mysqli_query($conn,"SELECT id FROM tab_user WHERE username='$name_user';");
                $rows=mysqli_fetch_row($some_res);
                $id_res=$rows[0];
                $new_sql="CREATE TABLE table$id_res (notetitle varchar(100) primary key, notecontent varchar(10000));";
                $new_res=mysqli_query($conn,$new_sql);
                $nt_sql="CREATE TABLE todo$id_res (itemno int primary key auto_increment, todoitem varchar(10000));";
                $nt_res=mysqli_query($conn,$nt_sql);
                
                if(!$result)
                {
                    echo("<h3>Query failed !</h3> ");
                     
            
                }
                else
                {
                    echo("<h3>Signed up successfully !!</h3>");
                    
                }
            }
        }
        else
        {
            echo("hmmm..Wrong way !");
        }
        ?>
    </body>
</html>