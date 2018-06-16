<!DOCTYPE html>
<html>
<head>
<title> OrGaNiSe </title>  
<link rel="stylesheet" type="text/css" href="reg_style.css">
</head>

<body>
    <h1>~~ OrGaNiSe ~~</h1>
    <form class="sign_up_with" action="signup_dest.php" method="post">
        <img src="pin_red.png" class="pin">
        <h2> SIGN UP </h2>
    <input type="text" name="first_n" placeholder=" Your Name" >
        <br>
    <input type="text" name="userName" placeholder="User name(must be unique)" >
        <br>
    <input type="email" name="email_id" placeholder="Email ID" >
        <br>
     <input type="password" name="pass_word" placeholder="Password">
        <br>
      <input type="password" name="con_pass_word" placeholder="Confirm password">
        <br>
    <button type="submit" name="sign_submit"> SIGN UP </button>
        
    </form>
    <a type="button" name="login" id="log_log" href="reg.php" > LOG IN </a>
    
</body>
</html>