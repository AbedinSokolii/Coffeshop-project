<?php
include("database.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);

    $query = "INSERT INTO contact_submissions (name, email, message) VALUES ('$name', '$email', '$message')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #010103;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            margin-right: 100px;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(5px);
            width: 600px; /* Increased width */
            transform: translateX(-10%); /* Move to the left */
        }

        h2 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }

        .inputBox {
            margin-bottom: 10px;
        }

        .inputBox label {
            display: block;
            color: #fff;
            margin-bottom: 5px;
        }

        .inputBox input[type="text"],
        .inputBox input[type="email"],
        .inputBox textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #d3ad7f;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #b99570;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Send Message to Admin</h2>
    <form action="Clientcontact.php" method="post">
        <div class="inputBox">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="name" required>
        </div>
        <div class="inputBox">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="email" required>
        </div>
        <div class="inputBox">
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
        </div>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
