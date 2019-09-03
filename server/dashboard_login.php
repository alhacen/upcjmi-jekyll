<?php
session_start();
include"db.php";
function safe_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function get_ip(){
	$ipAddress = $_SERVER['REMOTE_ADDR'];
	if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
		$ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
	}
	return $ipAddress;
}
if(isset($_POST['username'])&&isset($_POST['password'])){
    $password=safe_input($_POST['password']);
    $username=safe_input($_POST['username']);
    $fetch = $db->query('SELECT username,password FROM admin WHERE username = ?', $username);
    //&&password_verify($password, $fetch->fetchArray()['password'])
    $rows=$fetch->numRows();
    $fetch=$fetch->fetchArray();
    //if(($rows!=null)&&(password_verify($password, $fetch['password']))){//check email is in db and password is right
    if(($rows!=null)&&(password_verify($password, $fetch['password']))){
        header("location: dashboard.php");
        $_SESSION['admin_logged']=1;
        $_SESSION['username']=$username;
        //$_SESSION
        exit();
    }else{
        $_SESSION['msg']=array("danger","Wrong credentials");
    }
}

?>
<html>
<head>
  <title>Alahq Online</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body class="orange darken-1">
<div  class="row">

  <div id="login_panel" class="card col s12 l4 offset-l4 m8 offset-m2 center">
    <h4>Welcome to Admin Panel</4>

<form action="" method="post">
<?php if(isset($err)){echo "<span style='color:red;font-size:20px'>incorrect pin</span>";}?>
    <p><input type="text" name="username" placeholder="username" style="width:50%" class="input-field"></p>
    <p><input type="password" name="password" placeholder="password" style="width:50%" class="input-field"></p>
    <p><input type="submit" class="btn orange darken-1" value="login"></p>
    <div id="notification"></div>
</form>
  </div>
</div>
</body>
</html>
<script>
<?php if(isset($_SESSION['msg'])){echo "var msg=".json_encode($_SESSION['msg']).";" ;} $_SESSION['msg']="";?>

  for(i=0;i<msg.length/2;i++){
    switch(msg[2*i]){
      case 'danger':
        color="#ffc107";
        break;
      case 'successful':
        color="#28a745";
        break;    
    }
document.getElementById("notification").innerHTML+='<div style="border:solid 2px;padding:5px;color:'+color+';margin:1px">'+msg[2*i+1]+'</div>'
}
</script>
<style>
body{backgound-color:red}
.input-field:focus {
   border-bottom: 1px solid #ffa726 !important;
   box-shadow: 0 1px 0 0 #ffa726 !important
 }
</style>