<?php
require_once 'vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;

//sendMail("akhiltulip@gmail.com", "Sub 1", "HTML 1");//testing


$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : ''; 

if(function_exists ( $action ) ){
  $arr_result = $action();
}
else{
  $arr_result = array(
    'msg' => "Action not found",
    'status' => 0
  );
}

echo json_encode($arr_result); 
die();


function sendMail($to, $subject, $htmldata){
  //return false;
  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  $mail->SMTPDebug = 0;  // Enable verbose debug output

  //SMTP settings start
  $mail->isSMTP(1); // Set mailer to use SMTP
  $mail->Host = 'localhost'; // Specify main and backup SMTP servers
  //$mail->Host = 'smtpout.secureserver.net';
  //$mail->Host = "relay-hosting.secureserver.net";


  $mail->SMTPAuth = false; // Enable SMTP authentication
  $mail->Username = 'builders@door3network.com'; // SMTP username
  $mail->Password = 'j123@PALA'; // SMTP password
  $mail->SMTPAutoTLS = false; 
  $mail->SMTPSecure = false; // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 25;

  //Sender
  $mail->setFrom('builders@door3network.com');
  //Receiver
  $mail->addAddress($to);

  //Email Subject & Body
  $mail->Subject = $subject;
  //Form Fields
  $mail->Body = $htmldata;

  $mail->isHTML(true); // Set email format to HTML

  //Send the message, check for errors
  if (!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  }
  else {
    //echo 'Form Submitted Successfully.';
  }

}



function contactUs(){

  $iGoBy = isset($_REQUEST['iGoBy'])?$_REQUEST['iGoBy']:'';
  $emailId = isset($_REQUEST['emailId'])?$_REQUEST['emailId']:'';
  $ITweetHere = isset($_REQUEST['ITweetHere'])?$_REQUEST['ITweetHere']:'';
  $location = isset($_REQUEST['location'])?$_REQUEST['location']:'';
  $role = isset($_REQUEST['role'])?$_REQUEST['role']:'';
  $description = isset($_REQUEST['description'])?$_REQUEST['description']:'';
	$today = date('Y-m-d H:i:s'); 
	
	$subject = "Contact Details | ".date("Y-m-d H:i");
  
  $htmldata ='<html><body><table>';
  $htmldata .='<tr><td>I go by : </td><td>'.$iGoBy.'</td></tr>';
  $htmldata .='<tr><td>Email : </td><td>'.$emailId.'</td></tr>';
  $htmldata .='<tr><td>Tweet : </td><td>'.$ITweetHere.'</td></tr>';
  $htmldata .='<tr><td>Location : </td><td>'.$location.'</td></tr>';
  $htmldata .='<tr><td>Profession : </td><td>'.$role.'</td></tr>';
  $htmldata .='<tr><td>Description : </td><td>'.$description.'</td></tr>';
  $htmldata .='</table>';
  $htmldata .='</body></html>'; 		  
  
  //sendMail("builders@door3network.com", "Contact Us form", $htmldata);
  sendMail("swgoldisthebest@gmail.com", "Contact Us form", $htmldata);

  return array(
    'msg' => "Thanks for your interest! Our Experts will contact you soon.",
    'status' => 1
  );

}


function builders(){

  $name = isset($_REQUEST['name'])?$_REQUEST['name']:'';
  $company = isset($_REQUEST['company'])?$_REQUEST['company']:'';
  $email = isset($_REQUEST['email'])?$_REQUEST['email']:'';
  $website = isset($_REQUEST['website'])?$_REQUEST['website']:'';
  $twitter = isset($_REQUEST['twitter'])?$_REQUEST['twitter']:'';
  $telegram = isset($_REQUEST['telegram'])?$_REQUEST['telegram']:'';
  $message = isset($_REQUEST['message'])?$_REQUEST['message']:'';
	$today = date('Y-m-d H:i:s'); 
	
	$subject = "Contact Details | ".date("Y-m-d H:i");
  
  $htmldata ='<html><body><table>';
  $htmldata .='<tr><td>Name : </td><td>'.$name.'</td></tr>';
  $htmldata .='<tr><td>Company : </td><td>'.$company.'</td></tr>';
  $htmldata .='<tr><td>Email : </td><td>'.$email.'</td></tr>';
  $htmldata .='<tr><td>Website : </td><td>'.$website.'</td></tr>';
  $htmldata .='<tr><td>Twitter : </td><td>'.$twitter.'</td></tr>';
  $htmldata .='<tr><td>Telegram : </td><td>'.$telegram.'</td></tr>';
  $htmldata .='<tr><td>Message : </td><td>'.$message.'</td></tr>';
  $htmldata .='</table>';
  $htmldata .='</body></html>'; 		  
  
  sendMail("swgoldisthebest@gmail.com", "Builders form", $htmldata);

  return array(
    'msg' => "Thanks for your interest! Our Experts will contact you soon.",
    'status' => 1
  );

}
