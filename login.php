<?php
session_start();

// Initialize users array in session if not already set
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

// Handle registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword'];
    $confirmPassword = $_POST['registerConfirmPassword'];

    if ($password === $confirmPassword) {
        $user = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'dob' => $dob,
            'gender' => $gender,
            'country' => $country,
            'email' => $email,
            'password' => $password,
            'tests' => []
        ];

        $_SESSION['users'][] = $user;
        echo '<div class="alert alert-success">Registration successful! Please login.</div>';
    } else {
        echo '<div class="alert alert-danger">Passwords do not match!</div>';
    }
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    foreach ($_SESSION['users'] as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            $_SESSION['user'] = $user;
            header('Location: home.php');
            exit;
        }
    }
    echo '<div class="alert alert-danger">Invalid email or password!</div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .form-section {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        .form-section:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
            transform: translateY(-5px);
        }
        .form-section h2 {
            margin-bottom: 20px;
            color: #333;
            font-weight: 600;
        }
        .form-section .btn {
            margin-top: 10px;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
        }
        .form-section .btn-primary {
            background: #007bff;
            border: none;
            transition: background 0.3s ease;
        }
        .form-section .btn-primary:hover {
            background: #0056b3;
        }
        .form-section p {
            margin-top: 10px;
            font-size: 14px;
        }
        .form-section .form-control {
            border-radius: 20px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease;
        }
        .form-section .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        .password-strength {
            font-size: 14px;
            margin-top: 10px;
            font-weight: 500;
        }
        .password-strength.weak {
            color: #dc3545;
        }
        .password-strength.medium {
            color: #ffc107;
        }
        .password-strength.strong {
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!isset($_SESSION['user'])): ?>
        <div id="login-section" class="form-section mt-5">
            <h2>Login</h2>
            <form method="POST" id="login-form">
                <div class="form-group">
                    <label for="loginEmail">Email address</label>
                    <input type="email" class="form-control" id="loginEmail" name="loginEmail" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
                <p>Don't have an account? <a href="#" id="show-register">Register here</a></p>
            </form>
        </div>

        <div id="register-section" class="form-section mt-5 d-none">
            <h2>Register</h2>
            <form method="POST" id="register-form">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="" disabled selected>Select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" required>
                </div>
                <div class="form-group">
                    <label for="registerEmail">Email address</label>
                    <input type="email" class="form-control" id="registerEmail" name="registerEmail" required>
                </div>
                <div class="form-group">
                    <label for="registerPassword">Password</label>
                    <input type="password" class="form-control" id="registerPassword" name="registerPassword" required>
                </div>
                <div class="form-group">
                    <label for="registerConfirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="registerConfirmPassword" name="registerConfirmPassword" required>
                </div>
                <div id="password-strength" class="password-strength"></div>
                <button type="submit" name="register" class="btn btn-primary">Register</button>
                <p>Already have an account? <a href="#" id="show-login">Login here</a></p>
            </form>
        </div>
        <?php else: ?>
            <div class="alert alert-info">You are already logged in. <a href="home.php">Go to Home</a></div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loginSection = document.getElementById('login-section');
            const registerSection = document.getElementById('register-section');

            const showRegister = document.getElementById('show-register');
            const showLogin = document.getElementById('show-login');

            showRegister.addEventListener('click', () => {
                loginSection.classList.add('d-none');
                registerSection.classList.remove('d-none');
            });

            showLogin.addEventListener('click', () => {
                registerSection.classList.add('d-none');
                loginSection.classList.remove('d-none');
            });

            function getPasswordStrength(password) {
                if (password.length < 6) return 'weak';
                if (password.length < 10) return 'medium';
                return 'strong';
            }

            const passwordInput = document.getElementById('registerPassword');
            const passwordStrengthText = document.getElementById('password-strength');

            passwordInput.addEventListener('input', () => {
                const strength = getPasswordStrength(passwordInput.value);
                passwordStrengthText.textContent = `Password strength: ${strength}`;
                passwordStrengthText.className = `password-strength ${strength}`;
            });
        });
    </script>
</body>
</html>
