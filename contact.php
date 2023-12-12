<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form data
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email address
        echo "Invalid email address";
        exit();
    }

    // Create email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Message:\n$message";

    // Email configuration
    $to = "techcybersonic@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "CC: abdu8543378@gmail.com"; // Add CC if necessary

    // Send email
    $success = mail($to, $subject, $email_content, $headers);

    // Check if email was sent successfully
    if ($success) {
        echo "Your message has been sent. Thank you!";
    } else {
        echo "Failed to send the message. Please try again later.";
    }
} else {
    // Form was not submitted
    echo "Invalid request";
}
?>
