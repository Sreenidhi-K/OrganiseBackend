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
<!DOCTYPE html>
<html>
    <head>
    <title> User Profile </title>  
    <link rel="stylesheet" type="text/css" href="reg_style.css">
    </head>
<body>
<a id="logout" href="logout_dest.php"> LOGOUT </a>
<?php
echo "<h3>Welcome " . $_SESSION["un_ss"] . " !! </h3>";

?>
    <form id=note_contain action="add_note_dest.php" method="post">
        <h5> Add a note </h5>
         <input type="text" name="note_name" placeholder="Title of your note "
            >
        <br><br>
        <textarea  name="comment" style="height:100px;font-size:20px">Type your note </textarea>
        <br><br>
        <button type="submit" id=note name="notess"> Create a note </button>
    </form>
<div class="note_disp">
    <h5> List of notes </h5>
<?php
    $name_user=$_SESSION["un_ss"];
 $some_res=mysqli_query($conn,"SELECT id FROM tab_user WHERE username='$name_user';");
    $rows=mysqli_fetch_row($some_res);
    $id_res=$rows[0];
$row=mysqli_query($conn,"SELECT * FROM table$id_res ");
if(mysqli_num_rows($row)==0)
{
    echo ( "<h4>no notes yet</h4>");
}
else
    {
    while($avail=mysqli_fetch_assoc($row))
    {
    echo("<h4>".$avail['notetitle']." ---- ".$avail['notecontent']."</h4> <br>");
    //echo("<a id=".$avail['notetitle']." style='color:black'> DELETE </a>");
    }
}
?>
</div>
    <div id="todo_contain">
    <form  action="add_todo_dest.php" method="post">
         <input type="text" name="todo_item" placeholder="What do you want to do ? "
            >
        <button type="submit" id=note name="todo_sub"> ADD </button>
    </form>
        <h5> Todo list </h5>
<?php
    $name_user=$_SESSION["un_ss"];
 $some_res=mysqli_query($conn,"SELECT id FROM tab_user WHERE username='$name_user';");
    $rows=mysqli_fetch_row($some_res);
    $id_res=$rows[0];
$row=mysqli_query($conn,"SELECT * FROM todo$id_res");
if(mysqli_num_rows($row)==0)
{
    echo ( "<h4> no list items yet </h4>");
}
else
    {
    while($avail=mysqli_fetch_assoc($row))
    {
    echo("<h4 class='list_check' id='".$avail['itemno']."'>". $avail['todoitem']."</h4> ");
   
    }
}
?>
    </div>
    <script>
    var todo_list=document.getElementsByClassName("list_check");
        for(var i=0;i<todo_list.length;i++)
            {
                todo_list[i].addEventListener("click",function call_cut(e){
                    e.preventDefault();
                    var iden=this.id;
                    console.log(iden);
                    var strike_item=document.getElementById(iden);
            var x=document.getElementById(iden).style.textDecoration;
                    if(x=="line-through")
                   {
                    document.getElementById(iden).style.textDecoration='none';
                   }
                   else
                   {
                   document.getElementById(iden).style.textDecoration='line-through';
                   }
                
                });
            }
        
    </script>

</body>
</html>