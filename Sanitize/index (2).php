<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erica Compania</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="container"> 
<form method = "POST" action = "">
    <label for = "name"> Name </label>
    <input type = "text" name= "name" id = "name" required >
    <label for = "email" > Email </label>
    <input type = "email" name = "email" id = "email" required>
    <button type = "submit"> Submit </button>
</form> 


</div>
</body>
</html>
<?php

function sanitizeInput($data) {
    $data = trim($data); 
    $data = stripslashes($data); 
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$sanitized_name = $sanitized_email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sanitized_name = sanitizeInput($_POST['name']);
    $sanitized_email = sanitizeInput($_POST['email']);
}
?>

<?php if (!empty($sanitized_name) && !empty($sanitized_email)): ?>

    <div class= "output">
        <h3>Sanitized Output:</h3>

        <p>Name: <?php echo htmlspecialchars($sanitized_name, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>Email: <?php echo htmlspecialchars($sanitized_email, ENT_QUOTES, 'UTF-8'); ?></p>

    </div>
<?php endif; ?>

