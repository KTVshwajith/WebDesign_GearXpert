<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $date = htmlspecialchars(trim($_POST['date']));
    $time = htmlspecialchars(trim($_POST['time']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Prepare email
    $to = "gearxpertnz@gmail.com"; // Replace with your email
    $subject = "New Booking Request from GearXpert";
    $body = "You have received a new booking request from your website.\n\n".
            "Name: $name\n".
            "Email: $email\n".
            "Phone: $phone\n".
            "Preferred Date: $date\n".
            "Preferred Time: $time\n\n".
            "Message:\n$message\n";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        // Redirect to a thank you page
        header("Location: thank_you_booking.html"); 
        exit();
    } else {
        // Error handling
        echo "Sorry, something went wrong. Please try again later.";
    }
} else {
    // Redirect to booking page if accessed directly
    header("Location: booking.html");
    exit();
}
?>
