<?php
// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data); // Remove unnecessary spaces before and after
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Converts special characters to prevent XSS
    return $data;
}

$sanitized_name = $sanitized_email = $sanitized_contact = $sanitized_message =""; // Default empty values

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sanitized_name = sanitizeInput($_POST['name']);
    $sanitized_email = sanitizeInput($_POST['email']);
    $sanitized_contact = sanitizeInput($_POST['contact']);
    $sanitized_message = sanitizeInput($_POST['message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Front Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        form {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: aqua;
    width: 500px;
    margin: auto;
}

form label, form input {
    width: 90%;
    text-align: center;
}
        .output {
            margin-top: 20px;
            font-weight: bold;
            color: blue;
        }
        .message {
            display: inline-block;
            text-align: left;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
        }
        button {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: pink;
            width: 250px;
        }
    </style>
</head>
<body>
    <h2>Secure Input Form</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" class="name" name="name" id="name" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" class="email" name="email" id="email" required>
        <br><br>
        <label for="contact">Contact#:</label>
        <input type="text" class="contact" name="contact" id="contact" required>
        <br><br>
        <label for="message">Message:</label>
        <input type="text"  class="message" name="message" id="message" required>
        <br><br>
        <button type="submit">Submit</button>
    </form>

    <?php if (!empty($sanitized_name) && !empty($sanitized_email) && !empty($sanitized_contact) && !empty($sanitized_message)): ?>
        <div class="output">
            <h3>Sanitized Output:</h3>
            <p>Name: <?php echo htmlspecialchars($sanitized_name, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Email: <?php echo htmlspecialchars($sanitized_email, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Contact: <?php echo htmlspecialchars($sanitized_contact, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Message: <?php echo htmlspecialchars($sanitized_message, ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
    <?php endif; ?>
</body>
</html>
