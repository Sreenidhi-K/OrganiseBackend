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
    <title> note add- organise </title>
    <link rel="stylesheet" type="text/css" href="reg_style.css">
    </head>
    
    <body>
    
        <?php
        
        if(isset($_POST['notess']))
        {
          $note_title=$_POST['note_name'];  
          $note_con=$_POST['comment'];
            if(empty($note_title))
            {
                echo("<h3>Title is needed !</h3> ");
            }
            else
            {
                $name_user=$_SESSION["un_ss"];
              $some_res=mysqli_query($conn,"SELECT id FROM tab_user WHERE username='$name_user';");
                $rows=mysqli_fetch_row($some_res);
                $id_res=$rows[0];
                $res_sql="INSERT INTO table$id_res (notetitle, notecontent) VALUES('$note_title', '$note_con');";
                $result=mysqli_query($conn,$res_sql);
            if(!$result)
                {
                    echo("<h3>Query failed !</h3> ");
                     
            
                }
                else
                {
                    echo("<h3>Note added successfully !!</h3>");
                    
                }
        }
        }
         
        else
        {
            echo("Wrong way !");
        }
        ?>

    </body>
</html>