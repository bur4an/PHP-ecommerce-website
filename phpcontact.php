<?php
if ($_POST) { 
    include ('config.php');
         $name=$_POST['name'];
         $email=$_POST['email'];
         $comments=$_POST['comments'];
         //Here Write Sql Insert commeand to store
            mysqli_query ($dbC, "INSERT INTO contact (name, email, comments) VALUES 
                ('$name', '$email', '$comments')");
                mysqli_close($dbC);
                        header("location: contact.php?msgcon=DataSentSuccessfully");

    
    $ToEmail = 'support@dealaway.com.au'; 
    $EmailSubject = 'Site contact form'; 
    $mailheader = "From: ".$_POST["email"]."\r\n"; 
    $mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    
    $MESSAGE_BODY = "Name: ".$_POST["name"].""; 
    $MESSAGE_BODY .= "\nEmail: ".$_POST["email"].""; 
    $MESSAGE_BODY .= "\nComments: ".nl2br($_POST["comments"]).""; 
    mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 
    
    exit();
    };
?> 