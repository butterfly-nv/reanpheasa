<?php
session_start();

// Fetch scores from the session or initialize them
$readingScore = isset($_SESSION['readingScore']) ? $_SESSION['readingScore'] : 0;
$writingScore = isset($_SESSION['writingScore']) ? $_SESSION['writingScore'] : 0;
$speakingScore = isset($_SESSION['speakingScore']) ? $_SESSION['speakingScore'] : 0;
$listeningScore = isset($_SESSION['listeningScore']) ? $_SESSION['listeningScore'] : 0;
$grammarScore = isset($_SESSION['grammarScore']) ? $_SESSION['grammarScore'] : 0;

// Calculate the total score
$totalScore = $readingScore + $writingScore + $speakingScore + $listeningScore + $grammarScore;

// Determine proficiency level
$proficiencyLevel = '';
if ($totalScore <= 25) {
    $proficiencyLevel = 'A2 - Elementary';
} elseif ($totalScore <= 50) {
    $proficiencyLevel = 'B1 - Intermediate';
} elseif ($totalScore <= 75) {
    $proficiencyLevel = 'B2 - Upper Intermediate';
} elseif ($totalScore <= 100) {
    $proficiencyLevel = 'C1 - Advanced';
} else {
    $proficiencyLevel = 'C2 - Proficient';
}

// Function to generate feedback based on proficiency level
function getProficiencyFeedback($proficiencyLevel) {
    switch ($proficiencyLevel) {
        case 'A2 - Elementary':
            return "Thank you for taking the time to complete the test. While your score suggests that there’s significant room for improvement, it’s important to remember that everyone starts somewhere. This is the beginning of your journey, not the end. ";
        case 'B1 - Intermediate':
            return "You’ve made a good start! Your score indicates that you have a basic understanding of the material, which is an important first step. There’s definitely potential for growth, and with more focused practice, you can expand your knowledge and skills.";
        case 'B2 - Upper Intermediate':
            return "Great job! Your score shows a strong level of proficiency and an impressive understanding of the material. You’re clearly on the right track, and with a bit more effort, you can reach even greater heights. Continue to refine your skills and challenge yourself with more advanced topics.";
        case 'C1 - Advanced':
            return "Outstanding performance! Your score reflects a high level of mastery and a deep understanding of the material. You’ve clearly put in the work, and it’s paying off. At this level, it’s about fine-tuning your skills and continuing to challenge yourself to maintain and even exceed your current level of excellence.";
        case 'C2 - Proficient':
            return "You have mastered the English language! Your level is comparable to that of a native speaker. Congratulations!";
        default: 
            return "We are unable to determine your proficiency level at this time."; 
    }
}

// Save the proficiency level to the session
$_SESSION['proficiencyLevel'] = $proficiencyLevel;
$_SESSION['totalScore'] = $totalScore;
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English Test - Results</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
          body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2); 
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background-image: url('image/logo.png');
            background-repeat: no-repeat;
            background-size: cover; 
            background-position: center;
            
        }
        .mt-3 {
            padding-bottom :20px;
            font-weight :bold;
        }

        .container {
            background-color: #ffffff;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef); 
            border: 2px solid #e0e7ee;
            background-image: url('path/to/your/background.jpg'); 
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 800px; 
            width: 100%;
            text-align: center; 
            position: relative;
        }
        .container::before { 
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8); 
            z-index: -1; 
        }

        h1 {
            color: #333; 
            margin-bottom: 20px; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); 
        }

        .score {
            font-size: 3em;
            font-weight: bold;
            color: #28a745; 
            margin-bottom: 10px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .proficiency {
            font-size: 1.5em;
            color: #343a40; 
            margin-bottom: 30px;
           
        }

        .feedback {
          
            background-color: #f8f9fa; 
            border: 1px solid #d1ecf1; 
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: left;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
        }
       
        .details {
            margin-bottom: 30px; 
        }

        .details h3 {
            color: #333; 
            margin-bottom: 20px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px; 
        }

        .details p {
            font-size: 1.1em;
            color: #495057; 
            margin-bottom: 10px;
        }

        .details strong {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px; 
            text-align: left;
        }

        label {
            display: block; 
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-control {
            width: 100%; 
            padding: 10px;
            border: 1px solid #ced4da; 
            border-radius: 5px;
            box-sizing: border-box; 
            transition: border-color 0.3s ease; 
        }

        .form-control:focus {
            border-color: #007bff; 
            outline: none; 
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); 
        }

        .btn-custom {
            background-color: #007bff; 
            color: #fff;
            border: none;
            padding: 12px 25px; 
            font-size: 1.1em;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .btn-custom:hover {
            background-color: #0056b3; 
        }

        .upload-error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="summary">
        <h1>Test Results</h1>
            <div class="score">Score: <?php echo $totalScore; ?></div>
            <div class="mt-3">Your proficiency level is: <?php echo $proficiencyLevel; ?></div>
            <div class="feedback mt-3"><?php echo getProficiencyFeedback($proficiencyLevel); ?></div>
        </div>
        
        <div class="details">
            <h3>Test Overview</h3>
            <p>Thank you for completing the English test! Below is a summary of your performance:</p>
            <p><strong>Reading Score:</strong> <?php echo $readingScore; ?></p>
            <p><strong>Writing Score:</strong> <?php echo $writingScore; ?></p>
            <p><strong>Speaking Score:</strong> <?php echo $speakingScore; ?></p>
            <p><strong>Listening Score:</strong> <?php echo $listeningScore; ?></p>
            <p><strong>Grammar Score:</strong> <?php echo $grammarScore; ?></p>
            <p><strong>Total Score:</strong> <?php echo $totalScore; ?></p>
        </div>

        <div class="text-center">
            <form action="certificate.php" method="POST">
                <div class="form-group">
                    <h2>Fill in the information to get the certificate</h2>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="course">Course:</label>
                    <input type="text" id="course" name="course" class="form-control" placeholder="Enter your course" required>
                </div>
                <br>
                <button type="submit" class="btn btn-custom">Generate Certificate</button>
            </form>
        </div>
    </div>
</body>
</html>