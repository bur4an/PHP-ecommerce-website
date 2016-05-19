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
    <div class="w3-padding-12 grey-l3" >
    <table align = "center" >
        <tr  >
            <td class="w3-half">           
            <!--Logo-->
            <div class="logo" onclick="window.location.href='index.php'"></div>
            <p><i><a href="newlogin.php" class="w3-medium">Register Now</a> to select from the Range of Branded Accessories !</i><p>
            <!--<form id="form1"  name="form1" method="post" action="onlineshopping.php">
                <input class="tbS" type="text" name="txtprod" id="txtprod" />
                <input  class="btn" type="submit" name="search" value="Search" height="30" width="70"/>
            </form>-->
            </td>
        <!--====================LOGIN=====================================-->
            <td style="padding-top:10px;" class="w3-half" >
            <!--<div class="w3-large">Login</div>-->
   <section >
        <form align="center" name="formlogin" id="cform" method="post" action="check_login.php" onsubmit='return formLoginValidator();'>
        <input class="" id="uname" name="uname" type="text" size="8" placeholder="Enter Username" onchange="formusergetvalue();"/>
              <input class="" id="pword" name="pword" type="password" placeholder="Enter Password" size="8"/><br />
              <input class="w3-btn" font="20px" name="butSubmit" type="submit" id="butSubmit" value="Login" />&nbsp;OR&nbsp;
              <input class="w3-btn" font="20px" name="butRegister" type="button" id="butRegister" value="Register" onclick="window.location.href='newlogin.php'" />
              <font color="#990000">
                <?php error_reporting(0);                
                $msg = $_GET['msg'];if($msg != '') echo '<br />'.$msg; 
                ?></font>
        </form> 
           <!--                 <div class="w3-large">    </div>   --> 
   </section>
               <!-- <form align="left" name="formuser" id="formuser" method="post" action="check_login.php" >
                <input id="tempuname" name="tempuname" type="hidden" size="8"  />
                <input   name="forgetpass" type="submit" id="butSubmit" value="Get Password" width="350px"/>
                </form>-->
            </td>
        </tr>
    </table>
    
    <!--JAVASCRIPTS-->
    <script language="javascript">
    //Login Form Validator
    function formLoginValidator(){
	var uname = document.getElementById('uname');
	var pword = document.getElementById('pword');
	if(notEmpty(uname, "Enter User Name")){
		if(maxLen(uname,10,"User Name")){
			if(notEmpty(pword, "Enter Password")){
				if(maxLen(pword,10,"Password")){
					return true;
				}}}}
	return false;	
    }
    //Get username for forgetpassword.php
    function formusergetvalue(){
        document.formuser.tempuname.value = document.getElementById('uname').value;
    }
    
           $(document).ready(function(){
        $(".backup_picture").error(function(){
            $(this).attr('src', "images/frame.jpg");
        });
    }); 
    </script>
    <!--Javascript End-->
    </div>
    <!--Header End-->
</head>
<body class="w3-container" >
<!--==================MENU============================-->
<!--<div class = "w3-padding 12">
    <form id="form2"  name="form2" method="post" action="onlineshopping.php">
    <div align="left"> 
        <input class="btn" type="submit" name="Griffin" value="Griffin" />
        <input class="btn" type="submit" name="Logitech" value="Logitech"/>
        <input class="btn" type="submit" name="Kaiser_Baas" value="Kaiser Baas"/>
        <input class="btn" type="submit" name="Nuance" value="Nuance"/>
        <input class="btn" type="submit" name="Wacom" value="Wacom"/>
        <input class="btn" type="submit" name="Corel" value="Corel" />
    </div>  
    </form>
</div>-->
<!--==================Menu End=======================-->
<!--==================Main Class=======================-->
        <!--<div class="w3-row-padding" >  
  <div class="w3-third" >
              <h4>Step 1</h4>
                <p>Register and create an account to enjoy shopping !</p>
                <hr />
            </div>
            <div class="w3-third" >
              <h4>Step 2</h4>
                <p >Pay with your credit or debit card !</p>
                <hr />
            </div>
             <div class="w3-third " >
              <h4>Step 3</h4>
                <p>Order will be posted in 3 days across Australia !</p>
                <hr />
            </div> 
        </div>-->
 <section id="contact">
<div class="w3-responsive">  
      <div align="center"> <img  src="images/Hot_Deals.jpg" alt="Hot Deals" height="30" width="auto"></div>
        <div class="w3-row-padding" >
<?php
    include("config.php");
 //-----------------------------------Brands----------------------------------------------- 

            $result= mysqli_query($dbC, "select * from product order by qty");          
            
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
				echo '<div><img class = "backup_picture" src="product/'.$row['MPN'].'.jpg"  height="200" width="200" ></div> <br/>';
				echo "<div id='desc'>Price:<big style='color:red;font-weight:bold'> $"; echo $row['price']; echo"</big><br />";
				echo $row['description'].'</div>';
				//echo '<input  type="text" name=$row[prodid] onChange=textget(this.value); placeholder="Enter Quantity" size="10"/>&nbsp';
				//echo '<input type="hidden" name=$row[prodid]  value=$row[prodtype] size="10"  />';
				//echo '<input class="w3-btn" type="button" onclick="window.location("newlogin.php")" value="Buy Now">';

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
            <a href="contact.php">Contact Us</a> |
            <a href="http://dealaway.com.au/Wordpress/">Wordpress</a>            
            <br /> &copy; DealAway Pty Ltd. All Rights Reserved
            <br />ABN.
</div>
<!--======Footer End =======================-->
</body>
</html>