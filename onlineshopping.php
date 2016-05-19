<?php
session_start();                  // Start the session
//var_dump($_SESSION);
if (!isset($_SESSION["name"])) { // If session not registered
    define('ADMIN', $_SESSION["name"]); //Get the user name from the previously registered super global variable

    header("location:newlogin.php"); // Redirect to login.php page
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
    $msg = $_GET['uname'];  //GET the message			
	if($_REQUEST['command'] == 'add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		$qty=$_REQUEST['qty'];
		$un=$_REQUEST['un'];
		addtocart($pid,$qty,$un);
		header("location:shoppingcart.php");
		exit();
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
    <table >
        <tr  >
            <td class="w3-half" >           
            <!--Logo-->
            <!--<a href="index.php"><img src="images/logo.png" width="300px" height="60px"></a>-->
            <div class="logo" onclick="window.location.href='index.php'" ></div>

            </td>
        <!--====================LOGIN=====================================-->
            <td style="padding-top:20px;" class="w3-half" >
   <section >                       
                       <form id="formS"  name="formS" method="post" >
                    <input  type="text" name="txtprod" id="txtprod" />
                    <input class="w3-btn" type="submit" name="search" value="Search" />
     <!--               <a href="logout.php"><img align="right" src="images/logout.jpg" alt="Logout" height="40" width="auto"></a>-->
                </form>

   </section >
            </td>
        </tr>
    </table>
    
    <!--JAVASCRIPTS-->
    <script language="javascript">
	function addtocart(pid){
		document.form1.productid.value=pid;		
		document.form1.command.value='add';		
		document.form1.submit();
	}
    
	function textget(q){
		//document.form1.qty.value=parseInt(q);			
		if(isNaN(q)){
		alert("Qty: Only in Integer");
		}
		else{
		document.form1.qty.value=parseInt(q);
		}	}
       
       $(document).ready(function(){
        $(".backup_picture").error(function(){
            $(this).attr('src', "images/frame.jpg");
        });
    }); 
    </script>
</div>
    <!--Header End-->
</head>
<body class= "w3-container" >
    <form name="form1" method="post">
        <input type="hidden" name="productid" />
        <input type="hidden" name="command" />
        <input type="hidden" name="qty"  />
        <input type="hidden" name="un" value="<?php echo "$msg"; ?>" />
    </form>
<!--==================MENU============================-->
<div class = "w3-padding 12" align="center">
    <form id="form2"  name="form2" method="post" >
        <input class="w3-btn" style="background: #959a9e;" type="submit" name="Griffin" value="Griffin" />
        <input class="w3-btn" style="background: #959a9e;" type="submit" name="Logitech" value="Logitech"/>
        <input class="w3-btn" style="background: #959a9e;" type="submit" name="Kaiser_Baas" value="Kaiser Baas"/>
        <input class="w3-btn" style="background: #959a9e;" type="submit" name="Nuance" value="Nuance"/>
        <input class="w3-btn" style="background: #959a9e;" type="submit" name="Wacom" value="Wacom"/>
        <input class="w3-btn" style="background: #959a9e;" type="submit" name="Corel" value="Corel" />
                <input class="w3-btn" type="submit" name="Hot" value="HOT" />
        <input  class="w3-btn" style="background: #959a9e;" type="button" name="logout" value="Logout" onclick="window.location.href='logout.php'" />
      </form>
  </div>  

<!--==================Menu End=======================-->
<!--==================Main Class=====================-->
  
  <section id="contact">
  <div class="w3-responsive">
    <div class="w3-row-padding">
<?php
 //-----------------------------------Brands----------------------------------------------- 
    if(isset($_POST['search'])){
            
            $prod = $_POST['txtprod'];
            $result=mysqli_query($dbC, "select * from product where 
                                    BRAND LIKE '%$prod%' AND
                                    MPN = '$prod' OR
                                    MPN LIKE '%$prod%' OR
                                    BRAND LIKE '%$prod%' OR
                                    prodname LIKE '%$prod%' OR
                                    prodtype LIKE '%$prod%' OR
                                    description LIKE '%$prod%' order by qty");
    if (!$result) {
            printf("Error: %s\n", mysqli_error($dbC));
            exit();
} }
    else if(isset ($_POST['Griffin'])){
            $result=mysqli_query($dbC, "select * from product WHERE BRAND = 'Griffin' order by qty");
            }
    else if(isset ($_POST['Logitech'])){
            $result=mysqli_query($dbC, "select * from product WHERE BRAND = 'Logitech' order by qty");
            }
    else if(isset ($_POST['Kaiser_Baas'])){
            $result=mysqli_query($dbC, "select * from product WHERE BRAND = 'Kaiser Baas' order by qty");
            }
    else if(isset ($_POST['Corel'])){
            $result=mysqli_query($dbC, "select * from product WHERE BRAND = 'Corel' order by qty");
            }
    else if(isset ($_POST['Nuance'])){
            $result=mysqli_query($dbC, "select * from product WHERE BRAND = 'Nuance' order by qty");
            }
    else if(isset ($_POST['Wacom'])){
            $result=mysqli_query($dbC, "select * from product WHERE BRAND = 'Wacom' order by qty");
            }
    else if(isset ($_POST['Hot'])){
            $result=mysqli_query($dbC, "select * from product order by qty");
            }
    else    {
            $result= mysqli_query($dbC, "select * from product order by qty");
            }            
            
            $i = 1;  //The following logic only works if $i starts at '1'.
			$numofcols = 3; //Represents the number of columns you want in the table.
			echo'<div class="w3-row-padding">';
            echo '<table  class="w3-bordered w3-hoverable" >'; //Open table.
            while($row = mysqli_fetch_array( $result )) {
              if ($row['Approved'] =='No'){
                    continue;
                    }
			  else{
				//If it's the beginning of a row...
				if( $i % $numofcols == 1 ){
				  echo '<tr align="left">'; //Open row
				}
				//Table Cell.
				echo '<td class="w3-third"  >'; //Open Cell
				echo '<div style="height:40px; margin-top:10px;"><p><span class="w3-large" >'; echo '<b>'.$row['BRAND'].'</b></span>';
                //echo '&nbsp('.$row['MPN'].')';
                echo'</p></div>';
                echo '<div><img class="backup_picture" src="product/'.$row['MPN'].'.jpg"  height=200 width=200 alt="Dealaway"></div> <br/>';
				echo "<div id='desc'>Price:<big style='color:red;font-weight:bold'> $"; echo $row['price']; echo"</big><br />";
				echo $row['description'].'</div>';
				echo '<input  type="text" name=$row[prodid] onChange=textget(this.value); placeholder="Enter Quantity" size="10"/>&nbsp';
				echo '<input type="hidden" name=$row[prodid]  value=$row[prodtype] size="10"  />';
				echo '<input class="w3-btn" type="button" onclick= addtocart('.$row['prodid'].') value="Add to Cart">';
                echo '</td>'; //Close Cell
				//If we have already placed enough cells, close this row.
				if( $i % $numofcols == 0) {
				  echo '</tr>'; //Close Row.
				}
				//Now that we've made a table-cell, lets increment our counter.
                    $i = $i + 1;
			  }
			}
			//So we make sure to close our rows if there are any orphaned cells
                if( ($i % $numofcols) > 0){
                    echo '</tr>';
			}
            echo '</table>'; //Close Table 
            echo'</div>';
        ?>
    </div>
    </div>
    </section>
<!--======Main Class End==================-->
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