<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "mickroglosse@gmail.com";
    $email_subject = "Your email subject line";
 
    function died($error) {
        // your error code can go here
        echo "Il y a un problème on va le corriger vite (promis) ;) ";
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['name']; // required
    $last_name = $_POST['email']; // required
    $email_from = $_POST['subject']; // required
    $telephone = $_POST['message']; // not required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 

 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Vous avez recu un message .\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Prenom: ".clean_string($first_name)."\n";
    $email_message .= "Mail: ".clean_string($last_name)."\n";
    $email_message .= "Sujet: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($telephone)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Merci de nous avoir contacter on va vite vous répondre :)
 
<?php
 
}
?>