<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Prepare email
    $to = "gearxpertnz@gmail.com"; // The email address to receive the form data
    $subject = "New Contact Message from GearXpert";
    $body = "You have received a new message from the contact form on your website.\n\n".
            "Name: $name\n".
            "Email: $email\n".
            "Phone: $phone\n\n".
            "Message:\n$message\n";
    $headers = "From: inquiry@gearxpert.co.nz\r\n" . // Use your domain email
               "Reply-To: $email\r\n"; // Allows the recipient to reply directly to the sender's email

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        // Redirect to a thank you page
        header("Location: thank_you.html"); 
        exit();
    } else {
        // Error handling
        echo "Sorry, something went wrong. Please try again later.";
    }
} else {
    // Redirect to contact page if accessed directly
    header("Location: contact.html");
    exit();
}
?>
