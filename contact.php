<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Contact : DEALAWAY</title>
    <meta name="description" content="Dealaway Contact Form With Google Maps">
 <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
  <!-- CSS================================================== -->
 <link rel="stylesheet" type="text/css" href="includes/contact_style.css" />
  <!-- js================================================== -->
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
 <script type="text/javascript" src="scripts.js"></script>
    
<link rel="stylesheet" href="w3css/w3.css">
<link rel="stylesheet" href="style.css">
        <div class="w3-padding-12 grey-l3">
                <div class="logo" onclick="window.location.href='index.php'"></div>
            <p class="w3-medium">Select from the Range of Branded Accessory!</p>
        </div>

</head>
<body class="w3-container">
   <section id="contact">
     <div class="w3-responsive">
    <header>
    <!--<h1>Contact - DEALAWAY<?php error_reporting(0);   echo '&nbsp'.$_GET['msgcon'];?></h1>-->
    
    <p>Please fill your details below!</p>
   </header>
   <mark id="message" style="display: none;"></mark>    
   <form method="post" action="phpcontact.php" name="cform" id="cform" autocomplete="on">
    <fieldset>
     <legend>Contact Details</legend>
     <div>
      <label for="name" accesskey="U">Your Name</label>
      <input name="name" type="text" id="name" placeholder="Enter your name" required="required">
     </div>
     <div>
      <label for="email" accesskey="E">Email</label>
      <input name="email" type="email" id="email" placeholder="Enter your Email" required="required">
     </div>
     <div>
      <label for="comments" accesskey="C">Comments</label>
      <textarea name="comments" type = "text" cols="40" rows="7" id="comments" placeholder="Enter your comments" spellcheck="true" required="required"></textarea>
     </div>
      <div>
    <input type="submit"  id="submit" value="Submit" />
    </div>
     <!--<section id="map-outer">
    <div id="map_canvas"></div>
   </section>-->
    </fieldset>
   </form>  
   </section>
  </div>

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