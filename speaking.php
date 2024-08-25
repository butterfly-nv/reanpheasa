<?php
// PHP logic to handle form submission and score calculation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    // Check if the 'responses' field exists
    if (isset($_POST['responses'])) {
        $responses = $_POST['responses'];
        $fullScore = 25; // Total points for the test
        $minTotalDuration = 5 * 60; // 5 minutes in seconds
        $totalTime = 0;

        // Calculate total speaking time
        foreach ($responses as $response) {
            if (isset($response['duration'])) {
                $totalTime += $response['duration'];
            }
        }

        // Determine score based on total time
        $score = ($totalTime >= $minTotalDuration) ? $fullScore : 0;

        // Save score to session
        $_SESSION['speakingScore'] = $score;

        // Redirect to results page
        header('Location: result.php');
        exit();
    } else {
        echo 'No responses received.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English Test - Part 5: Speaking Test</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2); /* Gradient background */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 800px;
            width: 100%;
            background-color: #ffffff; /* White background for content area */
            padding: 30px;
            border-radius: 12px; /* Slightly more rounded corners */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* More pronounced shadow */
            position: relative;
            z-index: 1;
        }
        .centered-section {
            text-align: center;
            margin-bottom: 40px;
        }
        .timer-container {
            margin-bottom: 30px;
            text-align: center;
        }
        .timer {
            font-size: 3em;
            font-weight: bold;
            color: #dc3545; /* Bootstrap danger color */
            animation: pulse 1.5s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.7; }
            100% { transform: scale(1); opacity: 1; }
        }
        .btn-record, .btn-submit {
            font-size: 1.2em;
            padding: 12px 24px;
            border-radius: 8px;
            margin: 10px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-success {
            background-color: #28a745; /* Green background */
            border: none;
        }
        .btn-success:hover {
            background-color: #218838; /* Darker green on hover */
            transform: scale(1.05); /* Slightly enlarge button on hover */
        }
        .btn-danger {
            background-color: #dc3545; /* Red background */
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333; /* Darker red on hover */
            transform: scale(1.05); /* Slightly enlarge button on hover */
        }
        .btn-primary {
            background-color: #007bff; /* Blue background */
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            transform: scale(1.05); /* Slightly enlarge button on hover */
        }
        .alert {
            margin-bottom: 20px;
            background-color: #d1ecf1; /* Light blue background */
            color: #0c5460; /* Dark blue text */
            border-color: #bee5eb; /* Light blue border */
            border-radius: 8px; /* Rounded corners */
            padding: 15px;
            animation: fadeIn 1s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .instructions {
            margin-bottom: 30px;
            color: #495057; /* Dark gray text */
            animation: slideIn 0.5s ease-out;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-group h4 {
            font-size: 1.6em;
            color: #343a40; /* Dark gray text */
            animation: slideInLeft 0.5s ease-out;
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .submit-container {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Centered Section -->
        <div class="centered-section">
            <h1 class="mb-4">Part 5: Speaking Test</h1>
            <div class="alert alert-info">
                <strong>INSTRUCTIONS:</strong>
                <p>This section is worth 25 points. Follow the prompts below to complete your speaking test.</p>
                <p>You have a total of 25 minutes to complete this section.</p>
            </div>
        </div>

        <!-- Timer Section -->
        <div class="timer-container">
            <div class="timer" id="timer">25:00</div>
        </div>

        <!-- Instructions and Prompts -->
        <section class="instructions text-center">
            <h2 class="mb-4">Instructions</h2>
            <p>Please respond to each of the following prompts. You should try to speak for at least one minute on each topic.</p>
        </section>

        <!-- Recording Controls -->
        <div class="recording-controls text-center">
            <button id="startBtn" class="btn btn-success btn-record">Start Recording</button>
            <button id="stopBtn" class="btn btn-danger btn-record" disabled>Stop Recording</button>
        </div>

        <!-- Speaking Prompts -->
        <form id="testForm" action="" method="POST">
            <section>
                <h2 class="mb-4 text-center">Speaking Prompts</h2>
                <div class="form-group">
                    <h4>1. Describe your favorite hobby and explain why you enjoy it.</h4>
                    <p>Speak for at least one minute.</p>
                    <input type="hidden" name="responses[0][duration]" id="response1Duration" value="0">
                </div>
                <div class="form-group">
                    <h4>2. Discuss a memorable trip you took and what made it special.</h4>
                    <p>Speak for at least one minute.</p>
                    <input type="hidden" name="responses[1][duration]" id="response2Duration" value="0">
                </div>
                <div class="form-group">
                    <h4>3. Talk about a person who has influenced your life and how they did so.</h4>
                    <p>Speak for at least one minute.</p>
                    <input type="hidden" name="responses[2][duration]" id="response3Duration" value="0">
                </div>
                <div class="form-group">
                    <h4>4. Explain a recent challenge you faced and how you overcame it.</h4>
                    <p>Speak for at least one minute.</p>
                    <input type="hidden" name="responses[3][duration]" id="response4Duration" value="0">
                </div>
                <div class="form-group">
                    <h4>5. Describe an event or activity you would like to participate in and why.</h4>
                    <p>Speak for at least one minute.</p>
                    <input type="hidden" name="responses[4][duration]" id="response5Duration" value="0">
                </div>
            </section>

            <!-- Submit Button -->
            <div class="submit-container">
                <button type="submit" id="submitBtn" class="btn btn-primary btn-submit">Submit Responses</button>
            </div>
        </form>
    </div>

    <!-- Timer and Recording Script -->
    <script>
        let time = 25 * 60; // 25 minutes in seconds
        let timerDisplay = document.getElementById('timer');
        let startBtn = document.getElementById('startBtn');
        let stopBtn = document.getElementById('stopBtn');
        let timerInterval;

        function formatTime(seconds) {
            let minutes = Math.floor(seconds / 60);
            let secondsLeft = seconds % 60;
            return `${String(minutes).padStart(2, '0')}:${String(secondsLeft).padStart(2, '0')}`;
        }

        function startTimer() {
            timerInterval = setInterval(function() {
                time--;
                timerDisplay.textContent = formatTime(time);
                if (time <= 0) {
                    clearInterval(timerInterval);
                }
            }, 1000);
        }

        startBtn.addEventListener('click', function() {
            startTimer();
            startBtn.disabled = true;
            stopBtn.disabled = false;
        });

        stopBtn.addEventListener('click', function() {
            clearInterval(timerInterval);
            startBtn.disabled = false;
            stopBtn.disabled = true;

            // Set duration for responses
            const responses = document.querySelectorAll('input[name^="responses["]');
            responses.forEach(input => {
                let responseDuration = time; // Time remaining when stopped
                input.value = 1500 - responseDuration; // Calculate duration
            });

            // Submit the form
            document.getElementById('testForm').submit();
        });
    </script>
</body>
</html>
