<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect form data safely
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Your Gmail address (recipient)
    $to = "royalnagasainanda@gmail.com";

    // Email subject and body
    $mail_subject = "New Contact Message: " . $subject;
    $mail_body = "You have received a new message from your website:\n\n" .
                 "Name: $name\n" .
                 "Email: $email\n\n" .
                 "Message:\n$message\n";

    // Headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $mail_subject, $mail_body, $headers)) {
        echo "<p style='text-align:center;color:green;'>✅ Message sent successfully! We’ll get back to you soon.</p>";
    } else {
        echo "<p style='text-align:center;color:red;'>❌ Sorry, something went wrong. Please try again later.</p>";
    }
}
?>
