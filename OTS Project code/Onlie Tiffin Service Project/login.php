<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login</title>
</head>
<style>
	.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5px auto; /* 15% from the top and centered */
    border: 1px solid #888;
    width: 40%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    /* Position it in the top right corner outside of the modal */
    position: absolute;
    right: 25px;
    top: 0; 
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

/* Close button on hover */
.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>

	<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<body>

<!-- The Modal -->
<div id="id01">
  <!-- Modal Content -->
<form method="post">
<center>
    <div>
      <img src="images/loginicon.png" alt="Avatar" class="avatar" height="250px" width="250px">
    </div>
	<br />
    <div style="height:30%; width:50%;"> 
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="txtusername" required width="20%" height="3%">
	  <br />
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="txtpassword" required width="20%" height="3%"><br /><br />
      <input type="submit" name="lgnbtn" value="Login">    </div>
	</center>
</form>
</div>
</body>
</html>
<?php
    session_start();
    require_once('./config.php');
    $message1="";
	if(isset($_POST)&& !empty($_POST)){
        print_r($_POST);
        $user=stripslashes(mysql_real_escape_string(trim($_POST['txtusername'])));
        $pass=stripslashes(mysql_real_escape_string(trim($_POST['txtpassword'])));
        $sql="select * from user_tbl where username = '{$user}' limit 1";
        $result=mysql_query($sql);
        if($row=mysql_fetch_assoc($result)){
            if($row['password']==$pass){
                session_unset();
				header("Location: order.php");
            }else{
                    $message1="Wrong Password";
            }
        }else{
            $message1="User with Email-ID {$user} does not exist";
        }
    }
?>


	