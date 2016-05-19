<?php
    include("config.php");
    
    //login table data
    $txtcustid=$_POST['txtcustid'];
    $txtusername=$_POST['uname'];
    $txtpassword=$_POST['pword'];
   /* $drpsecretque1=$_POST['drpsecretque1'];
    $txtsecretans1=$_POST['txtsecretans1'];
    $drpsecretque2=$_POST['drpsecretque2'];
    $txtsecretans2=$_POST['txtsecretans2'];*/

    //customer table data

    $txtfname=$_POST['txtfname'];
    $txtlname=$_POST['txtlname'];
    /*$optgender=$_POST['optgender'];
    $txtdob=$_POST['txtdob'];
    $txtstreetname=$_POST['txtstreetname'];
    $txtsuburb=$_POST['txtsuburb'];
    $txtpostcode=$_POST['txtpostcode'];
    $txtphone=$_POST['txtphone'];
    $txtmobile=$_POST['txtmobile'];*/
    $txtemail=$_POST['txtemail'];

//convert dd/mm/yyyy to yyyy/mm/dd for MySql Database 
//list($day, $month, $year) = split('[/]', $txtdob); 
//$txtdob = "$year-$month-$day"; 

	$result = mysqli_query($dbC, "SELECT `uname` FROM login WHERE `uname`='".$txtusername."'");
	$count = mysqli_num_rows($result);
	
	if($count==1){
        header("location:newlogin.php?msglogin=Username already exist");
    }
	else{
	mysqli_query ($dbC, "INSERT INTO login (custid, uname, pword) VALUES 
	('$txtcustid', '$txtusername','$txtpassword')");

	mysqli_query ($dbC, "INSERT INTO customer 
			(custid, custfname, custlname, custemail) VALUES 
		('$txtcustid', '$txtfname', '$txtlname','$txtemail')");
	mysqli_close($dbC);
    $msg="Please login to continue";
	header("location: index.php?msg=$msg");
	}
?>


