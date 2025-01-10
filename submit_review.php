<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect review form data
    $name = htmlspecialchars(trim($_POST['reviewerName']));
    $email = htmlspecialchars(trim($_POST['reviewerEmail']));
    $review = htmlspecialchars(trim($_POST['reviewMessage']));
    $rating = htmlspecialchars(trim($_POST['rating']));  // New line to capture the rating input

    // Validate inputs (simple example)
    if (empty($name) || empty($email) || empty($review) || empty($rating)) {
        echo "All fields are required.";
        exit();
    }

    // Save the review to a database or file here (optional)
    // Example: file_put_contents or a database INSERT query

    // Prepare email to notify about new review
    $to = "gearxpertnz@gmail.com"; // Replace with your email address
    $subject = "New Customer Review Submitted";
    $body = "A new review has been submitted on your website:\n\n".
            "Name: $name\n".
            "Email: $email\n".
            "Rating: $rating/5 stars\n\n".  // Include the rating in the email
            "Review:\n$review\n";
    $headers = "From: inquiry@gearxpert.co.nz\r\n" .  // Use your domain email
               "Reply-To: $email\r\n"; // Allows you to reply to the customer's email

    // Send email notification
    if (mail($to, $subject, $body, $headers)) {
        // Redirect to a thank you page after successful submission and email
        header("Location: thank_you.html"); 
        exit();
    } else {
        // Error handling
        echo "Sorry, something went wrong. Please try again later.";
    }
} else {
    // Redirect to the homepage if accessed directly
    header("Location: index.html");
    exit();
}
?>
