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
            <div class="logo" onclick="window.location.href='index.php'"></div>
            <p class="w3-large">Select from the Range of Branded Accessory!
      <!--      <form id="form1"  name="form1" method="post" action="phpproduct.php">
                    <input type="text" name="txtprod" id="txtprod" />
                    <input type="submit" name="search" value="ENTER PRODUCT CODE" />
                </form>-->
            </p>
        </div>

<script type="text/javascript">
function load()
{					
	//set current date in hidden field
	date = new Date();

	var day = date.getDate();
	var year = date.getFullYear();
	var hh = date.getHours();
	var mm = date.getMinutes();
	var ss = date.getSeconds();
	
	document.getElementById('txtcustid').value = day  +""+ year  +""+  hh  +""+  mm +""+  ss;							
}

function formRegistrationValidator(){

	var fname = document.getElementById('txtfname');
	var lname = document.getElementById('txtlname');
	var datech = document.getElementById('txtdob');
	var mobile = document.getElementById('txtmobile');
	var phone = document.getElementById('txtphone');
	var streetname = document.getElementById('txtstreetname');
	var suburb = document.getElementById('txtsuburb');
	var postcode = document.getElementById('txtpostcode');
	var uname = document.getElementById('txtusername');
	var pword = document.getElementById('txtpassword');
	var repword = document.getElementById('txtretypepassword');
	var email = document.getElementById('txtemail');
	var secans1 = document.getElementById('txtsecretans1');
	var secans2 = document.getElementById('txtsecretans2');
	
	if(notEmpty(fname, "Enter First Name")){
	if(isAlphabet(fname,"First Name: Only Alphabets")){
	if(maxLen(fname,15,"fname")){
	
		if(notEmpty(lname, "Enter Last Name")){
		if(isAlphabet(lname,"Last Name: Only Alphabets")){
		if(maxLen(lname,15,"lname")){
		
		if(dateCheck(datech)){	
		
			if(isNumeric(mobile,"Mobile: Only Numeric Value")){
			if(maxLen(mobile,20,"mobile")){
			if(lengthRestriction(mobile,10,10)){
			
			if(isNumeric(phone,"Phone: Only Numeric Value")){
			if(maxLen(phone,20,"phone")){
			if(lengthRestriction(phone,10,10)){

				if(notEmpty(streetname, "Enter Street Name")){
				if(maxLen(streetname,25,"streetname")){
					
					if(notEmpty(suburb, "Enter Suburb")){
					if(maxLen(suburb,20,"suburb")){
					
						if(notEmpty(postcode, "Enter Post Code")){
						if(isNumeric(postcode,"Postcode: Only Numeric Value")){
						if(maxLen(postcode,4,"postcode")){
						
							if(notEmpty(uname, "Enter Username")){
							if(maxLen(uname,10,"uname")){
							
								if(notEmpty(pword, "Enter Password")){
								if(maxLen(pword,10,"pword")){
								
									if(textCompare(repword, pword,"Re-type Password")){
									
										if(notEmpty(secans1, "Enter Secret Answer1")){
										if(maxLen(secans1,20,"Secret Answer1")){
										
											if(notEmpty(secans2, "Enter Secret Answer2")){
											if(maxLen(secans2,20,"Secret Answer2")){
											
												if(emailValidator(email,"Invalid Email Address")){
													return true;
	}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}

	return false; 	
} //main function ends here
</script>
</head>

<body class="w3-container"  onload='load();' >
<!--==================Main Class=======================-->
  <section id="contact" width="450px">
<div class="w3-responsive">  
      <div class="w3-xlarge"> New Login Detail </div>
      <table width="625" border="0" class="w3-table">
	  <form id="form1" name="formregistraion" method="post" action="datastore.php"  onsubmit='return formRegistrationValidator();'>
        <tr>
          <td height="9%" colspan="2"><span class="w3-large">Personal Detail</span></td>
          </tr>
        <tr>
        <td width="65" height="9%"><span class="form_text">First Name</span></td>
        <td height="9%"><input name="txtfname" type="text" id="txtfname" size="30"  /><span class="style5"> *</span></td>
        <td height="9%"><input name="txtcustid" type="hidden" id="txtcustid" size="30" value="" /></td>
      </tr>
        <tr>
          <td height="9%" class="form_text">Last Name</td>
          <td height="9%"><input name="txtlname" type="text" id="txtlname" size="30" /> <span class="style5"> *</span></td>
        </tr>
       <!-- <tr>
        <td height="9%" class="form_text">Gender</td>
        <td width="320" height="9%">
		<select name="optgender" id="optgender">
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select></td>
      </tr>
      <tr>
        <td height="9%" class="form_text">Birthday</td>
        <td height="9%" colspan="3"><input name="txtdob" type="text" id="txtdob" size="20" /><span class="style5"> *</span>
          <span class="form_text">(DD / MM / YYYY)</span></td>
      </tr>
      <tr>
        <td height="9%" class="form_text">Phone</td>
        <td height="9%"><input name="txtphone" type="text" id="txtphone" size="30" /><span class="style5"> *</span></td>
      </tr>
      <tr>
        <td height="9%" class="form_text">Mobile</td>
        <td height="9%">
          <input name="txtmobile" type="text" id="txtmobile" size="30" /><span class="style5"> *</span>
        </td>
      </tr>
	        <tr>
        <td height="9%" class="form_text">Street Name </td>
        <td height="9%">
          <input name="txtstreetname" type="text" id="txtstreetname" size="30"  /><span class="style5"> *</span>
        </td>
      </tr>
	        <tr>
        <td height="9%" class="form_text">Suburb</td>
        <td height="9%">
          <input name="txtsuburb" type="text" id="txtsuburb" size="30"  /><span class="style5"> *</span>
        </td>
      </tr>
	        <tr>
        <td height="9%" class="form_text">Post Code </td>
        <td height="9%">
          <input name="txtpostcode" type="text" id="txtpostcode" size="30"  /><span class="style5"> *</span>
        </td>
      </tr>-->
      <tr>
        <td height="9%" colspan="2"><span class="w3-large">Choose an ID and Password</span></td>
      </tr>
      <tr>
        <td height="9%" class="form_text">Username</td>
        <td height="9%" colspan="3"><input name="uname" type="text" id="txtusername" size="30"  /><span class="style5"> *</span>
		<font color="#FF0000">
			<?php
                   error_reporting(0);    
			$msglogin = $_GET['msglogin'];  //GET the message
			if($msglogin!='') echo '<span>'.$msglogin.'</span>'; //If message is set echo it
			?>
		</font>
		</td>
        </tr>
      <tr>
        <td height="9%" class="form_text">Password</td>
        <td height="9%"><input name="pword" type="password" id="txtpassword" size="30"  /><span class="style5"> *</span></td>
      </tr>
      <tr>
        <td height="9%" class="form_text">Re-type Password</td>
        <td height="9%"><input name="txtretypepassword" type="password" id="txtretypepassword" size="30"  /><span class="style5"> *</span></td>
      </tr>
      <tr>
        <td height="9%" class="form_text">Current Email</td>
        <td height="9%"><input name="txtemail" type="text" id="txtemail" size="30"  /><span class="style5"> *</span></td>
      </tr>
<!--
      <tr>
        <td height="9%" colspan="2"><legend class="form_subheading">In case you forget your Password...</legend></td>
      </tr>
      <tr>
        <td height="9%" class="form_text">Secret Que. 1</td>
        <td height="9%"><select name="drpsecretque1" id="drpsecretque1">
          <option value="What was your childhood nickname">What was your childhood nickname</option>
          <option value="In what city does your nearest sibling live">In what city does your nearest sibling live</option>
          <option value="In what city or town was your first job">In what city or town was your first job</option>
          <option value="What was your favorite place to visit as a child">What was your favorite place to visit as a child</option>
          <option value="What was your dream job as a child">What was your dream job as a child</option>
                                                        </select></td>

      </tr>
      <tr>
              <td height="9%" class="form_text">Your Ans</td>
        <td height="9%"><input name="txtsecretans1" type="text" id="txtsecretans1" size="20"  /><span class="style5"> *</span></td>
      </tr>
      <tr>
        <td height="9%" class="form_text">Secret Que. 2</td>
        <td height="9%"><select name="drpsecretque2" id="drpsecretque2">
          <option value="What was the make and model of your first car">What was the make and model of your first car</option>
          <option value="What is the name of the first school you attended">What is the name of the first school you attended</option>
          <option value="What was the name of your primary school">What was the name of your primary school</option>
                                </select></td>
      </tr>
      <tr>
              <td height="9%" class="form_text">Your Ans</td>
        <td height="9%"><input name="txtsecretans2" type="text" id="txtsecretans2" size="20" /><span class="style5"> *</span></td>
      </tr>-->
      <tr>
        <td height="0%" colspan="2"><span class="style5"> * </span>Required Field</td>
      </tr>
      <tr>
        <td height="22%" colspan="2">
          <div align="center">
            <input type="submit" name="butSubmit" id="butSubmit"  value="Create Account" />  
			<input type="reset" name="reset" id="reset"   value="Clear Form" />
			</div>
           
          </td></tr>
</form>	 
 </table>
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
