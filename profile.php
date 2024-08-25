<?php
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateProfile'])) {
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Basic validation
    if (empty($firstName) || empty($lastName) || empty($dob) || empty($gender) || empty($country) || empty($email)) {
        echo '<div class="alert alert-danger">All fields are required!</div>';
    } else {
        // Update session with new data
        $_SESSION['user']['firstName'] = $firstName;
        $_SESSION['user']['lastName'] = $lastName;
        $_SESSION['user']['dob'] = $dob;
        $_SESSION['user']['gender'] = $gender;
        $_SESSION['user']['country'] = $country;
        $_SESSION['user']['email'] = $email;

        echo '<div class="alert alert-success">Profile updated successfully!</div>';
    }
}

// Retrieve user data safely
$firstName = isset($_SESSION['user']['firstName']) ? htmlspecialchars($_SESSION['user']['firstName']) : '';
$lastName = isset($_SESSION['user']['lastName']) ? htmlspecialchars($_SESSION['user']['lastName']) : '';
$dob = isset($_SESSION['user']['dob']) ? htmlspecialchars($_SESSION['user']['dob']) : '';
$gender = isset($_SESSION['user']['gender']) ? htmlspecialchars($_SESSION['user']['gender']) : '';
$country = isset($_SESSION['user']['country']) ? htmlspecialchars($_SESSION['user']['country']) : '';
$email = isset($_SESSION['user']['email']) ? htmlspecialchars($_SESSION['user']['email']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Profile - REAN PHEASA</title>
    <style>
        /* Profile Page Styles */
        .container {
            max-width: 900px;
            margin: auto;
            padding: 20px;
        }

        h3 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 0.25rem;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 0.25rem;
            padding: 10px 20px;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert-success, .alert-danger {
            margin-bottom: 20px;
        }

        .is-invalid {
            border-color: #dc3545;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h3>Profile Information</h3>
        <form method="POST">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Male" <?php if($gender === 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if($gender === 'Female') echo 'selected'; ?>>Female</option>
                    <option value="Other" <?php if($gender === 'Other') echo 'selected'; ?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="<?php echo $country; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <button type="submit" name="updateProfile" class="btn btn-primary">Update Profile</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const updateProfileButton = document.querySelector('button[name="updateProfile"]');

            if (updateProfileButton) {
                updateProfileButton.addEventListener('click', function() {
                    const form = this.closest('form');
                    const inputs = form.querySelectorAll('input, select');
                    let isValid = true;

                    inputs.forEach(input => {
                        if (!input.checkValidity()) {
                            isValid = false;
                            input.classList.add('is-invalid');
                        } else {
                            input.classList.remove('is-invalid');
                        }
                    });

                    if (!isValid) {
                        alert('Please fill out all required fields.');
                    }
                });
            }
        });
    </script>
</body>
</html>
