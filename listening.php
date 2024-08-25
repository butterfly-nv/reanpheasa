<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listening Test - Part 2</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background: linear-gradient(135deg, #a6c6f5, #f5f7fa); /* Gradient background */
            font-family: Arial, sans-serif;
            overflow-x: hidden;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff; /* White background for the content area */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }
        .centered-section {
            text-align: center;
            margin-bottom: 30px;
        }
        .centered-section h1 {
            font-size: 2.5rem; /* Increase main heading size */
            color: #343a40; /* Dark gray color */
        }
        .alert {
            margin-bottom: 20px;
            font-size: 1.25rem; /* Increase alert text size */
            background-color: #d1ecf1; /* Light blue background */
            color: #0c5460; /* Dark blue text */
            border-color: #bee5eb; /* Light blue border */
            border-radius: 5px; /* Rounded corners */
        }
        .audio-player {
            margin-bottom: 20px;
            animation: fadeInUp 1s ease-out;
        }
        .form-group h3 {
            font-size: 1.5rem; /* Increase question heading size */
            color: #007bff; /* Blue color for question headings */
            animation: slideInLeft 0.5s ease-out;
        }
        .form-check-label {
            margin-left: 10px;
            font-size: 1.25rem; /* Increase answer option size */
            color: #495057; /* Darker gray for labels */
        }
        .btn-submit {
            margin-top: 20px;
            font-size: 1.25rem; /* Increase button text size */
            background-color: #007bff; /* Blue background */
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #0056b3; /* Darker blue on hover */
            transform: scale(1.05); /* Slightly enlarge button on hover */
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Centered Section -->
        <div class="centered-section">
            <h1 class="mb-4">Part 2: Listening Test</h1>
            <div class="alert alert-info">
                <strong>INSTRUCTIONS:</strong>
                <p>Choose the correct option.</p>
                <p>Only one answer is possible.</p>
                <p>You can only play the audio twice.</p>
            </div>
        </div>

        <!-- Questions Section -->
        <section>
            <h2 class="mb-3 text-center" style="font-size: 2rem; color: #343a40;">Questions</h2>

            <?php
            session_start();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $correctAnswers = [
                    'q1' => 'with the coffee cup',
                    'q2' => 'the drums',
                    'q3' => 'at 2:45',
                    'q4' => 'The Fields',
                    'q5' => 'help the woman'
                ];

                $totalScore = 0;

                for ($i = 1; $i <= count($correctAnswers); $i++) {
                    $questionKey = 'q' . $i;
                    if (isset($_POST[$questionKey]) && $_POST[$questionKey] == $correctAnswers[$questionKey]) {
                        $totalScore += 5;
                    }
                }

                $_SESSION['listeningScore'] = $totalScore;
                header("Location: reading.php"); 
                exit();
            }
            ?>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <!-- Question 1 -->
                <div class="form-group mb-4">
                    <h3>1. Where are the photographs?</h3>
                    <div class="audio-player">
                        <audio controls>
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1a" value="on the book shelf">
                        <label class="form-check-label" for="q1a">A. on the book shelf</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1b" value="with the coffee cup">
                        <label class="form-check-label" for="q1b">B. with the coffee cup</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1c" value="on the television">
                        <label class="form-check-label" for="q1c">C. on the television</label>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="form-group mb-4">
                    <h3>2. Which musical instrument is the girl learning to play?</h3>
                    <div class="audio-player">
                        <audio controls>
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2a" value="the keyboard">
                        <label class="form-check-label" for="q2a">A. the keyboard</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2b" value="the drums">
                        <label class="form-check-label" for="q2b">B. the drums</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2c" value="the guitar">
                        <label class="form-check-label" for="q2c">C. the guitar</label>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="form-group mb-4">
                    <h3>3. What time is mentioned in the audio?</h3>
                    <div class="audio-player">
                        <audio controls>
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3a" value="at 2:45">
                        <label class="form-check-label" for="q3a">A. at 2:45</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3b" value="at 2:55">
                        <label class="form-check-label" for="q3b">B. at 2:55</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3c" value="at 2:25">
                        <label class="form-check-label" for="q3c">C. at 2:25</label>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="form-group mb-4">
                    <h3>4. What can María see from her window?</h3>
                    <div class="audio-player">
                        <audio controls>
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-4.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4a" value="The Railway station">
                        <label class="form-check-label" for="q4a">A. The Railway station</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4b" value="a block of flats">
                        <label class="form-check-label" for="q4b">B. a block of flats</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4c" value="The Fields">
                        <label class="form-check-label" for="q4c">C. The Fields</label>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="form-group mb-4">
                    <h3>5. What will the boy do first?</h3>
                    <div class="audio-player">
                        <audio controls>
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-5.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5a" value="do some homework">
                        <label class="form-check-label" for="q5a">A. do some homework</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5b" value="watch a TV program">
                        <label class="form-check-label" for="q5b">B. watch a TV program</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5c" value="help the woman">
                        <label class="form-check-label" for="q5c">C. help the woman</label>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-submit">Submit Answers</button>
                </div>
            </form>
        </section>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>