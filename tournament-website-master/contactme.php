<?php
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$visitor_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);

if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}

$email_from = $visitor_email;
$email_subject = "PUBG Tournament Registration";
$email_body = "Player name: $name.\n".
              "Player Email: $visitor_email.\n".
              "Player Paytm No.: $number.\n";
$to = "admin@techprogramming.org";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";

if (mail($to, $email_subject, $email_body, $headers)) {
    header("Location: register.html");
} else {
    echo "There was a problem sending the email.";
}
?>
