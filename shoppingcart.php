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

    include("config.php");
    //include("includes/db.php");
    include("includes/functions.php");
   error_reporting(0);
	if($_REQUEST['command']=='delete' && $_REQUEST['productid']>0){
		remove_product($_REQUEST['productid']);
	}
	/*else if($_REQUEST['command'] =='clear'){
		unset($_SESSION['name']);
	}*/
	else if($_REQUEST['command']=='update'){
	$max=count($_SESSION['name']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['name'][$i]['productid'];
			//$q=$pid;
			$q=intval($_REQUEST['qty']);
			if($q>0 && $q<=999){
				$_SESSION['name'][$i]['qty']=$q;
			}
			else{
				$msg='Products not updated!, quantity must be a number between 1 and 999';
			}}}
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
    <table>
        <tr>
            <td class="w3-half" >           
            <!--Logo-->
            <div class="logo" ></div>
            <p class="w3-medium">Select from the Range of Branded Accessory!</p>
            </td>
        <!--====================LOGIN=====================================-->
            <td class="w3-half" >
             <!--<a href="logout.php"><img align="left" src="images/logout.jpg" alt="Logout" height="50" width="100"></a>-->
            </td>
        </tr>
    </table>
    
    <script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.productid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
    	function textget(q){
		//document.form1.qty.value=parseInt(q);			
		if(isNaN(q)){
		alert("Qty: Only in Integer");
		}
		else{
		document.form1.qty.value=parseInt(q);
		}	
	}
	function update_cart(){
        //document.form1.productid.value=pid;
        document.form1.command.value='update';
		document.form1.submit();
	}
	function open_paymentdetail(){
		window.location='paymentdetail.php';
	}
    
    function textget(q){
		//document.form1.qty.value=parseInt(q);			
		if(isNaN(q)){
		alert("Qty: Only in Integer");
		}
		else{
		document.form1.qty.value=parseInt(q);
		}	}
    </script>
    </div>
    <!--Header End-->
</head>
<body class="w3-container">
        <form name="form1" method="post">
            <input type="hidden" name="productid" />
            <input type="hidden" name="command" />
            <input type="hidden" name="qty"  />
        </form>

<!--==================Main Class=======================-->
  <section id="contact" >
  <div class="w3-responsive"> 
        <form id="form2" name="form2" method="post" >
            <input  type="button" width="400" value="Shop More >" onclick="window.location='onlineshopping.php'" /> 
<p align="left" class="w3-large">Your Shopping Cart</p>            
           	
            <div style="color:#111111"><?php echo $msg; ?></div>
<div class="w3-half"> 
            <table class="w3-table" border="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; background-color:#E1E1E1">
            <?php
			if(is_array($_SESSION['name'])){     
            	echo   '<tr  bgcolor="#A57309" style="font-weight:slim; text-align:right;">
                            <td width=10% style="text-align:left;"><span style="color:white">Serial</span></td>
                            <td width=50% style="text-align:left;"><span style="color:white">Name</span></td>
                            <td width=10%><span style="color:white">Price</span></td>
                            <td width=10%><span style="color:white">Qty</span></td>
                            <td width=10%><span style="color:white">Amount</span></td>
                            <td width=10%><span style="color:white">Options</span></td>
                        </tr>';
                     
				$max=count($_SESSION['name']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['name'][$i]['productid'];
					$q=$_SESSION['name'][$i]['qty'];
				
					$pname=get_product_name($pid);
					$ptype = get_product_type($pid);
								
					if($q==0) continue;
					echo"<tr bgcolor='#FFFFFF'><td text-align='left'><span style='color:black'>"; echo $i+1; echo"</span></td>";
					echo"<td ><span style='color:black'>"; echo $pname;   echo"</span></td>";
					echo"<td align=right><span style='color:black'>$"; echo number_format(get_price($pid), 2, '.', ''); echo"</span></td>";
					echo "<td align=right><span style='color:black'>"; echo '<input type="text" value='.$q.' onChange=textget(this.value);>';  echo "</span></td>";			
					echo "<td align=right><span style='color:black'>$"; echo number_format(get_price($pid)*$q, 2, '.', ''); echo"</span></td>";
					echo "<td align=center>"; echo'<a href="javascript:del('.$pid.')"> <img src=images/delete.png alt="delete" /></a>'; echo"</td>";					
			}
					
				echo "<tr><td colspan='2' align='right'>";
				echo "<span style='color:black;font-size:14px;font-family: Arial;'>";
				echo "<td colspan=2 align=right><span style='color:black;'>Total(exl GST)</span></td>"; 
		 		echo "<td align=right><span style='color:black;'>"; echo "$" . number_format(round(get_order_total(),2), 2, '.', ''); echo "</span></td>";
				echo "<td></td>";
				
				echo "<tr><td colspan='2' align='right'></td>";
				echo "<td colspan=2 align=right><span style='color:black;'>"; echo "GST"; echo "</span></td>";
				echo "<td align=right><span style='color:black;'>"; echo "$" . number_format(round(get_order_total() * 0.09,2), 2, '.', '');
				echo "</span><td></td>";
				
				echo "<tr><td colspan='2' align='right'>";
				//echo '<input type="button" value="Clear Cart" class="w3-btn" onclick="clear_cart()">&nbsp';  
				echo '<input type="button" value="Update Cart" class="w3-btn" onclick="update_cart()">';  

				echo '<input type="button" class="w3-btn" value="Place Order" onclick="open_paymentdetail()">';
				echo "</td>";
				echo "<td colspan=2 align=right ><span style='color:black;font-weight:bold'>Total Amt</span></td>"; 
				echo "<td align=right><span style='color:green;font-weight:bold'>"; 
					echo "$" . number_format(round(((get_order_total() * 0.09) + get_order_total()),2), 2, '.', ''); echo "</span></td>";
					echo "<td></td>";
				echo"</b></td>";	
			?>
			<?php
            }
			else{
				echo "<tr bgColor='#FFFFFF' border=1><td>There are no items in your shopping cart!</td>";
			}
			?>
        </table> 
    </div>     
        </form>
        </div>
        </section>

<!--======Main Class End==================-->
<!--======Footer =========================-->
<div class=" w3-padding-16 grey-l3" align="center">
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