<?php
include "mailer/class.phpmailer.php"; 
$mail = new PHPMailer(); 
	
if(empty(trim($_POST['name'])))
{
   echo "name";
}
elseif(empty(trim($_POST['company_name'])))
{
   echo "cname";
}
elseif(empty(trim($_POST['email'])))
{
   echo "email";
}
elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

  echo "valid";
}
elseif(empty(trim($_POST['nature_request'])))
{
   echo "nature";
}
else
{
	$name =   $_POST['name'];
	$company_name =  $_POST['company_name'];
	$email=   $_POST['email'];

	$nature_request =  html_entity_decode($_POST['nature_request']);
	$subject = 'Contact Us - Sitara Project';
	$message ="<html><body><table width=\"80%\" cellpadding=\"5\" cellspacing=\"0\" align=\"center\"  style=\"border:1px solid #c1c1c1;  font-size:11px; color:#121e58;\">";
	$message.="<tr><td colspan=\"3\"  style=\"background-color:#121e58; color:white; font-size:16px; font-weight:bold\">Sitara Project</td></tr>";
	$message.="<tr><td colspan=\"3\"  style=\"color:##fff; font-size:14px; font-weight:bold;padding-top:5px;padding-left:3px;\"> Dear Admin,</td></tr>";
	$message.="<tr><td colspan=\"3\"  style=\"color:##fff; font-size:14px; font-weight:bold;padding-top:5px;padding-left:3px;\"> Contact Information given below:-</td></tr>";
	$message.="<tr>
		<td width='25%'><strong>Name</strong></td>
		<td width='5%'>:</td>
		<td width='70%'> ".$name." </td>
		</tr>";

	$message.=" <tr>
			<td><strong>Company Name </strong></td>
			<td>:</td>
			<td> ".$company_name." </td>
			</tr>
			<tr>
			<td><strong>Email </strong></td>
			<td>:</td>
			<td> ".$email." </td>
		</tr>
		<tr>
		<td><strong>Nature of request </strong></td>
		<td>:</td>
		<td> ".$nature_request." </td>
		</tr>
		<tr><td colspan='3'>&nbsp;</td></tr>
		<tr><td colspan='3'>&nbsp;</td></tr>
		<tr><td colspan='2'> <b>Thanks & Regards,</b></td></tr>
		<tr><td  colspan='2'> <b>".$name."</b></td></tr>";
		$message.="</table></body></html>";
	   
	   //$to = 'muaz@sitaraproject.com';
	   $to = 'basheer.mca@gmail.com';
	   $mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = "smtp.office365.com";
		$mail->Port = 587; // or 587
		$mail->IsHTML(true);
		$mail->Username = "basheer@atxlearning.com";
		$mail->Password = "Luz94738";
		$mail->SetFrom('basheer@atxlearning.com');
		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->AddAddress($to);
			
	   if($mail->Send())
	   {
		   echo "y";
	   }
	   
		
		
}

