<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Dealaway ! Branded IT Accessories</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    
    <link rel="stylesheet" href="w3css/w3.css">
    <link rel="stylesheet" href="style.css">
    
<div class="header">
        <div class="w3-padding-64 grey-l3">
            <div class="logo" onclick="window.location.href='index.php'"></div>
            <p class="w3-large">Select from the Range of Branded Accessory!</p>
        </div>
     <script src="function.js" type="text/javascript"></script>     

     <script type="text/javascript">
        formRegistrationValidator
        function formValidator(){

            var secans1 = document.getElementById('txtsecretans1');
            var secans2 = document.getElementById('txtsecretans2');

            if(notEmpty(secans1, "Enter Secret Answer1")){
            if(maxLen(secans1,20,"secans1")){
                if(notEmpty(secans1, "Enter Secret Answer1")){
                if(maxLen(secans1,20,"secans1")){
                    return true;
            }}}}
            return false; 	
        } //main function ends here
    </script>
</div>
</head>

<body class="w3-container">
    <div class = "menu">
    </div>
    <div class="main">
	<?php
//error_reporting(0);
	//$txtusername = $_GET['txtuname'];  //GET the message
	//if($txtusername!='') echo '<p>'.$txtusername.'</p>'; //If message is set echo it
	
	include("config.php");
	
	$result = mysqli_query( $dbC, "SELECT `secretque1`,`secretans1`,`secretque2`,`secretans2`,`pword` FROM login WHERE `uname`='".$txtusername."'");
	$count = mysqli_num_rows($result);

		while($row = mysqli_fetch_array($result)) {
		  $q1 = $row['secretque1'];
		  $a1 = $row['secretans1'];
		  $q2 = $row['secretque2'];
		  $a2 = $row['secretans2'];
		  $p  = $row['pword'];
		}
    	if($count==1){
     header("location:forgetpassword.php?");
	}
	?>
	<?php
        
if(isset($_POST['butformsubmit'])){
    $txtsecretans1 = $_POST['txtsecretans1'];
	$txtsecretans2 = $_POST['txtsecretans2'];
	$restorepassword ="Wrong SecretAnswer1 or SecretAnswer2";
		
include("config.php");
	$txtusername1 = $_GET['txtuname']; 
	
	$result = mysqli_query( $dbC,"SELECT `secretque1`,`secretans1`,`secretque2`,`secretans2`,`pword` FROM login WHERE `uname`='".$txtusername1."'");
	$count = mysqli_num_rows($result);
	

		while($row = mysqli_fetch_array($result)) {
		   $que1 = $row['secretque1'];
		  $ans1 = $row['secretans1'];
		  $que2 = $row['secretque2'];
		  $ans2  = $row['secretans2'];
          $p= $row['pword'];
		  $pw= "Your Password is: " .$row['pword'];
		}
	
		
	
	if($txtsecretans1 == $ans1 && $txtsecretans2 == $ans2){
		header("location:forgetpassword.php?resp=$pw&u=$txtusername1&q1=$que1&q2=$que2");
		
	}
	else{
	header("location:forgetpassword.php?resp=$restorepassword&u=$txtusername1&q1=$que1&q2=$que2");
	}
	}
?>
        <div align="center"><p><a href="index.php">&lt;&lt;Back to Home Page</a></p></div>

        <div class="w3-large">Security Question </div>
      <table width="625" border="0">
	  <form id="form1" name="formforgetpassword" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit='return formValidator();'>
        <tr>
          <td height="9%" colspan="3"></td>
          </tr>
      <tr>
        <td height="9%" colspan="3"></td>
      </tr>
      <tr>
        <td height="9%" colspan="2" class="form_text"><span class="form_subheading1">Username</span></td>
        <td height="9%" class="form_text">
		<span class="form_subheading1">
		<?php
			$u = $_GET['u'];  //GET the message
			if($u!='') echo '<p>'.$u.'</p>'; //If message is set echo it
			?>
			</span></td>
      </tr>
      <tr>
        <td height="9%" colspan="2" class="form_text">	
		<span class="form_subheading1">
			<?php
			$q1 = $_GET['q1'];  //GET the message
			if($q1!='') echo '<p>'.$q1.'</p>'; //If message is set echo it
			?>
		</span>
			</td>
        <td height="9%" class="form_text"><input name="txtsecretans1" type="text" id="txtsecretans1" size="25" value="" /></td>
        </tr>
      <tr>
        <td height="9%" colspan="2" class="form_text">
		<span class="form_subheading1">
		<?php
			$q2 = $_GET['q2'];  //GET the message
			if($q2!='') echo '<p>'.$q2.'</p>'; //If message is set echo it
		?>
		</span>
			</td>
        <td height="9%" class="form_text"><input name="txtsecretans2" type="text" id="txtsecretans2" size="25" value=""/></td>
        </tr>
      <tr>
        <td height="0%" colspan="3"></td>
      </tr>
      <tr>
        <td height="22%" colspan="3"><label>
		<span>
		<font color="#FF0000">
	
		<?php
            error_reporting(0);
			$resp = $_GET['resp'];  //GET the message
			if($resp!='') echo '<p>'.$resp.'</p>'; //If message is set echo it
		?>
		</font>
			</span>
          </label>        </td>
      </tr>
      <tr>
        <td height="22%" colspan="3">
          
          <div align="center">
            <input name="butformsubmit" type="submit" id="butformsubmit"  value="Submit"  />
			</div>
          </td></tr>
          </form>
  </table>
    </div>
  
<!--======Main Class End==================-->
<!--======Footer =========================-->
   <div class="footer">
        <div class=" grey-l3">
            <a href="index.php">Home</a> |
            <a href="ourcompany.html">Our Company </a> |
            <a href="searchproduct.php">Search Product </a> |
            <a href="contact.php">Contact Us</a>
            <br /> &copy; DealAway Pty Ltd. All Rights Reserved
            <br />ABN.
        </div>
    </div>
<!--======Footer End =======================-->
</body>
</html>
