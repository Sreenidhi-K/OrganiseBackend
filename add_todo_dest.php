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
    <title> todo add- organise </title>
    <link rel="stylesheet" type="text/css" href="reg_style.css">
    </head>
    
    <body>
    
        <?php
        
        if(isset($_POST['todo_sub']))
        {
          $todo_item=$_POST['todo_item'];  
            if(empty($todo_item))
            {
                echo("<h3>Item not entered !</h3> ");
            }
            else
            {
                $name_user=$_SESSION["un_ss"];
              $some_res=mysqli_query($conn,"SELECT id FROM tab_user WHERE username='$name_user';");
                $rows=mysqli_fetch_row($some_res);
                $id_res=$rows[0];
                $res_sql="INSERT INTO todo$id_res (todoitem) VALUES('$todo_item');";
                $result=mysqli_query($conn,$res_sql);
            if(!$result)
                {
                    echo("<h3>Query failed !</h3> ");
                     
            
                }
                else
                {
                    echo("<h3>Todo-item added successfully !!</h3>");
                    
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