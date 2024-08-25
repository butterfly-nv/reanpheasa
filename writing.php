<?php
session_start();

// Function to calculate writing score
function calculateWritingScore($answers) {
    $totalScore = 0;

    // Scoring criteria for each question
    $criteria = [
        'q1' => [150, 200, 5],
        'q2' => [150, 200, 5],
        'q3' => [150, 200, 5],
        'q4' => [250, 300, 10]
    ];

    foreach ($criteria as $question => [$minWords, $maxWords, $points]) {
        if (isset($answers[$question])) {
            $wordCount = str_word_count($answers[$question]);
            if ($wordCount >= $minWords && $wordCount <= $maxWords) {
                $totalScore += $points;
            }
        }
    }

    return $totalScore;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $writingScore = calculateWritingScore($_POST);
    $_SESSION['writingScore'] = $writingScore;

    // Redirect to the next part (speaking.php)
    header("Location: speaking.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English Test - Part 4: Writing Test</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background-color: #e9ecef; 
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            background-color: #ffffff; 
            padding: 30px;
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto; 
            text-align: center; 
        }
        .alert-info {
            background-color: #d1ecf1; 
            color: #0c5460; 
            border-color: #bee5eb; 
        }
        .form-group {
            margin-bottom: 30px;
        }
        .textarea-container {
            position: relative;
            margin-bottom: 20px;
            background-color: #f8f9fa; 
            border-radius: 8px;
            padding: 10px;
            border: 1px solid #ced4da; 
        }
        .textarea-container textarea {
            width: 100%;
            height: 200px;
            border: none;
            border-radius: 5px;
            padding: 10px;
            background-color: #ffffff;
            box-sizing: border-box; 
        }
        .word-count {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 0.875rem;
            color: #6c757d;
        }
        .btn-submit {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1.2em;
            border-radius: 5px;
            width: 200px;
            margin: 0 auto; 
            display: block; 
        }
        .btn-primary {
            background-color: #007bff; 
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3; 
        }
        .timer-container {
            margin-bottom: 30px;
        }
        .timer {
            font-size: 2em;
            font-weight: bold;
            color: #dc3545; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="centered-section">
            <h1 class="mb-4">Part 4: Writing Test</h1>
            <div class="alert alert-info">
                <strong>INSTRUCTIONS:</strong>
                <p>Write your answers in the provided text areas. Each question is worth specific points, adding up to a total of 25 points.</p>
                <p>You have 40 minutes to complete this part.</p>
            </div>
        </div>

        <div class="timer-container text-center">
            <h2 id="timer" class="timer">40:00</h2>
        </div>

        <section>
            <h2 class="mb-3">Questions</h2>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <!-- Question 1 -->
                <div class="form-group textarea-container">
                    <label for="q1">1. Write a short essay (150-200 words) on the impact of social media on modern communication.</label>
                    <br><br>
                    <textarea id="q1" name="q1" maxlength="4000" required></textarea>
                    <div id="wordCount1" class="word-count">Words: 0</div>
                </div>

                <!-- Question 2 -->
                <div class="form-group textarea-container">
                    <label for="q2">2. Describe your favorite place to relax and explain why it is meaningful to you (150-200 words).</label>
                    <br><br>
                    <textarea id="q2" name="q2" maxlength="4000" required></textarea>
                    <div id="wordCount2" class="word-count">Words: 0</div>
                </div>

                <!-- Question 3 -->
                <div class="form-group textarea-container">
                    <label for="q3">3. Discuss the advantages and disadvantages of working from home (150-200 words).</label>
                    <br><br>
                    <textarea id="q3" name="q3" maxlength="4000" required></textarea>
                    <div id="wordCount3" class="word-count">Words: 0</div>
                </div>

                <!-- Question 4 -->
                <div class="form-group textarea-container">
                    <label for="q4">4. Write about a memorable event in your life and how it has affected you (250-300 words).</label>
                    <br><br>
                    <textarea id="q4" name="q4" maxlength="4000" required></textarea>
                    <div id="wordCount4" class="word-count">Words: 0</div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-submit" id="submitBtn">Submit Answers</button>
                </div>
            </form>
        </section>
    </div>

    <script>
        // Timer functionality
        let time = 40 * 60; 
        const timerDisplay = document.getElementById('timer');

        function updateTimer() {
            const minutes = Math.floor(time / 60);
            const seconds = time % 60;
            timerDisplay.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            time--;
            if (time < 0) {
                clearInterval(timerInterval);
                alert('Time is up! Please submit your answers.');
                document.getElementById('submitBtn').disabled = true;
            }
        }

        const timerInterval = setInterval(updateTimer, 1000);

        // Word count functionality
        function updateWordCount(textareaId, countId) {
            const textarea = document.getElementById(textareaId);
            const countDisplay = document.getElementById(countId);
            const text = textarea.value.trim();
            const wordCount = text === '' ? 0 : text.split(/\s+/).length;
            countDisplay.textContent = `Words: ${wordCount}`;
        }

        document.getElementById('q1').addEventListener('input', () => updateWordCount('q1', 'wordCount1'));
        document.getElementById('q2').addEventListener('input', () => updateWordCount('q2', 'wordCount2'));
        document.getElementById('q3').addEventListener('input', () => updateWordCount('q3', 'wordCount3'));
        document.getElementById('q4').addEventListener('input', () => updateWordCount('q4', 'wordCount4'));
    </script>
</body>
</html>
