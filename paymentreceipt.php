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

	$inv = $_GET['invoice'];
    
?>
<?php

    $result3 = mysqli_query($dbC, "SELECT * FROM paymentdetail where invoiceno='$inv'");
        while($row3 = mysqli_fetch_array($result3)){
            $Eemail = $row3['email'];
            $Ename = $row3['custname'];
            $Emobile = $row3['mobile'];
            };
            $ToEmail = 'burhani52@ymail.com'; 
            $EmailSubject = 'Site sale'; 
                      
            $MESSAGE_BODY = "Name: ".$Ename.""; 
            $MESSAGE_BODY .= "\nMobile: ".$Emobile.""; 
            $MESSAGE_BODY .= "\nInvoice No: ".$inv."";
            $MESSAGE_BODY .= "\nEmail: ".$Eemail;

        mail($ToEmail, $EmailSubject, $MESSAGE_BODY) or die ("Failure"); 
   
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
            <div class="w3-padding-12 grey-l3">
    <table >
        <tr  >
            <td class="w3-half" >           
            <!--Logo-->
            <!--<a href="index.php"><img src="images/logo.png" width="300px" height="60px"></a>-->
           <div class="logo" ></div>
            <p class="w3-medium">Select from the Range of Branded Accessory!</p>
            </td>
        <!--====================LOGIN=====================================-->
            <td class="w3-half" >
                        <a href="logout.php"><img align="right" src="images/logout.jpg" alt="Logout" height="40" width="auto"></a>
            <!--<a href="logout.php"><img align="left" src="images/logout.jpg" alt="Logout" height="40" width="auto"></a>-->
            </td>
        </tr>
    </table>
        </div>

</head>

<body class="w3-container" >
 <!--==================MENU=======================-->
 
<!--==================Menu End=======================-->
<!--==================Main Class=======================-->
  <section id="contact">
  <div class="w3-responsive">
    <form id="form2"  name="form2" method="post" >

    <p class="w3-large">Payment Receipt</p>
   
		<?php
        
		   $result = mysqli_query($dbC, "SELECT * FROM paymentdetail where invoiceno='$inv'");
			$uname=$_SESSION['name'][0]['un'];
			//get custid from login table
			$result1 = mysqli_query($dbC, "SELECT custid FROM login WHERE uname='$uname'");
			 $cid = '';
             while($row1 = mysqli_fetch_array($result1)){
				$cid= $row1['custid'];
			}

			//get fname, lname from customer table
			$result2 = mysqli_query($dbC, "SELECT custfname,custlname FROM customer where custid='$cid'");
			 while($row2 = mysqli_fetch_array($result2)){
				$fname= $row2['custfname'];
				$lname= $row2['custlname'];
			}
			   while($row = mysqli_fetch_array($result)){	
		?> 
<div class= "w3-half">        
       <table class="w3-table" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; border:1px solid #D9D5BE;background:white;" >
            <tr >
            <td  width="100" ><b>Invoice No.</b> </td>
            <td width="300"><?php echo $inv; ?></td>
            <td width="150" ><b>Customer Name</b> </td>
            <td colspan="3" width="131"><?php echo ucwords($fname); echo" "; echo ucwords($lname);  ?></td>
          </tr>
          <tr style="border:1px solid #D9D5BE;">
            <td ><b>Date</b></td>
            <td ><?php echo date('d/m/Y', strtotime($row['pdate']));  ?></td>
            <td ><b>Account No. </b></td>
            <td  colspan="3" ><?php echo $cid;  ?></td>
          </tr>
          <tr style="border:1px solid #D9D5BE;">
            <td ><b>Payment</b></td>
            <td ><?php echo $row['cardtype'];  ?> </td>
            <td ><b>Card No. </b></td>
            <td  colspan="3"><?php echo $row['cardnumber'];  ?></td>
          </tr>
		  <?php } ?>

          <tr bgcolor="#FAE1AA" border="#FAE1AA" style="font-weight:bold;">
		  <td style="border:1px solid #D9D5BE;" width="10%" >
          <div align="center" >
              <div align="left"><strong class="style7">Sr. No.</strong></div>
            </div>
            </td>
            <!--<td style="border:1px solid #D9D5BE;" width="10%" ><div align="center" class="style7 style10">
              <div align="left"><strong class="style7">Category</strong></div>
            </div>
            </td>-->
            <td colspan="2" style="border:1px solid #D9D5BE;" width="25%"><div align="center" class="style11">
              <div align="left"><strong class="style7">Product Name</strong> </div>
            </div>
            </td>
            <td style="border:1px solid #D9D5BE;" width="10%" ><div align="center" class="style11">
              <div align="right"><strong class="style7">Qty</strong></div>
            </div>
            </td>
            <td style="border:1px solid #D9D5BE;" width="10%" ><div align="center" class="style11">
              <div align="right"><strong class="style7">Price</strong></div>
            </div>
            </td>
            <td style="border:1px solid #D9D5BE;" width="10%" >
              <div align="right" class="style11"><strong class="style7">Amt</strong>
            </div>
            </td>
          </tr>
		  
		  	  	<?php
		   $result = mysqli_query($dbC, "SELECT * FROM customer_shopping where invoiceno='$inv'");
			$serial=0;
		while($row = mysqli_fetch_array($result)) {
			
			$serial = $serial + 1;
		?>
		  <font color="#add000">
		 <tr style="border:1px solid #D9D5BE;"bgcolor="#FFFFFF">
			<td style="border:1px solid #D9D5BE;"><?php echo $serial ?></td>
           <!-- <td style="border:1px solid #D9D5BE;"><?php //echo $row['prodtype'] ?></td>-->
            <td colspan="2" style="border:1px solid #D9D5BE;"><?php echo $row['prodname'] ?></td>
            <td style="border:1px solid #D9D5BE;"><div align="right"><?php echo $row['qty'] ?></div></td>
            <td style="border:1px solid #D9D5BE;"><div align="right"><?php echo "$" .number_format($row['price'], 2, '.', ''); ?></div></td>
            <td style="border:1px solid #D9D5BE;"><div align="right"><?php echo "$" .number_format($row['qty']*$row['price'], 2, '.', ''); ?></div></td>
		</tr>
		</font>
		
	<?php
     	  }
	?>
		 <tr bgcolor="#FFFFFF">
			<td  align="right" colspan="3"></td>
			<td style="border:1px solid #D9D5BE;" align="right" colspan="2">Total(exl GST)</td>
            <td style="border:1px solid #D9D5BE;" align="right" ><?php echo "$" .number_format(round (get_order_total(),2), 2, '.', ''); ?></td>
            
		</tr>
		
		 <tr bgcolor="#FFFFFF">
			<td  align="right" colspan="3"></td>
			<td style="border:1px solid #D9D5BE;" align="right" colspan="2">GST</td>
            <td style="border:1px solid #D9D5BE;" align="right" ><?php echo "$" .number_format(round(get_order_total() * 0.09,2), 2, '.', ''); ?></td>
            
		</tr>
		
		 <tr  bgcolor="#FFFFFF">
			<td  align="right" colspan="3"></td>
			<td  align="right" colspan="2"><b>Total Amt</b></td>
            <td   align="right" ><b><?php echo "$" .number_format(round(((get_order_total() * 0.09) + get_order_total()),2), 2, '.', ''); ?></b></td>
            
		</tr>
        		<tr>
			<td  colspan="6">
				<form> 
					<input type="button" class="style_button" value="Print Receipt" onClick="window.print()" /> 
				</form>
			</td>
		</tr>
        </table>
               <!--     <div align="center"><p><a href="index.php">&lt;&lt;Back to Home Page</a></p></div>-->
        </div>

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

