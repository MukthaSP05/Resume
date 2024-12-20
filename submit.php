<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($address)) {
        echo "All fields are required.";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Validate phone number format (10 digits)
    if (!preg_match("/^\d{10}$/", $phone)) {
        echo "Invalid phone number. It must be 10 digits.";
        exit;
    }

    // Output sanitized data
    echo "<div class='response-container'>";
    echo "<h2>Submission Successful!</h2>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
    echo "<p><strong>Address:</strong> $address</p>";
    echo "</div>";
} else {
    echo "Invalid Request";
}
?>
