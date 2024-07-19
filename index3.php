<?php
include("database.php");
$errors = []; // Initialize an array to store validation errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Registration Form Validation
    if (isset($_POST["registerUsername"])) {
        $username = trim($_POST["registerUsername"]);
        $email = trim($_POST["registerEmail"]);
        $password = trim($_POST["registerPassword"]);
        $confirmPassword = trim($_POST["confirmPassword"]);

        // Basic validation
        if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
            $errors[] = "All fields are required for registration.";
        } elseif ($password !== $confirmPassword) {
            $errors[] = "Passwords do not match.";
        }

        // Check if the email is already in use
        $emailCheckQuery = "SELECT * FROM users WHERE email = '$email'";
        $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

        if ($emailCheckResult && mysqli_num_rows($emailCheckResult) > 0) {
            // User with the same email already exists
            $errors[] = "Email is in Our Database";
        }if (empty($errors)) {
            // Proceed with registration logic
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashedPassword', 'user')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script>alert('User registered successfully!'); window.location.reload();</script>";
                exit;
            } else {
                echo "Error: " . mysqli_error($conn);
            
            }
        } else {
            // Display validation errors
            foreach ($errors as $error) {
                echo "<script>alert('" . $error . "');</script>";
                
            }
        }
    }
}



    // Login Form Validation
    if (isset($_POST["loginUsername"])) {
        $username = trim($_POST["loginUsername"]);
        $password = trim($_POST["loginPassword"]);

        // Basic validation
        if (empty($username) || empty($password)) {
            $errors[] = "Both username and password are required for login.";
        }

        // TODO: You can add more specific validation based on your requirements

        if (empty($errors)) {
            // Proceed with login logic
            $query = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $user = mysqli_fetch_assoc($result);
                if ($user && password_verify($password, $user["password"])) {
                    // Set session variables for the logged-in user
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];

                    if ($_SESSION['role'] === 'admin') {
                        header("Location: admin.php"); // Redirect to the admin dashboard
                        exit();
                    } else {
                        header("Location: welcome.php"); // Redirect to the regular user welcome page
                        exit();
                    }
                } else {
                    echo "Invalid username or password";
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // Display validation errors
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    }



?>



<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Animated Login & Registration Form</title>
    <link rel="stylesheet" href="styleforregister.css">
    <style>
        #dont-show{
            display: hidden;
        }




    </style>
</head>
<body>
    <div class="container">
        <span> </span>
        <span> </span>
        <span> </span>
        <span> </span>

        <form id="signinForm" action="index3.php" method="post">
            <!-- Add action and method attributes -->
            <h2>Log in</h2>

            <div class="inputBox">
                <input type="text" name="loginUsername" placeholder="Username" />
            </div>

            <div class="inputBox">
                <input type="password" name="loginPassword" placeholder="Password" />
            </div>

            <div class="inputBox group">
                <a href="#"> Forgot Password </a>
                <a href="#" id="signup"> Signup </a>
            </div>

            <div class="inputBox">
                <input type="submit" value="Sign in" />
            </div>
        </form>

        <form id="signupForm" action="index3.php" method="post">
            <!-- Add action and method attributes -->
            <h2>Registration</h2>

            <div class="inputBox">
                <input type="text" name="registerUsername" id="myname" placeholder="Username" />
            </div>

            <div class="inputBox">
                <input type="text" name="registerEmail"id="myemail"  placeholder="Email Address" />
            </div>

            <div class="inputBox">
                <input type="password" name="registerPassword"id="mypassword"  placeholder="Create Password" />
            </div>

            <div class="inputBox">
                <input type="password" name="confirmPassword" id="mypasswordconfim"  placeholder="Confirm Password" />
            </div>

            <div class="inputBox">
                <input type="submit" id="validation" value="Register Account" />
            </div>
            <div class="inputBox group">
                <a href="#"> Already Have an Account ? <b id="signin"> Login </b> </a>
            </div>
        </form>
    </div>
    <script>
        
        

        function validateRegistration() {
    var username = document.getElementById("myname").value;
    var email = document.getElementById("myemail").value;
    var password = document.getElementById("mypassword").value;
    var confirmPassword = document.getElementById("mypasswordconfim").value;  // Corrected ID

    if (username.length === 0) {
        alert("Please put your username");
        return false;
    } else if (!email.includes("@")) {
        alert("Your email doesn't have an @");
        return false;
    } else if (password.length < 8 || !/[A-Z]/.test(password) || !/\d/.test(password)) {
        alert("Password should be at least 8 characters long, contain at least one uppercase letter, and one digit.");
        return false;
    } else if (password !== confirmPassword) {
        alert("Please make your confirm password the same as the first password");
        return false;
    }

    return true;
}

document.getElementById("validation").addEventListener("click", function (event) {
    if (!validateRegistration()) {
        event.preventDefault(); // Prevent the form from being submitted
    }
});

            let signup = document.querySelector("#signup");
        let signin = document.querySelector("#signin");
        let body = document.querySelector("body");
        signup.onclick = function () {
            body.classList.add("signup");
        };

        signin.onclick = function () {
            body.classList.remove("signup");
        };
       


        
    </script>
</body>
</html>



