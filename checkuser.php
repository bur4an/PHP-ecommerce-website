<?php
define(DOC_ROOT,dirname(__FILE__)); // To properly get the config.php file
$username = $GET['uname']; //Set UserName

    include(DOC_ROOT.'/config.php'); //Initiate the MySQL connection

   $sql="SELECT `uname` FROM login WHERE `uname`='".$username."'";
    $result=mysqli_query($dbC, $sql);
    // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result);
	
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1){

        header("location:newlogin.php?msglogin=Please enter some username and password");
    }
    
?>


<?php
define(DOC_ROOT,dirname(__FILE__)); // To properly get the config.php file
$username = $_POST['uname']; //Set UserName
$password = $_POST['pword']; //Set Password
$msg ='';
if(isset($username, $password)) {
    ob_start();
    include(DOC_ROOT.'/config.php'); //Initiate the MySQL connection
    // To protect MySQL injection (more detail about MySQL injection)
  //  $myusername = stripslashes($username);
  //  $mypassword = stripslashes($password);
  //  $myusername = mysqli_real_escape_string($dbC, $myusername);
  //  $mypassword = mysqli_real_escape_string($dbC, $mypassword);
  //  $sql="SELECT * FROM login WHERE uname='$myusername' and pword='$mypassword'";
   $sql="SELECT * FROM login WHERE uname='$username' and pword='$password'";
    $result=mysqli_query($dbC, $sql);
    // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result);
	
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1){
        // Register $myusername, $mypassword and redirect to file "admin.php"
        session_register("user");
        session_register("password");
        $_SESSION['name']= $username;
        header("location:onlineshopping.php");
    }
    else {
        $msg = "Wrong Username or Password";
        echo($count);
		header("location:index.php?msg=$msg");
		
    }
    ob_end_flush();
}
else {
    header("location:index.php?msg=Please enter some username and password");
}
?>