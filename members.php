<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
$users = $_SESSION['users'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members Area</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: #f5f7fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
        .profile-section, .members-section {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }
        .profile-section:hover, .members-section:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
            transform: translateY(-5px);
        }
        h2 {
            color: #333;
            font-weight: 600;
        }
        p {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .members-list {
            list-style-type: none;
            padding: 0;
        }
        .members-list li {
            background: #f9f9f9;
            margin: 5px 0;
            padding: 10px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        .members-list li:hover {
            background: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- User Profile Section -->
        <div class="profile-section">
            <h2>Welcome, <?php echo htmlspecialchars($user['firstName']); ?>!</h2>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['firstName'] . ' ' . $user['lastName']); ?></p>
            <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($user['dob']); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></p>
            <p><strong>Country:</strong> <?php echo htmlspecialchars($user['country']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><a href="logout.php" class="btn btn-danger">Logout</a></p>
        </div>

        <!-- Members List Section -->
        <div class="members-section">
            <h2>Registered Members</h2>
            <ul class="members-list">
                <?php foreach ($users as $member): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($member['firstName'] . ' ' . $member['lastName']); ?></strong> 
                        (<?php echo htmlspecialchars($member['email']); ?>)
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>
