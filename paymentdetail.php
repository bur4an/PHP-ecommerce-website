<?php
session_start();                  // Start the session
if (!isset($_SESSION["name"])) { // If session not registered
    define('ADMIN', $_SESSION["name"]); //Get the user name from the previously registered super global variable
    header("location:index.php"); // Redirect to login.php page
    exit;                         // Stop execution of current script
} else {
    header('Content-Type: text/html; charset=utf-8');
}
?>
<?php
	//include("includes/db.php");
	include("includes/functions.php");
    include("config.php");

	if(isset($_REQUEST['command'])&&$_REQUEST['command']=='submit'){
		
		$nameoncard=$_REQUEST['txtnameoncard'];
		$cardtype=$_REQUEST['drpcardtype'];
		$cardno=$_REQUEST['txtcardno'];
		$expirymmyyyy=$_REQUEST['txtexpirymmyyyy'];
		$verification=$_REQUEST['txtverification'];
		$billamt= (0.09 * get_order_total()) + get_order_total();
		$delivery=$_REQUEST['drpdelivery'];
		$custname=$_REQUEST['txtcustname'];
		$custadd=$_REQUEST['txtaddress'];
		$mobile=$_REQUEST['txtmobile'];
		$email=$_REQUEST['txtemail'];

		$result = mysqli_query($dbC, "SELECT * FROM paymentdetail");
		$invoiceno = mysqli_num_rows($result)+1;
		$date=date('Y-m-d');
		//mysqli_query("delete from paymentdetail");
		$result=mysqli_query($dbC,"insert into paymentdetail 
		(invoiceno, pdate, nameoncard,cardtype, cardnumber, expirydate, verificationcode, billamt, delivery, custname, custadd, mobile, email)values
		('$invoiceno','$date','$nameoncard', '$cardtype','$cardno', '$expirymmyyyy','$verification','$billamt', '$delivery', '$custname', '$custadd', '$mobile','$email')");
		//$customerid=mysqli_insert_id();
	//	$result=mysqli_query("insert into customer_shopping (invoiceno, invoicedate ) values('$invoiceno','$date')");
		//$orderid=mysqli_insert_id();
		$max=count($_SESSION['name']);
	//	mysqli_query("delete from customer_shopping");
		for($i=0;$i<=$max-1;$i++){
			$pid=$_SESSION['name'][$i]['productid'];
			$q=$_SESSION['name'][$i]['qty'];
			$ptype=get_product_type($pid);
			$pname=get_product_name($pid);
			$price=get_price($pid);
			//$un=$_SESSION['name1'];
			$un=$_SESSION['name'][$i]['un'];
			$customerid=get_cust_id($un);
				
			if(strlen($customerid) > 0) {
				$temp = $customerid;
			mysqli_query($dbC, "insert into customer_shopping (invoiceno,invoicedate,custid, prodtype,prodname,qty, price) values 
			('$invoiceno','$date','$customerid','$ptype','$pname','$q','$price')");	
			}else
			{		
			mysqli_query($dbC, "insert into customer_shopping (invoiceno,invoicedate,custid, prodtype,prodname,qty, price) values 
			('$invoiceno','$date','$temp','$ptype','$pname','$q','$price')");
            //
			}		
			$result = mysqli_query($dbC, "SELECT qty FROM product WHERE prodid='$pid'");
            if (!$result) {
    printf("Error: %s\n", mysqli_error($dbC));
    exit();
}
			while($row = mysqli_fetch_array($result))
			{
				$qq = $row['qty'] - $q;
			mysqli_query($dbC,  "UPDATE product SET qty=$qq WHERE prodid='$pid'")
			or die(mysqli_error());  
			}	
		}
		header("location:paymentreceipt.php?invoice=$invoiceno");
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
    <meta charset="UTF-8">
    <!--TITLE-->
    <title>Dealaway ! Branded IT Accessories</title>
    
    <!--For Resposive Page-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--CSS-->
    <link rel="stylesheet" href="w3css/w3.css">
    <link rel="stylesheet" href="style.css">
          <link rel="stylesheet" type="text/css" href="includes/contact_style.css" />
   
    <!--JAVASCRIPT-->
    <script type="text/javascript" src="file.php"></script>
    <script src="function.js" type="text/javascript"></script> 
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>    

    <!--Header Starts--> 
        <div class="w3-padding-12 grey-l3">
            <div class="logo" ></div>
            <p class="w3-medium">Select from the Range of Branded Accessory!</p>
        </div>
<script language="javascript">
		function validate(){
		//var txtprodid = document.getElementById('txtprodid');
		var txtnameoncard = document.getElementById('txtnameoncard');
		var txtcardno = document.getElementById('txtcardno');
		var txtexpirymmyyyy = document.getElementById('txtexpirymmyyyy');
		var txtverification = document.getElementById('txtverification');
		var txtcustname = document.getElementById('txtcustname');
		var txtaddress = document.getElementById('txtaddress');
		var txtmobile = document.getElementById('txtmobile');
		var txtemail = document.getElementById('txtemail');
		
		if(notEmpty(txtnameoncard, "Enter Name on card")){
		if(isAlphabet1(txtnameoncard,"Name on card: Only Alphabets")){
		if(maxLen(txtnameoncard,20,"Name on Card")){
		
			if(notEmpty(txtcardno, "Enter Card Number")){
			if(isNumeric(txtcardno,"Card Number: Only Number")){
			if(maxLen(txtcardno,16,"Card No")){
			
				if(notEmpty(txtexpirymmyyyy, "Enter Card Expiry MM/YY")){
				if(maxLen(txtexpirymmyyyy,5,"Expiry MMYYYY")){
				
				if(notEmpty(txtverification, "Enter Verification")){
				if(isNumeric(txtverification,"Verification Code: Only Number")){
				if(maxLen(txtverification,3,"Verification")){
				
				if(notEmpty(txtcustname, "Enter Customer Name")){
				if(isAlphabet1(txtcustname,"Customer Name: Only Alphabets")){
				if(maxLen(txtcustname,15,"Customer Name")){
				
				if(notEmpty(txtaddress, "Enter Customer Address")){
				if(maxLen(txtaddress,50,"Customer Address")){
				
				if(notEmpty(txtmobile, "Enter Mobile No")){
				if(isNumeric(txtmobile,"Mobile Number: Only Number")){
				if(maxLen(txtmobile,10,"Mobile")){
				
					if(emailValidator(txtemail,"Invalid Email Address")){
					if(maxLen(txtemail,25,"Email")){
							document.form1.command.value='submit';
							
							document.form1.submit();
							return true;
		}}}}}}}}}}}}}}}}}}}}}

		return false; 	
	}
	
</script>
</head>

<body class="w3-container">
<!--==================MENU=======================-->

<!--==================Menu End=======================-->
<!--==================Main Class=======================-->

  <section id="contact">
  <div class="w3-responsive">  
<form name="form1" onsubmit="return validate()">
<input type="hidden" name="command" />
    <p class="w3-xlarge">Payment Detail </p>
<hr />
        <table width="398" border="0">
		  <tr>
            <td class="style12">Billing Amount </td>
            <td>
			<span style='color:black;font-weight:bold'>
			<?php echo "$" . round (((get_order_total() * 0.09) + get_order_total()),2); ?>
			</span>
			</td>
          </tr>
          <tr>
            <td width="122"><span class="style12">Name on Card </span></td>
            <td width="260"><input name="txtnameoncard" type="text" id="txtnameoncard" /></td>
            </tr>
          <tr>
            <td class="style12">Card Type </td>
            <td>
              <select name="drpcardtype" id="drpcardtype">
                  <option>Visa</option>
                  <option selected="selected">Master Card</option>
                  <option>American Express</option>
              </select>
           </td>
            </tr>
          <tr>
            <td class="style12">Card Number </td>
            <td><input name="txtcardno" type="text" id="txtcardno" /></td>
            </tr>
          <tr>
            <td class="style12">Expire (MM/YY)</td>
            <td><input  type="text" name="txtexpirymmyyyy" id="txtexpirymmyyyy" size="3" /></td>
          </tr>
          <tr>
            <td class="style12">Verification Code </td>
            <td><input name="txtverification" type="text" id="txtverification" size="3" /></td>
          </tr>
        
          <tr class="style12">
            <td colspan="2" class="style11" ></td>
            </tr>
          <tr>
            <td class="style12">Delivery</td>
            <td><select name="drpdelivery" id="drpdelivery">
              <option value="1">Home Delivery</option>
              <option value="2">Pick-up</option>
                        </select></td>
          </tr>
          <tr>
            <td class="style12">Customer Name </td>
            <td><input name="txtcustname" type="text" id="txtcustname"  /></td>
          </tr>
          <tr>
            <td class="style12">Address</td>
            <td><input name="txtaddress" type="text" id="txtaddress" /></td>
          </tr>
          <tr>
            <td class="style12">Mobile</td>
            <td><input name="txtmobile" type="text" id="txtmobile"  /></td>
          </tr>
		            <tr>
            <td class="style12">E-mail</td>
            <td><input name="txtemail" type="text" id="txtemail"  /></td>
          </tr>
          <tr>
            <td colspan="2" class="style12"></td>
            </tr>
          <tr>
            <td colspan="2" class="style12"><div align="left">
              <input type="submit" class="form_subheading" id="submit" value="submit" />
              <input type="button"  id="cancel" value="Cancel" onclick="window.location.href='check_login.php'" />
            </div></td>
          </tr>
        </table>
</form>
    </div>
</section>

<!--======Footer =========================-->
<div class=" w3-padding-12 grey-l3" align="center">
            <a href="index.php">Home</a> |
            <a href="ourcompany.html">Our Company </a> |
            <a href="searchproduct.php">Search Product </a> |
            <a href="contact.php">Contact Us</a>
            <br /> &copy; DealAway Pty Ltd. All Rights Reserved
            <br />ABN.
</div>
<!--======Footer End =======================-->
</body>
</html>
