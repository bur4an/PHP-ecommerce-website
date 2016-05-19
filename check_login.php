<?php
session_start();
session_id();
define('DOC_ROOT',dirname(__FILE__)); // To properly get the config.php file
$username = $_POST['uname']; //Set UserName
$password = $_POST['pword']; //Set Password
$msg = "";
if(isset($username, $password)) {
    ob_start();
    include(DOC_ROOT.'/config.php'); //Initiate the MySQL connection	
	if($username == 'admin'){
			$sql="SELECT * FROM login WHERE uname='admin' and pword='$password'";
			$result=mysqli_query($dbC, $sql);
			$count=mysqli_num_rows($result);
			if($count==1){
			//Register $myusername, $mypassword and redirect to file "admin.php"
			  $_SESSION['user']= $username;
			  $_SESSION['password']= $password;  
			   header("location:dailyreport.php");
			}
			else {
				$msg = "Wrong Username or Password";
				echo($count);
				header("location:index.php?msg=$msg");
			}
	
	}
	else{
            // To protect MySQL injection (more detail about MySQL injection)               
            $myusername = mysqli_real_escape_string($dbC, $username);
            $mypassword = mysqli_real_escape_string($dbC, $password);
            $sql="SELECT * FROM login WHERE uname='$myusername' and pword='$mypassword'";
			$result=mysqli_query($dbC, $sql);
			$count=mysqli_num_rows($result);

			if($count==1){
				// Register $myusername, $mypassword and redirect to file
                $_SESSION['user']= $username;
                $_SESSION['password']= $password;
                $_SESSION['name']= $username;
			   header("location:onlineshopping.php?uname=$username");
			}
			else {
				$msg = "Wrong Username or Password";
				echo($count);
				header("location:index.php?msg=$msg");
			}
	}
    ob_end_flush();
	
}
else {
    header("location:index.php?msg=Enter Username");
}
?>
<?php
//get tmpusername when forgot password button pressed from index.php
/*define('DOC_ROOT',dirname(__FILE__)); // To properly get the config.php file
$tempuname = $_POST['tempuname']; //Set UserName

if(isset($tempuname)) {
  
  include(DOC_ROOT.'/config.php'); //Initiate the MySQL connection
    
   $sql="SELECT secretque1,secretans1,secretque2,secretans2 FROM login WHERE uname='$tempuname'";
    $result=mysqli_query($dbC, $sql);
    
    $count=mysqli_num_rows($result);
    
    if($count==1){
    header("location:forgetpassword.php?txtuname=$tempuname");
	}    
}*/
?>

