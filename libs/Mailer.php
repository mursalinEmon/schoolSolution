<?php
class Mailer{
	public function sendbyemail($email, $subject, $body, $attachment=""){
			
				require 'mailer/PHPMailer-master/PHPMailerAutoload.php';

					$mail = new PHPMailer;
					
					$mails = explode(",",$email);
					
					
					$mail->isSMTP(); 
					
					// Set mailer to use SMTP
					//$mail->Host = 'tls://smtp.gmail.com:587';
					$mail->Host = 'mail.dotbdsolutions.com';
					$mail->SMTPOptions = array(
					   'ssl' => array(
						 'verify_peer' => false,
						 'verify_peer_name' => false,
						 'allow_self_signed' => true
						)
					);
					
					
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'rajib@dotbdsolutions.com';                 // SMTP username
					$mail->Password = 'xpasswordd2k';                           // SMTP password
					//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                    // TCP port to connect to

					$mail->setFrom('rajib@dotbdsolutions.com', 'Dot BD Solutions');
					if(count($mails)>0){
						$mail->addAddress($email);  
						$mail->addAddress('mdrajibdbs@gmail.com');   // Add a recipient
					}
					//$mail->addAddress('ellen@example.com');               // Name is optional
					//$mail->addReplyTo('info@example.com', 'Information');
					//$mail->addCC('cc@example.com');
					//$mail->addBCC('bcc@example.com');
					
					$mail->addAttachment($attachment);         // Add attachments
					//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
					$mail->isHTML(true);                                  // Set email format to HTML

					$mail->Subject = $subject;
					$mail->Body    = $body;
					//$mail->AltBody = 'Dear User,
						//				As you requested. 
							//			If it was not at your request, then please contact support immediately.';
					$success = "";
					if(!$mail->send()) {
						
						return "Could not send email!".$mail->ErrorInfo;
					} else {
						return "Success";
					}
					
									
	}
}