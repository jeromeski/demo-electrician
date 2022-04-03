<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Electrician, Repairing, Air condition, Security systems">
    <meta name="description" content="ELECTRICIAN - Electrician&amp;Repairing HTML 5 site template">
    <meta name="author" content="Ansonika">
    <title>ELECTRICIAN - Electrician&amp;Repairing HTML 5 site template</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- Google web fonts -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,700i,900i" rel="stylesheet"  type="text/css">

    <!-- BASE CSS -->
    <link href="css/base.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
	<script type="text/javascript">
    function delayedRedirect(){
        window.location = "index.html"
    }
    </script>

</head>
<body id="confirmation" onLoad="setTimeout('delayedRedirect()', 10000)">
<?php
						$mail = $_POST['email_quote'];

						/*$subject = "".$_POST['subject'];*/
						$to = "info@domain.com";
						$subject = "Quotation request from ELECTRICIAN";
						$headers = "From: ELECTRICIAN web site <noreply@yourdomain.com>";
						$message = "\nPERSONAL INFO"; 
						$message .= "\nName: " . $_POST['firstname_quote'];
						$message .= "\nLast Name: " . $_POST['lastname_quote'];
						$message .= "\nEmail: " . $_POST['email_quote'];
						$message .= "\nPhone number: " . $_POST['phone_quote'];
						$message .= "\nProperty description: " . $_POST['message_general'];
						$message .= "\n\nADDRESS"; 
						$message .= "\nCity: " . $_POST['city_quote'];
						$message .= "\nStreet: " . $_POST['street_quote'];
						$message .= "\nState: " . $_POST['state_quote'];
						$message .= "\nPostal code: " . $_POST['postal_code_quote'];
						$message .= "\n\nPREFERRED DATE"; 
						$message .= "\nDate: " . $_POST['date_quote'];
						$message .= "\nTime: " . $_POST['time_quote'];
						$message .= "\n\nADDITIONAL INFO"; 
						$message .= "\nDo you have an insurance? " . $_POST['option_1'];
						$message .= "\nAre you a new client? " . $_POST['option_2'];
						$message .= "\nIs it urgent? " . $_POST['option_3'];
						$message  .= "\n\nADDITIONAL NOTES"; 
						$message .= "\nMessage: " . $_POST['message_quote'];
						$message .= "\nTerms and conditions accepted: " . $_POST['terms'];
						
						//Receive Variable
						$sentOk = mail($to,$subject,$message,$headers);
						
						//Confirmation page
						$user = "$mail";
						$usersubject = "Thank You";
						$userheaders = "From: info@electrician.com\n";
						/*$usermessage = "Thank you for your time. Your request is successfully submitted.\n"; WITH OUT SUMMARY*/
						//Confirmation page WITH  SUMMARY
						$usermessage = "Thank you for your time. Your request is successfully submitted.\n\nSUMMARY\n$message"; 
						mail($user,$usersubject,$usermessage,$userheaders);
	
?>

<!-- END SEND MAIL SCRIPT -->   
<div id="mask">
<div class="mask_content">
 <p class="text-center" style="font-size:80px;"><i class="icon_check_alt2"></i></p>
  <h4 style="color:#FFC">Thank you!<br>Quotation request sent.</h4>
 <p>You will be redirect back in 10 seconds.</p>
</div>
</div>
</body>
</html>