<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Create email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Message:\n$message";

    // Email configuration
    $to = "abhishek11rajput@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";

    // Send email
    $success = mail($to, $subject, $email_content);

    // Check if email was sent successfully
    if ($success) {
        echo "sent";
    } else {
        echo "error";
    }
} else {
    // Form was not submitted
    echo "invalid request";
}
?>
